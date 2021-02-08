<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Mon super Site</title>
</head>
<body class="flex flex-col min-h-screen">
<div>
    <nav class="bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class="w-full justify-between flex items-center">
                    <a class="flex-shrink-0 text-white" href="/">My App</a>
                    <div class="md:block">
                        <a class="text-gray-300  hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="/">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<main class="flex-grow bg-gray-100 flex flex-col" role="main">
    <div class="flex-grow bg-white w-full max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
        <?php include $templateName . ".php"; ?>
    </div>
</main>

<footer class="bg-gray-800 w-full py-8">
    <div class="max-w-screen-xl mx-auto px-4">
        <ul class="max-w-screen-md mx-auto text-lg font-light flex flex-wrap justify-between">
            <li class="my-2">
                <a class="text-gray-400 hover:text-gray-100 dark:text-gray-300 dark:hover:text-white transition-colors duration-200"
                   href="#">
                    &copy Enzo LENTZY - 2021
                </a>
            </li>
        </ul>
    </div>
</footer>

</body>
</html>