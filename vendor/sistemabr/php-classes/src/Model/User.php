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

        if($password === $data["senha"]){
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
    public static function listAll(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM paciente");
    }
   
    public function save(){
        $sql = new Sql();

        $sql->query("INSERT INTO paciente(nome_pac,telef1,telef2,data_nasc,cpf,cidade,bairro,endereco,num_casa,observacao)
        VALUES(:NOME,:TEL1,:TEL2,:NASC,:CPF,:CIDADE,:BAIRRO,:ENDERECO,:NUMERO,:OBS)", array(
            ":NOME"=>$this->getname(),
            ":TEL1"=>$this->getphone1(),
            ":TEL2"=>$this->getphone2(),
            ":NASC"=>$this->getdatanasc(),
            ":CPF"=>$this->getcpf(),
            ":CIDADE"=>$this->getcidade(),
            ":BAIRRO"=>$this->getbairro(),
            ":ENDERECO"=>$this->getendereco(),
            ":NUMERO"=>$this->getnumcasa(),
            ":OBS"=>$this->getobservacao()
        ));
        
    }
    public static function logout(){

        $_SESSION[User::SESSION] = NULL;
    }
}

?>