<?php
$arrayImgBackG = array("1.jpg", "2.jpg", "3.jpg");

$backgroungImg = $arrayImgBackG[rand(0, count($arrayImgBackG)-1)];
?>

body { 
    margin: 0px; 
    width: 100%;
    heigth: 100%;
    text-align: center;
    background: url('http://i2m.su/viev/img/<?=$backgroungImg?>') center no-repeat;
    background-size: cover;
    font-family: agency_fb;
}

.body {
    margin: 0px;
    height: 100%;
    width: 100%;
    text-align: center;
    background: rgba(0,0,0,0.3);
}

ul, li { margin: 0px; padding: 0px; }

@font-face {
    font-family: agency_fb;
    src: url('../fonts/agency_fb.ttf');
	src: local(agency_fb), url('../fonts/agency_fb.ttf');
}
/*
@font-face {
    font-family: Heavy;
    src: url('../fonts/Lato-Heavy.ttf');
	src: local(myFont), url('../fonts/Lato-Heavy.ttf');
}

@font-face {
    font-family: Light;
    src: url('../fonts/Lato-Light.ttf');
	src: local(Light), url('../fonts/Lato-Light.ttf');
}

@font-face {
    font-family: Semibold;
    src: url('../fonts/Lato-Semibold.ttf');
	src: local(Light), url('../fonts/Lato-Semibold.ttf');
}
*/
.form {
    display: block;
    position: relative;
    top: 20%;
    width: 60%;
    height: auto;
    margin: 0px auto;
    padding: 15px 0px;
    text-align: -webkit-center;
    text-align: center;
    background: rgba(0,0,0,0.5);
    box-shadow: rgba(0, 0, 0, 0.7) 5px 5px 10px;
}

.form h1 {
    font-size: 75px;
    color: #fff;
    margin: 25px 0px;
}

form {
    padding-top: 10px;
    width-min: 500px;
    width: 90%;
    margin: 0px auto;
}

.form input, select, option {
    display: inline-block;
    position: relative;
    margin: 2px 7px;
    padding: 5px 7px;
    font-family: agency_fb;
    font-size: 16px;
    background: #FFFFFF;
    border: 1px solid #909090;
}

.form input[type="text"]{
    display: inline-block;
    font-family: agency_fb;
    width: 100%;
    background: #FFFFFF;
    font-size: 20px;
    color: #000;
    border: none;
    margin-bottom: 10px;
    padding: 10px 20px;
    font-weight: 300;
    outline: none;
    box-shadow: inset 0 0 2px #000;
    -webkit-box-shadow: inset 0 0 2px #000;
    -webkit-appearance: none;
}

.form input[type="text"]:focus{
	background: #7bf1ff;
}

/*Сделать кнопку переливающейся*/

.form input[type="submit"]{
	display: inline-block;
    width: 145px;
    background: #fe9612;
    font-family: agency_fb;
    font-size: 25px;
    color: #FFFFFF;
    border: none;
    text-align: center;
    margin-top: 5px;
    padding: 10px;
    margin: 10px 0px 2px;
}

.form input[type="submit"]:hover{
    cursor: pointer;
    color: #000;
	background: #7bf1ff;
}

.error {
    display: block;
    position: relative;
    padding: 10px 5px;
    margin: 15px auto 0px;
    width: 50%;
    background: #FF5151;
    box-shadow: inset 0 0 2px #FF5151;
    font-family: agency_fb;
    color: #FFF;
    letter-spacing: 1px;
}

.new_link {
    display: block;
    position: relative;
    padding: 10px 5px;
    margin: 15px auto 0px;
    width: 50%;
    background: #fff;
    box-shadow: inset 0 0 2px #fff;
    font-family: agency_fb;
    font-size: 24px;
    color: #2196F3;
    letter-spacing: 1px;
}

.new_link b {
    color: #4CAF50;
}

a {
    text-decoration: none;
	color: #fff;
	border-bottom: 1px #fff solid;
}

a:hover {
	color: #fff;
	border-bottom: 1px #fff solid;
}

.footer {
	position: absolute;
	color: #fff;
	bottom: 0px;
	width: 100%;
	margin: 0px;
	padding: 0px 0px;
	background: rgba(0, 0, 0, 0.75);
    box-shadow: rgba(0, 0, 0, 0.75) 0px -4px 4px;
}

.footer p {
	line-height: 15px;
    font-size: 14px;
	font-family: agency_fb;
}