<?php
    include_once "Controller/PagesController.php";

    $pagesController = new PagesController();

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'register':
                                $pagesController->register();
                                break;
            case 'home':
                            $pagesController->home();
                            break;
            case 'login':
                            $pagesController->login();
                            break;
            case 'dashboard':   
                                $pagesController->dashboard();
                                break;
            
            case 'profile': 
                                $pagesController->profile();
                                break;
            case 'search':
                                $pagesController->search();
                                break;

            default:    
                        $pagesController->error();
                        break;
        }
    } else {
        include "View/home.php";
    }
?>