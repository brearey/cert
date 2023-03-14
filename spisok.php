<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Список получивших сертификат</title>
</head>
<body>
	<h3 style="text-align: center;">Список получивших сертификат</h3>
	<p style="text-align:center; display: none;"><i>Дата в формате <code>ГГГГ-ММ-ДД</code></i></p>
	<div style="width: 600px; margin-left: auto; margin-right: auto; border: 1px solid #000; border-radius: 5px; padding: 10px;">
<?php
    require('db.php');
    
	$sql = "SELECT * FROM register";
	$result = $conn->query($sql);
    $count = 1;
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		    echo ($count);
			echo "<br> ФИО: ". $row["fio"] . "<br> школа: ". $row["school"] . "<br> Должность: ". $row["position"] ."<br> Телефон: ". $row["phone"] . "<br> Электронная почта: ". $row["email"] . "<br> Серия и номер паспорта: ". $row["passport"] . "<br> Диплом: ". $row["diplom"] . "<br> ИНН: ". $row["inn"] . "<br> СНИЛС: ". $row["snils"] . "<hr>";
			//echo "<br> ФИО: ". $row["fio"] . "<br> школа: ". $row["school"] . "<br> дата получения: ". $row["date"] . "<br> Номер сертификата: ". $row["number"] . "<br> Должность: ". $row["position"] . "<hr>";
			$count = $count + 1;
		}
	}
	else {
	    echo "Пока никто еще не получил сертификат";
	}
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
*/
?>
	</div>
	
</body>
</html>

