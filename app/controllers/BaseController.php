<?php

namespace App\controllers;

class BaseController {
    protected function loadView($view, $data =[]) {
        extract($data);
        
        $viewPath = dirname(__DIR__) . "/views/" . $view . ".php";
        $layoutPath = dirname(__DIR__) . "/views/layouts/layout.php";

        if (file_exists($viewPath)) {
            ob_start();
            require $viewPath;
            $content = ob_get_clean();
            
            if (file_exists($layoutPath)) {
                require $layoutPath;
            } else {
                echo "Layout file not found: $layoutPath";
            }
        } else {
            echo "View not found: $viewPath";
        }
    } 

    protected function getErrorMessage() {
        if (isset($_SESSION['auth_error'])) {
            $error = $_SESSION['auth_error'];
            unset($_SESSION['auth_error']);
            return $error;
        }
        return null;
    }
}