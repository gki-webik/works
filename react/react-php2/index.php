<?php
require 'db.php';


function registerUser($pdo) {
    $user = insertUser($pdo);
    if ($user) {
        // Куки действительны 30 дней
        setcookie('user_id', $user['id'], time() + (86400 * 30), "/");
        return $user;
    } else {
        return false;
    }
}

function checkAuth($pdo) {
    if (isset($_COOKIE['user_id'])) {
        $userId = $_COOKIE['user_id'];
        return getUserById($pdo, $userId);
    }
    return false;
}


$user = checkAuth($pdo);


if (isset($_POST['register']) && !$user) {
    $user = registerUser($pdo);
    if (!$user) {
        echo "Ошибка создания пользователя";
    }
}


if (!$user) {
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Регистрация</title>
    </head>
    <body>
    <h2>Регистрация</h2>
    <form method="POST">
        <button type="submit" name="register">Зарегистрироваться</button>
    </form>
    </body>
    </html>

    <?php
    exit;
}

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
    <script src="js/development.js"></script>
    <script src="js/react-dom.development.js"></script>
    <script src="js/babel.js"></script>
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

            fetch('', {
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
                    <p>Аккаунт #{<?= htmlspecialchars($user['id']) ?>} создан, для доступа используйте ссылку: {window.location.href}</p>
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
