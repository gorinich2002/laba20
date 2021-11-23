<?
$srv = 'localhost';
$username = 'root';
$pass ='';
$db = 'lr20';

$link = mysqli_connect($srv, $username, $pass,$db);
if($link == false){
    print("Ошибка: Не получается у нас к май эс кью эль подключиться( ".mysqli_connect_error());
}