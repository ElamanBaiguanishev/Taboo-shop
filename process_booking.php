<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taboo_shop";

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$header = $_POST['name'];
$type_service = $_POST['type_service'];
$phone_number = $_POST['phone_number'];
$date = $_POST['date'];
$comment = $_POST['comment'];

// SQL запрос для вставки данных в базу данных
$sql = "INSERT INTO bookings (name, type_service, phone_number, date, comment) VALUES ('$header', '$type_service', '$phone_number', '$date', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Запись успешно добавлена";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>