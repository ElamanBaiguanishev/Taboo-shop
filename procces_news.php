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
$header = $_POST['header'];
$content = $_POST['content'];
$photo_path = $_FILES['photo_path']['name'];

// Подготовка и выполнение запроса к базе данных для вставки новой записи
$sql = "INSERT INTO news (header, content, photo_path) VALUES ('$header', '$content', '$photo_path')";

if ($conn->query($sql) === TRUE) {
    echo "Новость успешна добавлена";
} else {
    echo "Ошибка при добавлении новости: " . $conn->error;
}

$conn->close();
?>