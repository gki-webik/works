import { rootFunction } from "../index";
import { useState } from "react";
let state = {
 m: [
  { text: "Мудрецы говорили: Прошлое - забыто, будущее - закрыто, а настоящее - даровано. Поэтому его и зовут настоящим.", likes: "334", date: Date() },
  { text: "Если все время зацикливаться на прошлом, то можно убить настоящее.", likes: "982", date: Date() },
 ],
 dd: [
  { chatId: "1", name: "Вася", img: "iconka.png" },
  { chatId: "2", name: "Коля", img: "iconka.png" },
  { chatId: "3", name: "Петя", img: "iconka.png" },
 ],
 md: [
  { chatId: "1", messageFrom: "Век живи, век учись...", messageTo: "Все равно дураком помрешь." },
  { chatId: "2", messageFrom: "Век живи, век учись...2", messageTo: "Все равно дураком помрешь.2" },
 ],
 addPost(e) {
  if (e != "" && e != " ") {
   let newPost = {
    text: e,
    likes: "0",
   };
   state.m.push(newPost);
   rootFunction();
  }
 },
 sts(e) {
  if (e.type == "restart_add_post") {
   console.log(e.type);
  }
 },
};
export default state;
