<?php
    //import de l'autoloader des classes
    require_once './autoload.php';
    require_once './vendor/autoload.php';
    use App\Controller\UtilisateurController;
    use App\controller\RolesController;
    $roleController = new RolesController();
    $userController = new UtilisateurController();
    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //routeur
    switch ($path) {
        case '/choco/':
            include './home.php';
            break;
        case '/choco/useradd':
            $userController->addUser();
            break;
        case '/choco/roleadd':
            $roleController->addRoles();
            break;

        default:
            include './error.php';
            break;
    }
?>
