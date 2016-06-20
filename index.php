<?php
#Основной рабочий файл

    include("model/func.php");
    
    $String = new String(2048, 5, "а-яА-Яa-zA-Z0-9\\\/\.\%\:\_\-\\#=\?\&");
    $User = new ThisUser();
    $DB = new Database("localhost", "046425126_25", "aHcr=}>3{zhy");
    $DB->selectDataBase("jah-lives-in-me_i2m");
    
    include("model/hash.php");
    
    //Отображение
    include("viev/index.php")
?>