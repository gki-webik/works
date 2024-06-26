import React from "react";
import ReactDOM from "react-dom/client";
import "./assets/css/index.css";
import App from "./App";
import reportWebVitals from "./reportWebVitals";
import state from "./redux/state";

const root = ReactDOM.createRoot(document.getElementById("root"));
export let rootFunction = () => {
 root.render(
  <React.StrictMode>
   <App state={state} />
  </React.StrictMode>
 );
};
rootFunction();

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
