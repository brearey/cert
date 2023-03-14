<?php
require('db.php');
global $conn;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		html {
			font-family: 'Arial';
		}
		body {
		    padding: 2rem;
		}
		.banner {
			margin-left: auto;
			margin-right: auto;
			width: 950px;
			text-align: center;
		}
		.content {
			margin-left: auto;
			margin-right: auto;
			width: 950px;
			text-align: center;
		}

		.input {
			width: 400px;
			height: 40px;
			border: 0;
			border-radius: 5px;
			text-align: center;
			margin-bottom: 20px;
			box-shadow: 0 0 10px rgba(0,0,0,0.5);
		}

		.date {
			width: 250px;
			height: 20px;
			border: 0;
			border-radius: 5px;
			text-align: center;
			margin-bottom: 20px;
			padding-top: 5px;
			padding-bottom: 5px;
			font-size: 18px;
			box-shadow: 0 0 10px rgba(0,0,0,0.5);
		}

		.input:hover {
			background-color: rgba(215, 215, 215, 0.5);
		}

		.button {
			background-color: #3f8cb5;
			color: white;
			font-size: 20px;
			width: 250px;
			height: 40px;
			border: 0;
			border-radius: 5px;
			text-align: center;
			box-shadow: 0 0 10px rgba(0,0,0,0.5);
			margin-bottom: 20px;
		}

		.button:hover {
			background-color: #52EA75;
			color: gray;
		}
	</style>
</head>

<body>
	<header>
		<div class="banner">
			<img src="images/AN_logo_c_rus1.svg" height="200">
			<hr>
		</div>
		<div class="content">
		    <div style="text-align: center; color: #3f8cb5;">
		        <h1>Запись на курсы "Менеджмент в образовании"</h1>
		        <h3>17 - 21 марта 2020 г.</h3>
		    </div>
			<div>
		        <img style="height: 200px; display: none;" src="images/sert.jpg">
		    </div>
			<p style="color: black;">Для записи на курс заполните свои данные в полях ниже и нажмите кнопку <em>Отправить.</em></p>
			<p style="color: gray;"><i>Все поля обязательные.</i></p>
			<form method="post" action="index.php">
			<input required class="input" type="text" name="name" placeholder="ФИО в дательном падеже*" required='true'/>
			<br>
			<input required class="input" type="text" name="position" placeholder="должность в дательном падеже*" required='true'/>
			<br>
			<input required class="input" type="text" name="school" placeholder="Школа*" required='true'/>
			<br>
			<!-- дальше данные для сохранения -->
			<input required class="input" type="phone" name="phone" placeholder="Номер телефона*" required='true'/>
			<br>
			<input required class="input" type="email" name="email" placeholder="Электронная почта*" required='true'/>
			<br>
			<input required class="input" type="text" name="passport" placeholder="Серия и номер паспорта, например 98 08 000000*" required='true'/>
			<br>
			<input required class="input" type="text" name="diplom" placeholder="Серия и номер диплома*" required='true'/>
			<br>
			<input required class="input" type="text" name="inn" placeholder="ваш номер ИНН*" required='true'/>
			<br>
			<input required class="input" type="text" name="snils" placeholder="ваш номер СНИЛС*" required='true'/>
			<br>
			<!--
			<select required class="input" name="category">
			    <option>Направление 1</option>
			    <option>Направление 2</option>
			</select>
			<br>
			-->
			<input class="button" type="submit" name="submit" value="Отправить"/>
			</form>
		</div>
	</header>
	


<?php
//Добавление таблицы
/*
name
position
school
passport
diplom
inn
snils
phone
email

$sql = "CREATE TABLE `invites` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `invites` VARCHAR(255) NOT NULL);";
//Добавление таблицы для журнала
//CREATE TABLE `register` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `fio` VARCHAR(255) NOT NULL, `school` VARCHAR(255) NOT NULL, `date` VARCHAR(255) NOT NULL)

if($conn->query($sql) == TRUE) {
	echo "<br>Таблица создана";
}
else {
	echo "<br>Error " . $conn->error;
}
*/

