<?php
    require('db.php');
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
			<p style="color: black;">Для записи на курс заполните свои данные в полях ниже и нажмите кнопку <em>Отправить</em></p>
			<form method="post" action="index.php">
			<input required class="input" type="text" name="name" placeholder="ФИО в дательном падеже" required='true'/>
			<br>
			<input required class="input" type="text" name="position" placeholder="должность в дательном падеже" required='true'/>
			<br>
			<input required class="input" type="text" name="school" placeholder="Школа" required='true'/>
			<br>
			<input required class="input" type="text" name="invite" placeholder="введите ключ" required='true'/>
			<!-- Выбор даты получения -->
			<p>Введите дату получения сертификата:</p>
			<input class="date" type="date" name="mdate" value="2020-01-01" min="2020-01-01" max="2020-12-31">
			<br>
			<input class="button" type="submit" name="submit" value="Отправить"/>
			</form>

    		<?php
    			if( isset( $_POST['submit']) ) {
					//запрос в БД
					$check = $_POST['invite'];
	    			$sql_select = "SELECT * FROM invites WHERE invites = '".$check."'";
	    			$result = $conn->query($sql_select);
	    			if ($result->num_rows > 0) {
	    				$sql_delete = "DELETE FROM invites WHERE invites = '".$check."'";
    					if ($conn->query($sql_delete) == TRUE) {
    					echo '<a style="font-size: 18px;" download href="2.jpg">Получить сертификат</a>';
    					
    					//Выбрать последний номер сертификата из БД (название таблицы не забудь)
    					$sql_select_last = "SELECT * FROM numbers ORDER BY ID DESC LIMIT 1";
					    $last = $conn->query($sql_select_last);
					    $last_string = $last->fetch_assoc();
					    if ($last->num_rows > 0) {
						    	$conn->query("DELETE FROM numbers ORDER BY ID DESC LIMIT 1");
						    }
    					
    					$sql_insert = "INSERT INTO `register` (`fio`, `school`, `date`, `number`, `position`) VALUES ('". $_POST['name'] ."', '". $_POST['school'] ."', '". $_POST['mdate'] ."', '". $last_string["numb"] ."', '". $_POST['position'] ."')";
    					$conn->query($sql_insert);
    					}
    				}
	    			else {
	    				echo "
							<script>
								alert( 'Такого ключа не существует' );
							</script>
	    				";
	    			}
			    }
			    else {
			    	echo 'Здесь появится ваш сертификат...';
			    }
			?>
		</div>
	</header>
	
</body>

<?php
//Добавление таблицы
/*
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

// Текст надписи
$text1 = $_POST['name'];
$position = $_POST['position'];
$text2 = $_POST['school'];
$myDate = $_POST['mdate'];

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


?>

</html>