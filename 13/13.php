<?php
$words = ["hello", "world", "php", "programming"];
$currentWord = $words[array_rand($words)];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["word"] == $currentWord) {
        // Правильно введено слово
        $currentWord = $words[array_rand($words)];
        // Обновление времени и статистики
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Клавиатурный тренажер</title>
</head>
<body>
<h1>Введите слово: <?php echo $currentWord; ?></h1>
<form method="post">
    <input type="text" name="word">
    <input type="submit" value="Проверить">
</form>
</body>
</html>