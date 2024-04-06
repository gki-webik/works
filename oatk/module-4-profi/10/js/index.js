const arr = ["Цитата N1", "Цитата N2", "Цитата N3", "Цитата N4", "Цитата N5", "Цитата N6", "Цитата N7", "Цитата N8", "Цитата N9", "Цитата N10"];
setInterval(() => {
    document.querySelector("blockquote").innerHTML = arr[Math.floor(Math.random() * arr.length)];
}, 30000);
document.querySelector(".btn").addEventListener("click", () => {
    document.querySelector("blockquote").innerHTML = arr[Math.floor(Math.random() * arr.length)];
});