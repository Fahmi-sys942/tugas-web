<?php
session_start();

// Load configuration
require_once 'config/database.php';
require_once 'config/app.php';

// Load models
require_once 'models/User.php';
require_once 'models/Mahasiswa.php';
require_once 'models/Product.php';

// Load controllers
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/MahasiswaController.php';
require_once 'controllers/ProductController.php';

// Get page and action from URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Route handling
switch ($page) {
    case 'login':
        $controller = new AuthController($conn);
        if ($action == 'logout') {
            $controller->logout();
        } else {
            $controller->login();
        }
        break;
    
    case 'home':
        $controller = new HomeController($conn);
        $controller->index();
        break;
    
    case 'mahasiswa':
        $controller = new MahasiswaController($conn);
        switch ($action) {
            case 'create':
                $controller->create();
                break;
            case 'store':
                $controller->store();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'update':
                $controller->update();
                break;
            case 'delete':
                $controller->delete();
                break;
            default:
                $controller->index();
        }
        break;
    
    case 'products':
        $controller = new ProductController($conn);
        switch ($action) {
            case 'create':
                $controller->create();
                break;
            case 'store':
                $controller->store();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'update':
                $controller->update();
                break;
            case 'delete':
                $controller->delete();
                break;
            default:
                $controller->index();
        }
        break;
    
    default:
        $controller = new HomeController($conn);
        $controller->index();
}
