// const canvas = document.getElementById("canvas");
//         const ctx = canvas.getContext("2d");
//         const object = {
//             x: 100,
//             y: 100,
//             vx: 2,
//             vy: 2,
//             radius: 4,
//             color: "blue"
//         };

//         const trajectory = [
//             { x: 100, y: 100, vx: 2, vy: 2 },
//             { x: 200, y: 200, vx: 2, vy: 2 },
//             { x: 300, y: 300, vx: 2, vy: 2 },
//             { x: 400, y: 300, vx: 2, vy: 0 },
//             { x: 400, y: 400, vx: 0, vy: 4 },
//             { x: 500, y: 450, vx: 2, vy: 1 },
//             { x: 550, y: 450, vx: 1, vy: 0 }
//         ];

const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

const object = {
    x: 100,
    y: 100,
    vx: 2,
    vy: 2,
    radius: 10,
    color: "blue"
};

const trajectory = [
    { x: 100, y: 100, vx: 2, vy: 2 },
    { x: 200, y: 200, vx: 2, vy: 2 },
    { x: 300, y: 300, vx: 2, vy: 2 },
    { x: 400, y: 300, vx: 2, vy: 0 },
    { x: 400, y: 400, vx: 0, vy: 4 },
    { x: 500, y: 450, vx: 2, vy: 1 },
    { x: 650, y: 450, vx: 1, vy: 0 }
    // Добавьте больше точек траектории
];

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Рисуем объект
    ctx.beginPath();
    ctx.arc(object.x, object.y, object.radius, 0, 2 * Math.PI);
    ctx.fillStyle = object.color;
    ctx.fill();

    // Обновляем положение объекта
    object.x += object.vx;
    object.y += object.vy;

    // Проверяем, достиг ли объект конца траектории
    if (object.x >= trajectory[trajectory.length - 1].x - object.radius) {
        object.vx = 0; // Остановить движение по оси X
    }
    if (object.y >= trajectory[trajectory.length - 1].y - object.radius) {
        object.vy = 0; // Остановить движение по оси Y
    }

    // Изменяем скорость в зависимости от положения на траектории
    for (let i = 0; i < trajectory.length; i++) {
        if (object.x === trajectory[i].x && object.y === trajectory[i].y) {
            object.vx = trajectory[i].vx;
            
            object.vy = trajectory[i].vy;
            console.log(object.vx, object.vy); // Выходим из цикла после первого совпадения координаты
        }
    }

    // Рисуем траекторию
    ctx.beginPath();
    ctx.strokeStyle = "gray";
    ctx.lineWidth = 2;
    ctx.moveTo(trajectory[0].x, trajectory[0].y);
    for (let i = 1; i < trajectory.length; i++) {
        ctx.lineTo(trajectory[i].x, trajectory[i].y);
    }
    ctx.stroke();

    requestAnimationFrame(draw);
}

draw();