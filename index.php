<?php

/* Set Autoload Register */
$mysqli = new mysqli('localhost', 'root', '', 'kbot');

function chargerClasse($class)
	{
  require_once('class/'.$class.'.class.php'); // On inclut la classe correspondante au paramètre passé.
	}
spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


/* MySQL */
// $db = new mysqli("127.0.0.1", "root", "", "object_1");

/*
Il existe plusieurs méthodes pour appeler les fichiers MVC
*/


// ----- Methode 1 : Mettre tous les liens en dure : Site Internet statique
/*
$page = $_GET['page'];
if (!empty($page)) {
 
    $data = array(
        'about' => array('model' => 'AboutModel', 'view' => 'AboutView', 'controller' => 'AboutController'),
        'portfolio' => array('model' => 'PortfolioModel', 'view' => 'PortfolioView', 'controller' => 'PortfolioController')
    );
 
    foreach($data as $key => $components){
        if ($page == $key) {
            $model = $components['model'];
            $view = $components['view'];
            $controller = $components['controller'];
            break;
        }
    }
 
    if (isset($model)) {
        $m = new $model();
        $c = new $controller($model);
        $v = new $view($model);
        echo $v->output();
    }
}
*/

// ----- Methode 2 : Passer tous les arguments dans l'URL : Permet de créer des sections du site
/*
$model = $_GET['model'];
$view = $_GET['view'];
$controller = $_GET['controller'];
$action = $_GET['action'];
 
if (!(empty($model) || empty($view) || empty($controller) || empty($action))) 
	{
    $m = new $model();
    $c = new $controller($m, $action);
    $v = new $view($m);
    echo $v->output();
	}
*/
$class = "Utilisateur";
$class_controller = "Utilisateur_Controller";
$class_view = "Utilisateur_View";
if(isset($_GET['model']))
	{
	$class = ucfirst($_GET['model']);
	$class_controller = $class."_Controller";
	$class_view = $class."_View";
	}
	
$model = new $class();
$controller = new $class_controller($model);
$view = new $class_view($model, $controller);

if(isset($_GET['action']) && !empty($_GET['action']))
	$view->{$_GET['action']}();

?>