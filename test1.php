<?php
    #Проверка первой версии алгоритма
    
    $errorCount = 0;
    
    $arr = array();
    
    $testNum = count($arr);
    
    for ($i = 0; $i < $testNum; $i++)
    {
        //Длина генирируемой строки
            $strlen = rand(5, 15);
        
        //Генерация строки
            $chartypes = "lower,upper,special,numbers";
            $string = $arr[$i];
        
        //Получаем хэш
            $hash = exec('chmod +x model/hash.out & ./model/hash.out <<< "'.$string.';"');
            
        //Кладем в массив
            $arr[$i] = $hash;
    }
    
    //Проверка массива
   for($i = 0; $i < $testNum; $i++)
   {
       $testVar = $arr[$i];
       
       //Сравниваем с другими значениями
       for($j = 0; $j < $testNum; $j++)
       {
           if ($i == $j) continue;
           if ($testVar == $arr[$j])
           {
               echo "($errorCount) WARNING!: ($i) ".$arr[$i]." = ($j) ".$arr[$j]."<br>";
               $errorCount++;
           }
       }
   }