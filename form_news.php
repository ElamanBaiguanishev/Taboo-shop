<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Барберы</title>
  <style>
  </style>
</head>

<body>

  <div style="display:flex">
    <form id="newsForm">
      <div><label for="header">Заголовок новости:</label>
        <input type="text" id="header" name="header" required>
      </div>

      <div><label for="content">Текст:</label>
        <textarea name="content" id="content" required></textarea>
      </div>

      <div><label for="photo_path">Выберите фото из папки news</label>
        <input type="file" id="photo_path" name="photo_path">
      </div>


      <button type="submit" id="submitnewsAdd">Создать новость</button>
    </form>
  </div>

  <script>
    document.getElementById('submitnewsAdd').addEventListener('click', function () {
      var formData = new FormData(document.getElementById('newsForm'));
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'procces_news.php', true);
      xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
          window.location.reload();
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

</body>

</html>