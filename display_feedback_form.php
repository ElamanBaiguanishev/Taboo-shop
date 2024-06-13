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

// SQL запрос для выборки данных из таблицы feedbacks
$sql = "SELECT * FROM feedbacks";
$result = $conn->query($sql);

// Формирование HTML-кода формы
$formHTML = '<div class="items" id="items">';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["display"] == 1) {
            $formHTML .= '<div class="item">';
            $formHTML .= '<img src="assets/feedback_avatar.svg" alt="">';

            $formHTML .= '<div class="feedback-text">';

            $formHTML .= '<div class="feedback-name">' . $row["name"] . '</div>';
            $formHTML .= '<div class="feedback-rating">&#9733; ' . $row["rating"] . '</div>';
            $formHTML .= '<div class="feedback-comment">' . $row["comment"] . '</div>';

            $formHTML .= '</div>';

            $formHTML .= '</div>';
        }
    }
} else {
    $formHTML .= '<div>Нет данных для отображения</div>';
}
$formHTML .= '</div>';

echo $formHTML;

$conn->close();
?>