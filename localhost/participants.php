<!DOCTYPE html>
<html>
<head>
    <title>Конференция - Список участников</title>
    <link rel="shortcut icon" type="image/png" href="Images\favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="Style\style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Конференция</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="participants.php">Список</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2 class="header-title">Список зарегистрированных участников</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Имя Фамилия</th>
                    <th>Название организации</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
              <?php
              // Подключение к базе данных
$db_host = '127.0.0.1';
$db_name = 'database_name';
$db_user = 'root';
$db_password = '';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Ошибка подключения к базе данных: ' . $e->getMessage());
}

              // Получение списка зарегистрированных участников
              $stmt = $db->query("SELECT * FROM participants");

              $count = 1;
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>";
                  echo "<td>".$count."</td>";
                  echo "<td>".$row['name']." ".$row['surname']."</td>";
                  echo "<td>".$row['organization']."</td>";
                  echo "<td><a href='mailto:".$row['email']."'>".$row['email']."</a></td>";
                  echo "</tr>";
                  $count++;
              }
              ?>


            </tbody>
        </table>
    </div>

    <footer class="footer">
        <div class="container">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/86edd8308f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
