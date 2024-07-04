<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        header {
            height: 70px;
        }
        .logo {
            color: black;
            font-size: 32px;
            text-decoration: underline;
            margin-left: 3vh;
        }
        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: fit-content;
            width: 50%;
            gap: 2vh;
        }
        .form > article {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2vh;
        }
        .result {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2vh;
            height: fit-content;
            width: 50%;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="logo">Генератор</h1>
    </header>
    <main>
        <article class="box">
            <form action="index.php" method="post" class="form">
                <article>
                    <label>Введите число символов<input type="number" name="numberSymbol" class="" min="10" max="25" required></label>
                    <label>Введите количество вариаций<input type="number" name="numberPassword" class="" min="1" max="100" required></label>
                </article>
                <button class="" type="submit">Сгенерировать пароли</button>
            </form>
            <section class="result">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $numberPassword = $_POST['numberPassword'];
                    $numberSymbol = $_POST['numberSymbol'];
                    function generatePassword($numberSymbol) {
                        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                        $count = strlen($chars);
                        
                        do {
                            $result = '';
                            for ($i = 0; $i < $numberSymbol; $i++) {
                                $index = rand(0, $count - 1);
                                $result .= substr($chars, $index, 1);
                            }
                        } while (in_array($result, $_SESSION['generated_passwords'] ?? []));
                        $_SESSION['generated_passwords'][] = $result;
                        return $result;
                    }
                    $_SESSION['generated_passwords'] ?? [];
                    for ($i = 0; $i < $numberPassword; $i++) {
                        echo generatePassword($numberSymbol) . "<br>";
                    }
                }
                ?>
            </section>
        </article>
    </main>
    <footer>

    </footer>
    <script>

    </script>
</body>
</html>

<!-- 
PHP-код: PHP-код начинается после проверки $_SERVER["REQUEST_METHOD"] == "POST", что гарантирует выполнение только при отправке формы методом POST.
далее объявляем переменные в коотрые записываем инпуты.
создаем функцию и передаем аргумент количество символов, 
создаем перемнную с возможными символами и переменную в которую получаем длину предыдущей.
через цикл do while создаем переменную строку result(пустую) в которую через цикл for записываем рандомно символы
через rand() - рандом (используем для индекса) и substr() - выделение подстроки изходя из рандомного индекса.
цикл будет продолжать пока result находится в массиве служит для уникальности 
создаем $_SESSION['generated_passwords']: Массив для хранения уникальных сгенерированных паролей в текущей сессии и присваиваем ему обыччныю переменную $result
и возвращаем $result
создаем цикл который генирирует и после выводит пароли
?? - тернарный оператор. типо if 
-->