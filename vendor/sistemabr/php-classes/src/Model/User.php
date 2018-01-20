<?php

namespace Sistema\Model;
use \Sistema\DB\Sql;
use \Sistema\Model;


class User extends Model{
    const SESSION = "User";
    public static function login($login, $password){
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM admin WHERE login = :LOGIN", array(
            ":LOGIN"=>$login
        ));
        
        if(count($results) === 0){
            throw new \Exception("Usuário inexistente ou senha incorreta", 1);
        }
        $data = $results[0];

        if($password === $data["password"]){
            $user = new User();
            $user->setData($data);
            $_SESSION[User::SESSION] = $user->getValues();
            return $user;
        } else {
            throw  new \Exception("Usuário inexistente ou senha incorreta", 1);
        }
    }
    public static function verifyLogin(){
        if(
            !isset($_SESSION[User::SESSION]) 
            ||
            !$_SESSION[User::SESSION]
           //||(int)$_SESSION[User::SESSION]["iduser"] > 0
        ){
            header("Location: /");
            exit;
        }
    }
    public static function logout(){

        $_SESSION[User::SESSION] = NULL;
    }
}

?>