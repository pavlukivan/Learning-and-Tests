<?php
//Параметры строки
    class String {
        var $maxStrLen;
        var $minStrLen;
        var $primChars;
        
        public function __construct ($maxStrLen, $minStrLen, $primChars) {
            $this->maxStrLen = $maxStrLen;
            $this->minStrLen = $minStrLen;
            $this->primChars = $primChars;
        }
        
        public function getMaxStrLen()
        {
            return $this->maxStrLen;
        }
        
        public function getMinStrLen()
        {
            return $this->minStrLen;
        }
        
        public function getPrimChars()
        {
            return $this->primChars;
        }
    }

//База данных - работа с базой данных
    class DataBase {
        var $host = "";
        var $userName = "";
        var $pass = "";
        var $db = "";
        var $connection;
        
        public function __construct ($host, $userName, $pass) {
            $this->host = $host;
            $this->userName = $userName;
            $this->pass = $pass;
            
            $this->connection = mysql_connect($this->host, $this->userName, $this->pass) or die(mysql_error());
            $res = mysql_query("SET NAMES utf8");
            
            return $res ? true : false;
        }
        
        public function selectDataBase ($db) {
            $this->db = $db;
            
            $res = mysql_select_db($this->db, $this->connection) or die(mysql_error());
            
            return $res ? true : false;
        }
        
        public function chechLink ($link, $primChars, $maxStrLen, $minStrLen){
            //Проврка на запрещенные символы
            if (preg_match("#^[".$primChars."]+$#", $link))
            {
                //Проверка на максимальную длину строки
                if (strlen($link) <= $maxStrLen)
                {
                    //Проверка на минимальную длину строки
                    if (strlen($link) >= $minStrLen)
                    {
                        $sql_res = mysql_query("SELECT `links_link`,`links_hash` FROM `links` WHERE `links_link` = '$link'");
                        
                        if ($sql_res)
                            $arr = mysql_fetch_assoc ($sql_res);
                    }
                }
            }
                
            return $sql_res ? $arr['links_hash'] : false;
        }
        
        public function getLink ($hash) {
            $hash = mysql_real_escape_string(htmlspecialchars($hash));

            $sql_res = mysql_query("SELECT `links_link`,`links_hash` FROM `links` WHERE `links_hash` = '$hash'");

                if ($sql_res)
                    $arr = mysql_fetch_assoc ($sql_res);
            
            $link = $arr['links_link'];
            
            return $sql_res ? $link : false;
        }
        
        public function addNewLink ($link, $hash, $ip, $oldUrl) {
            $res = mysql_query("INSERT INTO `links`(`links_ip`, `links_old_url`, `links_link`, `links_hash`) VALUES ('$ip', '$oldUrl', '$link', '$hash')");
            
            return $res ? true : false;
        }
    }
    
//Пользователь - информация о нем
    class ThisUser {
        var $ip;
        var $oldUrl;
        
        public function __construct(){
            $this->ip = $_SERVER['REMOTE_ADDR'];
            $this->oldUrl = $_SERVER['HTTP_REFERER'];
        }
        
        public function getIp () {
            return $this->ip;
        }
        
        public function getOldUrl () {
            return $this->oldUrl;
        }
    }
?>