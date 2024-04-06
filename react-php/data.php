<?php
require 'db.php';

if (!isset($_GET['hash'])) {
    die('Доступ запрещен. Используйте хэш-ссылку для доступа к вашим данным.');
}

function getUserByHash($pdo, $hash) {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE hash = :hash LIMIT 1");
    $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ? $user : false;
}

$hash = $_GET['hash'];
$user = getUserByHash($pdo, $hash);



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['text'])) {
    $success = insertText($pdo, $user['id'], $_POST['text']);
    $message = $success ? "<p>Успешно</p>" : "<p>Ошибка</p>";
    echo $message;
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>ЛК: Отправить текст</title>
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/babel-standalone"></script>
</head>
<body>
    <div id="app"></div>
    <script type="text/babel">
        class TextForm extends React.Component {
            state = { text: '', message: '' };

            handleSubmit = (e) => {
                e.preventDefault();
                const formData = new FormData();
                formData.append('text', this.state.text);

                fetch('?hash=<?= htmlspecialchars($hash) ?>', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    this.setState({ message: data });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            };

            handleChange = (e) => {
                this.setState({ text: e.target.value });
            };

            render() {
                return (
                    <div>
                        <p>Аккаунт #<?= htmlspecialchars($user['id']) ?> создан, для доступа используйте ссылку: <?= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?></p>
						<h3>Отправить данные</h3>
                        <form onSubmit={this.handleSubmit}>
                            <textarea onChange={this.handleChange}></textarea>
                            <button type="submit">Отправить</button>
                        </form>
                        {this.state.message && <p>{this.state.message}</p>}
                    </div>
                );
            }
        }

        ReactDOM.render(<TextForm />, document.getElementById('app'));
    </script>
</body>
</html>