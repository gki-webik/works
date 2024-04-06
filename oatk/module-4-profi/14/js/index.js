let btn_generate = document.querySelector(".btn_generate");
let psw_result = document.querySelector(".psw_result");
let psw_length = document.querySelector(".psw_length");

btn_generate.addEventListener("click", () => {
    let chk1 = document.querySelector("#chk1");
    let chk2 = document.querySelector("#chk2");
    let chk3 = document.querySelector("#chk3");
    let chk4 = document.querySelector("#chk4");
    let chk5 = document.querySelector("#chk5");
    let r_psw = () => {
        let symbols = "";
        chk1.checked ? symbols += "ABCDEFGHIJKLMNOPQRSTUVWXYZАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ" : null;
        chk2.checked ? symbols += "abcdefghijklmnopqrstuvwxyzабвгдеёжзийклмнопрстуфхцчшщъыьэюя" : null;
        chk3.checked ? symbols += "0123456789@#!*&^%$_-+=" : null;
        chk4.checked ? symbols += "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя" : null;
        chk5.checked ? symbols += "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz" : null;
        if (!chk1.checked && !chk2.checked && !chk3.checked && !chk4.checked && !chk5.checked) {
            symbols += "ABCDEFGHIJKLMNOPQRSTUVWXYZАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯabcdefghijklmnopqrstuvwxyzабвгдеёжзийклмнопрстуфхцчшщъыьэюя0123456789@#!*&^%$_-+=";
        }
        return symbols[Math.floor(Math.random() * symbols.length)];
    };
    if (psw_length.value >= 1) {
        let psw = "";
        for (let i = 0; i < psw_length.value; i++) {
            psw += r_psw();
        }
        psw_result.value = psw;
    } else {
        let psw = r_psw() + r_psw() + r_psw() + r_psw() + r_psw() + r_psw() + r_psw();
        psw_result.value = psw;
    }
});