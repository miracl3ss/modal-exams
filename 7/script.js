const colorPickInput = document.getElementById('colorPickInput');
const rangePickInput = document.getElementById("rangePickInput");
const drawingBoard = document.getElementById("drawing-board");
const clearbtn = document.getElementById("clearr");

const ctx = drawingBoard.getContext('2d');

const widthCanvas = drawingBoard.width = 1200;
const higthCanvas = drawingBoard.height = 500;

let lineWidth = rangePickInput.value;

let isDrawing = false;

//инструменты (толко кисть)
const tools = {brush: 'b'};

let currentTool = tools.brush;


//условия рисования
function draw(event){
    if(!isDrawing) return;
    if(currentTool === tools.brush){
        drowBash(event);
    }}

//рисовать
function startDrawing(event){
    isDrawing = true;
    prevMouseX = event.offsetX;
    prevMouseY = event.offsetY;
    let currentColor = colorPickInput.value;
    console.log(currentColor);
    ctx.strokeStyle = currentColor;
    ctx.lineWidth = lineWidth;
    ctx.beginPath();
    snapshot = ctx.getImageData(0, 0, widthCanvas, higthCanvas)
}
//для рисовария опредиляет координаты курсора и закругляет линию 
function drowBash(event){
    ctx.lineCap = 'round';
    ctx.lineJoin = 'round';
    ctx.lineTo(event.offsetX, event.offsetY);
    ctx.stroke();
}

// не рисовать
function stopDrawing(event){
    isDrawing = false;
    ctx.closePath();
}

function lineWidthh(event){
    lineWidth = event.target.value;
}
function color(event){
    linecolor = event.target.value;
}



//очистить
function clearConvas(){
    ctx.clearRect(0, 0, widthCanvas, higthCanvas);
}

    drawingBoard.addEventListener('mousemove', draw);
    window.addEventListener('mousedown', startDrawing);
    window.addEventListener('mouseup', stopDrawing);
    clearbtn.addEventListener('click', clearConvas);
    colorPickInput.addEventListener('change', color);
    rangePickInput.addEventListener('change', lineWidthh);
