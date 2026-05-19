import './bootstrap';
import Axios from "axios";

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// const axios = Axios.create({
//     baseURL: "http://127.0.0.1:8000/",

//     timeout:60000,
//     //cookie 
//     withCredentials:true,
//     xsrfCookieName:"XSRF-TOKEN",
//     xsrfHeaderName:"X-XSRF-TOKEN",
//     headers:{
//         Accept:"application/json"
//     }

// });

// export default axios;