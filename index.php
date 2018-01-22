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
$app->get('/relatorios/todospacientes', function(){
    User::verifyLogin();
    $pacientes = User::listAll();
    $page  = new Page();
    $page->setTpl("rel_paciente_todos", array(
        "pacientes"=>$pacientes
    ));
  
});
$app->get('/relatorios/paciente', function(){
    User::verifyLogin();
    $page = new Page();
    $page->setTpl("rel_paciente");
});
$app->get('/relatorios/contas', function(){
    User::verifyLogin();
    $page = new Page();
    $page->setTpl("rel_contas_receber");
});
$app->get('/relatorios/consultas', function(){
    User::verifyLogin();
    $page = new Page();
    $page->setTpl("rel_consulta");
});
$app->get('/relatorios/retornos', function(){
    User::verifyLogin();
    $page = new Page();
    $page->setTpl("rel_consulta_retorno");
});
$app->get('/relatorios/aniversariantes', function(){
    User::verifyLogin();
    $page = new Page();
    $page->setTpl("rel_aniversario");
});
$app->get('/cadastro/consulta', function(){
    User::verifyLogin();
    $page = new Page();
    $page->setTpl("cad_consulta");
});
$app->get('/cadastro/paciente', function(){
    User::verifyLogin();
    $page = new Page();
    $page->setTpl("cad_paciente");
});
$app->post('/cadastro/paciente', function(){
    User::verifyLogin();
    $user = new User();
    $user->setData($_POST);
    $user->save();
    header("Location: /relatorios/paciente");
    exit;
});
$app->get('/cadastro/conta', function(){
    User:: verifyLogin();
    $page = new Page();
    $page->setTpl("cad_contas_receber");
});

$app->run();
?>