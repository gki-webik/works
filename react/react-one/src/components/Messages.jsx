import { NavLink } from "react-router-dom";
import BaseLayout from "./BaseLayout";
import state from "../redux/state";
let dd = state.dd;
let md = state.md;
const MessageItemUser = (props) => {
 return (
  <div className="users_item">
   <NavLink to={`/message/${props.chatId}`}>{props.name}</NavLink>
  </div>
 );
};
const MessageItemMsgFrom = (props) => {
 return (
  <div className="chat_history_item from">
   <article>
    <header>
     <img src={dd[props.chatId - 1].img} alt="" />
     {dd[props.chatId - 1].name}
    </header>
    <main>{md[props.chatId - 1].messageFrom}</main>
    <footer>26.12.2023 - 18:31</footer>
   </article>
  </div>
 );
};
const MessageItemMsgTo = (props) => {
 return (
  <div className="chat_history_item to">
   <article>
    <header>
     <img src={dd[props.chatId - 1].img} alt="" />
     Вы
    </header>
    <main>{md[props.chatId - 1].messageTo}</main>
    <footer>26.12.2023 - 18:31</footer>
   </article>
  </div>
 );
};
const MessageItemUserArray = dd.map((e) => {
 return <MessageItemUser name={e.name} chatId={e.chatId}></MessageItemUser>;
});
const Messages = () => {
 return (
  <BaseLayout>
   <div className="Message">
    <div className="message_div">
     <div className="users">{MessageItemUserArray}</div>
     <div className="chat">
      <div className="chat_history">
       <MessageItemMsgFrom chatId="1"></MessageItemMsgFrom>
       <MessageItemMsgTo chatId="1"></MessageItemMsgTo>
      </div>
      <div className="form">
       <form>
        <input type="text" autoFocus className="ipt_text" />
        <input type="submit" className="ipt_btn" />
       </form>
      </div>
     </div>
    </div>
   </div>
  </BaseLayout>
 );
};
export default Messages;
