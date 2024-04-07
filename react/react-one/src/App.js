import "./assets/css/App.css";
import Main from "./components/Main";
import Test from "./components/Test";
import ErrorPage from "./components/ErrorPage";
import { createBrowserRouter, RouterProvider } from "react-router-dom";
import * as React from "react";

const App = () => {
 const router = createBrowserRouter([
  {
   path: "/",
   element: <Main />,
   errorElement: <ErrorPage />,
  },
  {
   path: "/test",
   element: <Test />,
  },
 ]);
 return <RouterProvider router={router} />;
};

export default App;
