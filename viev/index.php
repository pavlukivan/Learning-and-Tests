<?php
#Дизайн главной страницы
?>
<html>
    <head>
        <meta name="description" content="Сервис позволяет сократить ссылку для дальнейшего размещения на форумах и блогах.">
        <meta name="keywords" content="сократить ссылку, сократить ссылку онлайн, сервисы сокращенных ссылок, сделать сокращенную ссылку, сокращение ссылок, короткие ссылки">
        <link rel="shortcut icon" href="http://school.it2moro.ru/viev/icon/favicon.ico" />
        <link rel="icon" href="http://school.it2moro.ru/viev/icon/favicon_32.png" sizes="32x32">
        <link rel="icon" href="http://school.it2moro.ru/viev/icon/favicon_48.png" sizes="48x48">
        <link rel="icon" href="http://school.it2moro.ru/viev/icon/favicon_64.png" sizes="64x64">
        <link rel="image_src" href="http://school.it2moro.ru/viev/icon/favicon_64.png" />
        <meta property="og:image" content="http://school.it2moro.ru/viev/icon/favicon_64.png">
        <meta property="og:title" content="i2m.su"/>
        <meta property="og:description" content="Сервис позволяет сократить ссылку для дальнейшего размещения в социальных сетях, на форумах и блогах."/>
        <meta name="theme-color" content="#DADADA">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript" src="http://school.it2moro.ru/model/scripts/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="model/func.js"></script>
        <link href="viev/style/overall.css" rel="stylesheet" type="text/css" />
        <link href="http://it2moro.ru/other/service_header/style.css" rel="stylesheet" type="text/css" />
        <title>Сокращение Ссылок Онлайн!</title>
        <!-- Yandex.Metrika counter -->
            <script type="text/javascript">
                (function (d, w, c) {
                    (w[c] = w[c] || []).push(function() {
                        try {
                            w.yaCounter38001960 = new Ya.Metrika({
                                id:38001960,
                                clickmap:true,
                                trackLinks:true,
                                accurateTrackBounce:true,
                                webvisor:true,
                                trackHash:true
                            });
                        } catch(e) { }
                    });
            
                    var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () { n.parentNode.insertBefore(s, n); };
                    s.type = "text/javascript";
                    s.async = true;
                    s.src = "https://mc.yandex.ru/metrika/watch.js";
            
                    if (w.opera == "[object Opera]") {
                        d.addEventListener("DOMContentLoaded", f, false);
                    } else { f(); }
                })(document, window, "yandex_metrika_callbacks");
            </script>
            <noscript><div><img src="https://mc.yandex.ru/watch/38001960" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    </head>
    <body>
        <?php include("../it2moro.ru/other/service_header/index.php");?>
        <div class="body">
            <h1>Сокращатель ссылок</h1>
            <div class="form">
                <form method="post" action="">
                    <input type="text" name="link" placeholder="Введите ссылку..."/>
                    <input type="submit" value="Сократить!">
                </form>
                <?php if($hash) {?><div class="new_link" id="select">http://i2m.su/<b><?=$hash?></b></div><?php } ?>
                <?php if($error) {?> <div class="error"><?=$error?></div> <?php } ?>
            </div>
        </div>
        <!--Хотите узнать как это работает и сделать так же? -->
        <div class="footer">
            <p><?=date(Y);?> - 2016 &copy <a href="http://it2moro.ru" target="_blank">It2moro.ru</a> <span style="display: inline-block; width: 200px;"></span>Разработка <a href="http://it2moro.ru/summary" target="_blank">Евгений Буковски</a></p>
        </div>
    </body>
</html>