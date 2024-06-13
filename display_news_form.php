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

$sql = "SELECT * FROM news";
$result = $conn->query($sql);

$formHTML = '<div class="blog-videos">';
// Формирование HTML-кода формы
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $formHTML .= '<div class="blog-news"">
            <h1 >' . $row['header'] . '</h1>
            <div style="overflow-y:scroll; margin-bottom: 20px; height: 100px">' . $row['content'] . '</div>
            <img src="news/' . $row['photo_path'] . '" alt="">
        </div>';
    }
} else {
    $formHTML .= '<div>Нет данных для отображения</div>';
}

$formHTML .= '</div>';

echo $formHTML;

$conn->close();
?>