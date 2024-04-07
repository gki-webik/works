let c = {
 item: "post_item",
 item_des: "post_item_descripton",
 item_likes: "post_item_likes",
};
const MyPosts = (props) => {
 return (
  <div className={c.item}>
   <div className={c.item_des}>{props.message}</div>
   <div className={c.item_likes}>{props.likes} Лайков</div>
   <div className={c.item_likes}>{props.date}</div>
  </div>
 );
};
export default MyPosts;
