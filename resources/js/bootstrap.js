window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import React from "react";

import Logo from "../images/logo.svg";

import ReactDOM from "react-dom";
import App from "./app.jsx";

// ReactDOM.render(<App />, document.getElementById("root"));
