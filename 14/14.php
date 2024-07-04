<!DOCTYPE html>
<html>
<head>
  <title>График</title>
</head>
<body>
  <canvas id="myCanvas" width="600" height="400"></canvas>
  <script>
    const canvas = document.getElementById('myCanvas');
    const ctx = canvas.getContext('2d');

    const data = [65, 59, 80, 81, 56, 55];
    const labels = ['January', 'February', 'March', 'April', 'May', 'June'];

    const width = canvas.width / data.length;

    // Находим максимальное значение для масштабирования
    const maxData = Math.max(...data);

    ctx.beginPath();
    ctx.moveTo(0, canvas.height - (data[0] / maxData) * canvas.height);

    for (let i = 1; i < data.length; i++) {
      const x = i * width;
      const y = canvas.height - (data[i] / maxData) * canvas.height;
      ctx.lineTo(x, y);
    }

    ctx.stroke();

    // Отрисовка меток осей
    ctx.font = '12px Arial';
    ctx.textAlign = 'center';
    for (let i = 0; i < labels.length; i++) {
      const x = (i + 0.5) * width;
      ctx.fillText(labels[i], x, canvas.height);
    }

    ctx.textAlign = 'right';
    for (let i = 0; i < data.length; i++) {
      const y = canvas.height - (data[i] / maxData) * canvas.height;
      ctx.fillText(data[i], 0, y);
    }
  </script>
</body>
</html>
