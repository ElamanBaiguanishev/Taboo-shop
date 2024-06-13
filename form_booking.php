<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Видео</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
    }
  </style>
</head>

<body>

  <div>
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

    $sql = "SELECT * FROM bookings";
    $result = $conn->query($sql);

    // Формирование HTML-кода формы
    $formHTML = '<form id="videoForm">';
    $formHTML .= '<table>';
    $formHTML .= '<tr>
                  <th>id</th>
                  <th>Имя</th>
                  <th>Тип услуги</th>
                  <th>Номер телефона</th>
                  <th>Дата записи</th>
                  <th>Комментарий</th>
                  </tr>';
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $checked = ($row["display"] == 1) ? 'checked' : '';
        $formHTML .= '<tr>';

        $formHTML .= '<td>' . $row["id"] . '</td>';
        $formHTML .= '<td>' . $row["name"] . '</td>';
        $formHTML .= '<td>' . $row["type_service"] . '</td>';
        $formHTML .= '<td>' . $row["phone_number"] . '</td>';
        $formHTML .= '<td>' . $row["date"] . '</td>';
        $formHTML .= '<td>' . $row["comment"] . '</td>';

        $formHTML .= '</tr>';
      }
    } else {
      $formHTML .= '<div>Нет данных для отображения</div>';
    }
    $formHTML .= '</table>';
    $formHTML .= '</form>';

    echo $formHTML;

    $conn->close();
    ?>
  </div>
</body>

</html>