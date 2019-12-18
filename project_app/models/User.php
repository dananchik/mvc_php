<?php

namespace project_app\models;
use project_app\brain\Model;

class User extends Model
{

    function new_user($email, $surname, $name, $password, $gender = NULL, $date_birthday = NULL)
    {

        $sql = 'INSERT INTO users (id, name, surname, birthday, email, gender, password)
        VALUES (NULL, :name,:surname,:date_birthday,:email,:gender,:password);';
        $params = ['email' => $email,
            'surname' => $surname,
            'name' => $name,
            'date_birthday' => $date_birthday,
            'gender' => $gender,
            'password' => $password,
        ];
        $this->db->query($sql,$params);
    }
    function avtorizate($email){
        setcookie('email',$email,time()+2400);
        setcookie('login',true,time()+2400);
    }
    function logout(){
        setcookie('email','',time()-2400);
        setcookie('login','',time()-2400);
    }

}
//INSERT INTO `users` (`id`, `name`, `surname`, `birthday`, `email`, `gender`, `password`) VALUES (NULL, 'dffd', 'fddfdf', NULL, 'jfgjkgfjkgf', 'mule', '1111');