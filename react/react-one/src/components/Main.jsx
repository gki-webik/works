import MyPosts from "./MyPosts";
import BaseLayout from "./BaseLayout";
import React from "react";
import state from "../redux/state";
const Main = (props) => {
 let m = props.state.m;
 let newPostElement = React.createRef();
 let vf1 = () => {
  if (newPostElement.current.value != "" && newPostElement.current.value != " ") {
   state.addPost(newPostElement.current.value);
   newPostElement.current.value = "";
   state.sts({ type: "restart_add_post" });
  }
 };
 let c = {
  ph: "profile_logo_name",
 };
 let mArray = m.map((e) => {
  return <MyPosts message={e.text} likes={e.likes} date={e.date}></MyPosts>;
 });
 return (
  <BaseLayout>
   <div className="Main">
    <div className="main_div">
     <div className="header_profile">
      <div className={c.ph}>
       <img src="./iconka.png" className="logo" alt="logo" />
       Кирилл Гуляев
      </div>
      <div className="profile_descripton">Full Stack разработчик web и мультимедийных приложений</div>
     </div>
     <form action="" className="form_posts">
      <textarea className="textarea_posts" name="" ref={newPostElement} cols="30" rows="4"></textarea>
      <button className="btn_posts" type="button" onClick={vf1}>
       Добавить пост
      </button>
     </form>
     <div className="posts">{mArray}</div>
    </div>
   </div>
  </BaseLayout>
 );
};
export default Main;
