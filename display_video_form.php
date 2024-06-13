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

$sql = "SELECT * FROM videos";
$result = $conn->query($sql);

// Формирование HTML-кода формы
$formHTML = '<div class="blog-videos">';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["display"] == 1) {
            $formHTML .= '<iframe height="300" src="https://www.youtube.com/embed/' . $row["video_id"] . '">';
            $formHTML .= '</iframe>';
        }
    }
} else {
    $formHTML .= '<div>Нет данных для отображения</div>';
}
$formHTML .= '</div>';

echo $formHTML;

$conn->close();
?>