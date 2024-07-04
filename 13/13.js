const words = ["hello", "world", "javascript", "programming"];
let currentWord = words[Math.floor(Math.random() * words.length)];
let inputField = document.getElementById("input");
let timer = document.getElementById("timer");
let startTime = Date.now();

inputField.addEventListener("input", () => {
    if (inputField.value === currentWord) {
        // Правильно введено слово
        startTime = Date.now();
        currentWord = words[Math.floor(Math.random() * words.length)];
        inputField.value = "";
        timer.textContent = "Время: 0";
    }
});

setInterval(() => {
    const elapsedTime = Math.floor((Date.now() - startTime) / 1000);
    timer.textContent = `Время: ${elapsedTime}`;
}, 1000);