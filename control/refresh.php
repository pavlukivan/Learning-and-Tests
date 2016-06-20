<?php
    #Скрипт перенаправления
    
    include("../model/func.php");
    
    $String = new String(512, 5, "а-яА-Яa-zA-Z0-9\\\/\.\:\_\-\=\?\&");
    $User = new ThisUser();
    $DB = new Database("localhost", "046425126_25", "aHcr=}>3{zhy");
    $DB->selectDataBase("jah-lives-in-me_i2m");
    
    include("../model/hash.php");
    
    //Проверка на наличие переменной и соответствие
        //Проверка на наличие параметра
        if (!empty($_GET['hash']))
        {
            $hash = $_GET['hash'];
            
            //Проверка на длину строки
            if (strlen($hash) <= $String->getMaxStrLen() && strlen($hash) >= $String->getMinStrLen())
            {
                $link = $DB->getLink($hash);
                
                //Проверка на наличие ссылки
                if (!empty($link))
                    header('Location: http://'.$link);
                else
                     header('Location: /');
            }
        } else
    {
        header('Location: /');
    }
?>