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
    <div>id видео брать отсюда:</div>
    <img src="assets/url_youtube.png" alt="">
    <form id="videoForm">
      <label for="video_id">ID видео:</label>
      <input type="text" id="video_id" name="video_id" required>
      <button type="submit" id="submitVideoAdd">Добавить видео</button>
    </form>
  </div>

  <script>
    document.getElementById('submitVideoAdd').addEventListener('click', function () {
      var formData = new FormData(document.getElementById('videoForm'));
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'process_video.php', true);
      xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
          window.location.reload()
          alert(xhr.responseText);
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

    // Если форма отправлена, обновляем записи в базе данных
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      foreach ($_POST['checkboxes'] as $id => $checked) {
        $sql = "UPDATE videos SET display = '$checked' WHERE id = '$id'";
        $conn->query($sql);
      }
      echo "Данные успешно обновлены";
      exit;
    }

    $sql = "SELECT * FROM videos";
    $result = $conn->query($sql);

    // Формирование HTML-кода формы
    $formHTML = '<form id="videoForm">';
    $formHTML .= '<table>';
    $formHTML .= '<tr>
        <th>id</th>
        <th>video_id</th>
        <th>Отобразить</th>
        </tr>';
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $checked = ($row["display"] == 1) ? 'checked' : '';
        $formHTML .= '<tr>';
        $formHTML .= '<td>' . $row["id"] . '</td>';
        $formHTML .= '<td>' . $row["video_id"] . '</td>';
        $formHTML .= '<td><input type="checkbox" name="checkboxes[' . $row["id"] . ']" ' . $checked . '></td>';
        $formHTML .= '<tr>';
      }
    } else {
      $formHTML .= '<div>Нет данных для отображения</div>';
    }
    $formHTML .= '</table>';
    $formHTML .= '<button type="button" id="submitVideo">Сохранить</button>';
    $formHTML .= '</form>';

    echo $formHTML;

    $conn->close();
    ?>
  </div>

  <script>
    document.getElementById('submitVideo').addEventListener('click', function (e) {
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