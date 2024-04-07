let block_main = document.querySelector(".block_main");
let block_primer = document.querySelector(".block_primer");
let block_main2 = document.querySelector(".block_main2");
let block_primer2 = document.querySelector(".block_primer2");
let block_main3 = document.querySelector(".block_main3");
let block_primer3 = document.querySelector(".block_primer3");
let block_main4 = document.querySelector(".block_main4");
let block_primer4 = document.querySelector(".block_primer4");
let block_main5 = document.querySelector(".block_main5");
let block_primer5 = document.querySelector(".block_primer5");

block_primer.classList.add("none");
block_main.addEventListener("click", () => {
 block_primer.classList.toggle("none");
});

block_primer2.classList.add("none");
block_main2.addEventListener("click", () => {
 block_primer2.classList.toggle("none");
});

block_primer3.classList.add("none");
block_main3.addEventListener("click", () => {
 block_primer3.classList.toggle("none");
});

block_primer4.classList.add("none");
block_main4.addEventListener("click", () => {
 block_primer4.classList.toggle("none");
});

block_primer5.classList.add("none");
block_main5.addEventListener("click", () => {
 block_primer5.classList.toggle("none");
});
