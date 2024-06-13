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
$rating = $_POST['rating'];
$comment = $_POST['comment'];

// Подготовка и выполнение запроса к базе данных для вставки новой записи
$sql = "INSERT INTO feedbacks (name, rating, comment) VALUES ('$header', '$rating', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Отзыв успешно добавлен";
} else {
    echo "Ошибка при добавлении отзыва: " . $conn->error;
}

$conn->close();
?>