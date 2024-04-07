import { NavLink } from "react-router-dom";
import { useState } from "react";
const Header = () => {
 let [now, setNow] = useState(new Date());
 setInterval(() => {
  setNow(new Date());
 }, 1000);
 return (
  <div className="header">
   <div className="logo_header_div">
    <img src="../iconka.png" className="img_logo" alt="img" />
    <a href="//gki-webik.ru" target="_blank">
     WEBIK
    </a>
    <nav className="nav_header">
     <NavLink to={`/`}>Главная</NavLink>
     <NavLink to={`/message`}>Сообщения</NavLink>
    </nav>
   </div>
   <span className="Date__Header">{now.toLocaleString()}</span>
  </div>
 );
};
export default Header;
