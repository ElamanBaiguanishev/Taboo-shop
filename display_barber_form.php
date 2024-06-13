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

$sql = "SELECT * FROM barbers";
$result = $conn->query($sql);

$formHTML = '';
// Формирование HTML-кода формы
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $formHTML .= '<div class="barber-icon">
            <img src="barber_photos/' . $row['photo_path'] . '" alt="">
            <div >' . $row['name'] . '</div>
        </div>';
    }
} else {
    $formHTML .= '<div>Нет данных для отображения</div>';
}

echo $formHTML;

$conn->close();
?>