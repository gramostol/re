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

// Получение данных из формы
$name = $_POST['name'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$organization = $_POST['organization'];
$position = $_POST['position'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];

// Вставка данных в базу данных
try {
    $stmt = $db->prepare("INSERT INTO participants (name, surname, gender, nationality, organization, position, birthdate, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $surname, $gender, $nationality, $organization, $position, $birthdate, $email]);
} catch (PDOException $e) {
    die('Ошибка выполнения запроса: ' . $e->getMessage());
}

// Перенаправление на страницу со списком зарегистрированных участников
header('Location: index.php');
exit;
?>
