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

  <div>
    <form id="barberForm">
      <label for="name">Имя барбера:</label>
      <input type="text" id="name" name="name" required>
      <label for="photo_path">Выберите фото из папки barber_photos</label>
      <input type="file" id="photo_path" name="photo_path">
      <button type="submit" id="submitbarberAdd">Добавить барбера</button>
    </form>
  </div>

  <script>
    document.getElementById('submitbarberAdd').addEventListener('click', function () {
      var formData = new FormData(document.getElementById('barberForm'));
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'procces_barber.php', true);
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