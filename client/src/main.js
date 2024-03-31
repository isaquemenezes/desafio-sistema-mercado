import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css'
import { apiRoute } from '@/services/apiRoute.js';

const app = createApp(App);

// Definindo o Axios globalmente
app.config.globalProperties.$httpAxios = axios;

// protótipo Vue para acesso global
app.config.globalProperties.$apiRoute = apiRoute;

app.use(router).mount('#app');
