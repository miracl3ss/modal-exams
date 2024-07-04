<?php
session_start();

if (!isset($_SESSION['balance'])) {
  $_SESSION['balance'] = 0;
}
if (!isset($_SESSION['transactions'])) {
  $_SESSION['transactions'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['deposit'])) {
    $amount = floatval($_POST['amount']);
    if ($amount > 0) {
      $_SESSION['balance'] += $amount;
      $_SESSION['transactions'][] = ['type' => 'deposit', 'amount' => $amount];
    } else {
      echo "<p style='color: red;'>Ошибка: Сумма должна быть больше 0</p>";
    }
  } elseif (isset($_POST['withdraw'])) {
    $amount = floatval($_POST['amount']);
    if ($amount > 0 && $_SESSION['balance'] >= $amount) {
      $_SESSION['balance'] -= $amount;
      $_SESSION['transactions'][] = ['type' => 'withdraw', 'amount' => $amount];
    } elseif ($amount <= 0) {
      echo "<p style='color: red;'>Ошибка: Сумма должна быть больше 0</p>";
    } else {
      echo "<p style='color: red;'>Ошибка: Недостаточно средств</p>";
    }
  } elseif (isset($_POST['convert'])) {
    $amount = floatval($_POST['amount']);
    $from = $_POST['from'];
    $to = $_POST['to'];

    // Логика конвертации валют (пример)
    $convertedAmount = convertCurrency($amount, $from, $to);

    // Вывод результата конвертации
    echo "Конвертированное значение: " . $convertedAmount;
  }
}

// Функция для конвертации валюты (пример)
function convertCurrency($amount, $from, $to) {
  // Логика конвертации валют
  if ($from == 'EUR' && $to == 'USD') {
    return $amount * 1.1; // Примерный курс EUR/USD
  } elseif ($from == 'USD' && $to == 'EUR') {
    return $amount / 1.1;
  } else {
    return $amount; // Если валюты совпадают
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Электронный кошелек</title>
</head>
<body>
  <h1>Баланс: <?php echo $_SESSION['balance']; ?></h1>
  <form method="post">
    <input type="number" name="amount" placeholder="Сумма">
    <input type="submit" name="deposit" value="Пополнить">
    <input type="submit" name="withdraw" value="Снять">
  </form>
  <h2>История транзакций</h2>
  <ul>
    <?php foreach ($_SESSION['transactions'] as $transaction) { ?>
      <li><?php echo $transaction['type'] . ': ' . $transaction['amount']; ?></li>
    <?php } ?>
  </ul>
  <h2>Конвертация валюты</h2>
  <form method="post">
    <input type="number" name="amount" placeholder="Сумма">
    <select name="from">
      <option value="EUR">EUR</option>
      <option value="USD">USD</option>
    </select>
    <select name="to">
      <option value="EUR">EUR</option>
      <option value="USD">USD</option>
    </select>
    <input type="submit" name="convert" value="Конвертировать">
  </form>
</body>
</html>