//создание инвайтов
/*
for ($i = 1; $i <= 10; $i++)
	{

	    //генерируем пароль
		$chars="abcde12345";
		$max=10;
		$size=StrLen($chars)-1;
		$tempInvite=null;
		while($max--) $tempInvite.=$chars[rand(0,$size)];
		//Добавление данных в таблицу
		$itogo .= "('".$tempInvite."'),";
	}
$txt1=preg_replace('/.$/', '', $itogo);
echo "<br>";
echo $txt1;
$conn->query("INSERT INTO invites (invites) VALUES ".$txt1);
*/
//Close DB
//$conn->close();
if( isset( $_POST['submit']) ) {
	$last_string = "";
	$sql_insert = "INSERT INTO `register` (`fio`, `school`, `date`, `number`, `position`, `passport`, `diplom`, `inn`, `snils`, `phone`, `email`) VALUES ('". $_POST['name'] ."', '". $_POST['school'] ."', '". $_POST['mdate'] ."', '". $last_string['numb'] ."', '". $_POST['position'] ."', '". $_POST['passport'] ."', '". $_POST['diplom'] ."', '". $_POST['inn'] ."', '". $_POST['snils'] ."', '".$_POST['phone'] ."', '". $_POST['email'] ."')";
	//$sql_insert = "INSERT INTO `register` (`fio`, `school`, `date`, `number`, `position`, `passport`, `diplom`, `inn`, `snils`) VALUES ('". $_POST['name'] ."', '". $_POST['school'] ."', '". $_POST['mdate'] ."', '". $last_string['numb'] ."', '". $_POST['position'] ."', '". $_POST['passport'] ."', '". $_POST['diplom'] ."', '". $_POST['inn'] ."', '". $_POST['inn'] ."')";
	$conn->query($sql_insert);
	
	$text1 = $_POST['name'];
    $position = $_POST['position'];
    $text2 = $_POST['school'];
    $myDate = $_POST['mdate'];
    
    generateCert($text1, $position, $text2, $myDate);
    echo '<div style="font-size: 18px; text-align: center;"><a download href="2.jpg">Получить сертификат</a></div>';
}
else {
	echo '<div style="font-size: 18px; text-align: center;"><p>Здесь появится ваш сертификат о зачислении на курс</p></div>';
}
// Текст надписи

function generateCert($text1, $position, $text2, $myDate) {
    $myYear = substr($myDate, 2, 2); //2019-09-06
    $myMonth = substr($myDate, 5, 2); //2019-09-06
    $myDay = substr($myDate, -2, 2); //2019-09-06
    if ($myMonth == "01") { $myTextMonth = "января"; }
    if ($myMonth == "02") { $myTextMonth = "февраля"; }
    if ($myMonth == "03") { $myTextMonth = "марта"; }
    if ($myMonth == "04") { $myTextMonth = "апреля"; }
    if ($myMonth == "05") { $myTextMonth = "мая"; }
    if ($myMonth == "06") { $myTextMonth = "июня"; }
    if ($myMonth == "07") { $myTextMonth = "июля"; }
    if ($myMonth == "08") { $myTextMonth = "августа"; }
    if ($myMonth == "09") { $myTextMonth = "сентября"; }
    if ($myMonth == "10") { $myTextMonth = "октября"; }
    if ($myMonth == "11") { $myTextMonth = "ноября"; }
    if ($myMonth == "12") { $myTextMonth = "декабря"; }
    
    //Текст по центру, где 517 координата Х
    $x1 = 517 - strlen($text1) * 3.8;
    $xPos = 517 - strlen($position) * 3.8;
    $x2 = 517 - strlen($text2) * 3.7;
    
    // Замена пути к шрифту на пользовательский
    $font = './arial.ttf';
    
    // путь к файлу
    $filename = 'images/sert.jpg';
    
    // задание ширины и высоты
    $width = 1024;
    $height = 721;
    
    // создаем пустое полотно
    $image_p = imagecreatetruecolor($width, $height);
    // загружаем изображение из файла
    $image = imagecreatefromjpeg($filename);
    
    //Создание цветов
    $white = imagecolorallocate($image_p, 255, 255, 255);
    $grey = imagecolorallocate($image_p, 128, 128, 128);
    $black = imagecolorallocate($image_p, 0, 0, 0);
    imagefilledrectangle($image_p, 0, 0, 399, 29, $white);
    
    
    list($width_orig, $height_orig) = getimagesize($filename);
    
    $ratio_orig = $width_orig/$height_orig;
    
    if ($width/$height > $ratio_orig) {
       $width = $height*$ratio_orig;
    } else {
       $height = $width/$ratio_orig;
    }
    // перемещаем изображение из файла на полотно с изменением масштаба
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig,$height_orig);
    
    //array imagettftext ($image , $size , $angle , int $x , int $y , int $color , string $fontfile , string $text )
    
    imagettftext($image_p, 20, 0, $x1, 322, $black, $font, $text1.",");
    imagettftext($image_p, 20, 0, $xPos, 376, $black, $font, $position);
    imagettftext($image_p, 20, 0, $x2, 430, $black, $font, $text2);
    imagettftext($image_p, 14, 0, 96, 638, $black, $font, $myDay);
    imagettftext($image_p, 14, 0, 150, 638, $black, $font, $myTextMonth);
    imagettftext($image_p, 14, 0, 275, 638, $black, $font, $myYear);
    //Номер сертификата $last_string["numb"]
    imagettftext($image_p, 16, 0, 720, 640, $black, $font, $last_string["numb"]);
    
    //ImageTTFText($image_p, 20, 0, $x1, 322, $black, $font, iconv('Windows-1251', 'UTF-8', 'Русский текст'));
    
    // вывод
    imagejpeg($image_p, '2.jpg', 100);
}

?>
</body>
</html>