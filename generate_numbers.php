<?php
require('db.php');
global$conn;

//Добавление таблицы
//
//$sql = "CREATE TABLE `numbers` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `numb` VARCHAR(255) NOT NULL);";
//
//if($conn->query($sql) == TRUE) {
//	echo "<br>Таблица numbers создана";
//}
//else {
//	echo "<br>Error " . $conn->error;
//}
//die();

//создание инвайтов
$itogo = "";
for ($i = 1; $i <= 50; $i++)
	{

		//генерируем номер 00000356-лс
		$number = numberFormat($i, 8);
		$text_number = $number."-ЛС";
		$itogo .= "('".$text_number."'),";
	}
$txt1=preg_replace('/.$/', '', $itogo);
echo "<br>";
echo $txt1;
//Добавление данных в таблицу
$conn->query("INSERT INTO numbers (numb) VALUES ".$txt1);

//Close DB
$conn->close();

function numberFormat($digit, $width) {
while(strlen($digit) < $width)
  $digit = '0' . $digit;
  return $digit;
}

?>