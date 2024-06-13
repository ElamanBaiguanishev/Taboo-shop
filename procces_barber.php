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
$photo_path = $_FILES['photo_path']['name'];

// Подготовка и выполнение запроса к базе данных для вставки новой записи
$sql = "INSERT INTO barbers (name, photo_path) VALUES ('$header', '$photo_path')";

if ($conn->query($sql) === TRUE) {
    echo "Барбер успешно добавлен";
} else {
    echo "Ошибка при добавлении барбера: " . $conn->error;
}

$conn->close();
?>