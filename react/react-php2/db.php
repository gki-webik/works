<?php
$host = 'localhost'; // host
$dbname = 'cc';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Не могу соединиться с базой данных:" . $e->getMessage());
}

function getUserById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ? $user : false;
}


function insertUser(&$pdo) {
    $hash = bin2hex(random_bytes(16)); // Генерация хэша, милого нашего хэша
    $stmt = $pdo->prepare("INSERT INTO users (hash) VALUES (:hash)");
    $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
    if($stmt->execute()) {
        $id = $pdo->lastInsertId();
        return ['id' => $id, 'hash' => $hash];
    }
    return false;
}

function insertText($pdo, $id, $text) {
    $stmt = $pdo->prepare("INSERT INTO texts (user_id, text) VALUES (:id, :text)");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    return $stmt->execute();
}
?>
