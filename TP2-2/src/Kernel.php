<?php

namespace App;

use App\Controller\HomeController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel
{
    private Request $request;
    private $entityManager = null;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->entityManager = $this->buildEntityManager();
    }

    public function run()
    {
        $response = $this->route($this->request);
        $response->send();
    }

    private function route(Request $request): Response
    {
        $defaultController = HomeController::class;
        $path = $request->getPathInfo();
        $path = trim($path, "/");
        $className = $defaultController;
        $method = "index";
        if (strlen($path) > 0) {
            // if subroute is not specified, it is merged to /index
            list($controller, $method) = [...explode("/", $path), "index"];
            $className = "App\\Controller\\" . ucfirst($controller) . "Controller";
            if ($className === $defaultController && $method === "index") {
                return new RedirectResponse("/");
            }
        }
        if (!class_exists($className)
            || !method_exists($className, $method)) {
            return new Response("Page not found", 404);
        }
        $resolvedArguments = $this->parametersResolver($className, $method);
        return call_user_func_array([new $className(), $method], $resolvedArguments);
    }

    private function parametersResolver($className, $method): array
    {
        //this code gives you the ability to see if a method should have a parameter
        //if so, set it as object or value.
        $reflexion = new \ReflectionMethod($className, $method);
        $params = $reflexion->getParameters();
        $autoInject = [
            Request::class => $this->request,
            EntityManagerInterface::class => $this->entityManager,

        ];
        $paramValues = [];
        foreach ($params as $param) {
            if ($param->hasType() && isset($autoInject[$param->getType()->getName()])) {
                $paramValues[$param->getPosition()] = $autoInject[$param->getType()->getName()];
            } else {
                $paramValues[$param->getPosition()] = $this->request->get($param->getName(), null);
            }
        }
        return $paramValues;
    }

    private function buildEntityManager(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Annotations
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/Entity"), $isDevMode,null, null, false);
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../db.sqlite',
        );

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;

    }


}