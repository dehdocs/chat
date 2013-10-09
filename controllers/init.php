<?php
session_start();

ini_set('display_errors',1);
include('function/function.php');
include('config.php');



######IMPORTAÇÃO DE CLASSES
include_once('class/class.layout.php');
include_once('class/class.chat.php');

#######INSTANCIA DOS OBJETOS
$layout = new Layout();
$chat = new Chat();