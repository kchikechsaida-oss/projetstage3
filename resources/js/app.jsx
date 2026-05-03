// import './bootstrap';
// import React from "react";
// import ReactDOM from "react-dom/client";
//import Cart from "./components/Cart";
// // import Search from "./components/Search";

// ReactDOM.createRoot(document.getElementById("app")).render(
//     <Cart />
// );

// import React from "react";
// import ReactDOM from "react-dom/client";
// import Cart from "./components/Cart";

// const el = document.getElementById("app");

// if (el) {
//     ReactDOM.createRoot(el).render(<Cart />);
// }


// import React from "react";
// import ReactDOM from "react-dom/client";
// import Cart from "./components/Cart.jsx";

// document.addEventListener("DOMContentLoaded", function () {
//     const el = document.getElementById("app");

//     if (el) {
//         ReactDOM.createRoot(el).render(<Cart />);
//     }
// });


import React from "react";
import ReactDOM from "react-dom/client";

function App() {
    return <h1 style={{color:"green"}}>REACT WORKS ✅</h1>;
}

ReactDOM.createRoot(document.getElementById("app")).render(<App />);