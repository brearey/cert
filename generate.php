<?php
require('db.php');
global $conn;

//	//Добавление таблицы
//	$sql = "CREATE TABLE `cert`.`invites` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `invites` VARCHAR(255) NOT NULL);";
//
//	if($conn->query($sql) == TRUE) {
//		echo "<br>Таблица cert, invites создана";
//	}
//	else {
//		echo "<br>Error " . $conn->error;
//	}
//    die();

//создание инвайтов
$itogo = "";
for ($i = 1; $i <= 50; $i++)
    {

        //генерируем пароль
        $chars="abcde12345";
        $max=10;
        $size=StrLen($chars)-1;
        $tempInvite=null;
        while($max--) $tempInvite.=$chars[rand(0,$size)];
        echo $tempInvite."<br><br>";
        //Добавление данных в таблицу
        $itogo .= "('".$tempInvite."'),";
    }
$txt1=preg_replace('/.$/', '', $itogo);
echo "<br>";
echo $txt1;
$conn->query("INSERT INTO invites (invites) VALUES ".$txt1);

//Close DB
$conn->close();

?>