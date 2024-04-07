import Header from "./Header";
import * as React from "react";
import Footer from "./Footer";

const BaseLayout = ({children}) => {
  return (
    <div>
      <Header/>
      {children}
      <Footer/>
    </div>
  );
};
export default BaseLayout;
