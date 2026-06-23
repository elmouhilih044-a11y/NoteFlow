<?php

class Router
{

    public static function handle()
    {

         $page = $_GET['page'] ?? 'home';
        $action = $_GET['action'] ?? 'index';

        switch ($page) {

            case 'home':
                if (session_status() === PHP_SESSION_NONE) { session_start(); }
                if (isset($_SESSION['user_id'])) {
                    header('Location: index.php?page=notes');
                    exit();
                }
                require __DIR__ . '/../views/home.php';
                break;

            case 'login':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->login();
                break;

            case 'register':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->register();
                break;

            case 'logout':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->logout();
                break;

            case 'forgot_password':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->forgotPassword();
                break;

            case 'reset_password':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->resetPassword();
                break;

            case 'notes':
                require_once __DIR__ . '/../controllers/NoteController.php';
                $controller = new NoteController();
                if (method_exists($controller, $action)) {
                    $controller->$action();
                } else {
                    http_response_code(404);
                    echo "Action non trouvée";
                }
                break;


            case 'profile':
                require_once __DIR__ . '/../controllers/ProfileController.php';
                $controller = new ProfileController();
                if (method_exists($controller, $action)) {
                    $controller->$action();
                } else {
                    http_response_code(404);
                    echo "Action non trouvée";
                }
                break;

            default:
                http_response_code(404);
                echo "Page non trouvée";
                break;
        }
    }
}
