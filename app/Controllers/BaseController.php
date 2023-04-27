<?php

namespace App\Controllers;

class BaseController
{
    protected function renderView(string $viewName, array $viewData = [])
    {
        $viewFilePath = __DIR__ . '/../Views/' . $viewName . '.php';
        if (!file_exists($viewFilePath)) {
            throw new \Exception('View file not found: ' . $viewName);
        }

        extract($viewData);

        ob_start();
        require $viewFilePath;
        $content = ob_get_clean();

        require __DIR__ . '/../Views/layout.php';
    }
    
    protected function redirect(string $url)
    {
        header('Location: ' . $url);
        exit;
    }
}
