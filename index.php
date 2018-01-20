<?php
session_start();

require_once("vendor/autoload.php");
use \Slim\Slim;
use \Sistema\Page;
use \Sistema\Model\User;
$app = new Slim();
$app->config('debug', true);
$app->get('/home', function(){
    User::verifyLogin();
    $page = new Page();
    $page->setTpl("index");
});
$app->get('/', function(){
    $page = new Page([
        "header"=>false,
        "footer"=>false
    ]);
    $page->setTpl("login");
    $_SESSION[User::SESSION] = NULL;
});
$app->post('/', function(){
    User::login($_POST["usuario"], $_POST["senha"]);
    header("Location: /home");
    exit;
});
$app->get('/logout', function(){
    User::logout();
    header("Location: /");
    exit;
});
$app->run();
?>