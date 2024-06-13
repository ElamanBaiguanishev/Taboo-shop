<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Отзывы</title>
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
    // Ваш PHP-код
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

    // Если форма отправлена, обновляем записи в базе данных
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      foreach ($_POST['checkboxes'] as $id => $checked) {
        $sql = "UPDATE feedbacks SET display = '$checked' WHERE id = '$id'";
        $conn->query($sql);
      }
      echo "Данные успешно обновлены";
      exit;
    }

    // SQL запрос для выборки данных из таблицы feedbacks
    $sql = "SELECT * FROM feedbacks";
    $result = $conn->query($sql);

    // Формирование HTML-кода формы
    $formHTML = '<form id="feedbackForm">';
    $formHTML .= '<table>';
    $formHTML .= '<tr>
      <th>name</th>
      <th>rating</th>
      <th>comment</th>
      <th>Отобразить</th>
      </tr>';
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $checked = ($row["display"] == 1) ? 'checked' : '';
        $formHTML .= '<tr>';
        $formHTML .= '<td>' . $row["name"] . '</td>';
        $formHTML .= '<td>' . $row["rating"] . '</td>';
        $formHTML .= '<td>' . $row["comment"] . '</td>';
        $formHTML .= '<td><input type="checkbox" name="checkboxes[' . $row["id"] . ']" ' . $checked . '></td>';
        $formHTML .= '<tr>';
      }
    } else {
      $formHTML .= '<div>Нет данных для отображения</div>';
    }
    $formHTML .= '</table>';
    $formHTML .= '<button type="button" id="submitFeedback">Сохранить</button>';
    $formHTML .= '</form>';

    echo $formHTML;

    $conn->close();
    ?>
  </div>

  <script>
    document.getElementById('submitFeedback').addEventListener('click', function (e) {
      e.preventDefault();
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      var formData = new FormData();
      checkboxes.forEach(function (checkbox) {
        formData.append(checkbox.name, checkbox.checked ? 1 : 0);
      });
      var xhr = new XMLHttpRequest();
      xhr.open('POST', window.location.href, true);
      xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
          // Нет подтверждения
        } else {
          console.error('Ошибка при отправке запроса');
        }
      };
      xhr.onerror = function () {
        console.error('Ошибка при отправке запроса');
      };
      xhr.send(formData);
    });
  </script>



</body>

</html>