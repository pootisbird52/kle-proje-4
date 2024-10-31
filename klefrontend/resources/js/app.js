import './bootstrap';

import.meta.glob([
    '../images/**'
]);

import Alpine from 'alpinejs';
import axios from 'axios'; 

window.Alpine = Alpine;
window.axios = axios;

Alpine.start();

window.axios.defaults.withCredentials = true;
window.axios.defaults.withXSRFToken = true;
