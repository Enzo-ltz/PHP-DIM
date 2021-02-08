<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    public function render($templateName, $data = []):Response
    {
        ob_start();
        foreach ($data as $k => $v) $$k = $v; // worst line ever
        include(__DIR__ . "/../../templates/layout.php");
        $content = ob_get_contents();
        ob_end_clean();
        return new Response($content);
    }
    public function redirectTo($path):Response{
        return new RedirectResponse($path);
    }
}