<?php
#Скрипт получания хеша

    //Если пришли данные
    if (!empty($_POST['link']))
    {
        (string) $text = $_POST['link'];
        (string) $error = "";
        (string) $hash = "";
        
        //Проверяем их на соответствие
            //Проврка на запрещенные символы
            if (preg_match("#^[".$String->getPrimChars()."]+$#", $text))
            {
                //Проверка на максимальную длину строки
                if (strlen($text) <= $String->getMaxStrLen())
                {
                    //Проверка на минимальную длину строки
                    if (strlen($text) >= $String->getMinStrLen())
                    {
                        //Нужно написать проверку такого типа: если есть намек на http:// (htt/) но он введен не правильно - писать ошибку, как в гугле
                        //Проверка на последовательность (маска ввода), перед = всегда ?, обязательное вхождение точки и т.д.
                        
                        //Если есть http:// - отбрасываем
                        if (preg_match("/^(http:\/\/)/i", $text))
                            $text = substr($text, 7);

                            //Проверка на наличие такой ссылки в БД
                            if ($thisHash = $DB->chechLink($text, $String->getPrimChars(), $String->getMaxStrLen(), $String->getMinStrLen()))
                            {
                                $hash = $thisHash;
                            } else
                            {
                                //Получаем хеш
                                $hash = exec('./model/Hash.out <<< "'.escapeshellcmd($text).' 6"');
                                //Хэш получен?
                                if (!empty($hash))
                                {
                                    $DB->addNewLink($text, $hash, $User->getIp(), $User->getOldUrl());
                                } else
                                {
                                    $error = "Произошла неизвестная ошибка!";
                                }
                            }
                    } else
                    {
                        $error = "Введенная ссылка слишком короткая!";
                    }
                } else 
                {
                    $error = "Введенная ссылка слишком длинная!";
                }
            } else 
            {
                $error = "Не используйте запрещенные символы!";
            }
    }
?>