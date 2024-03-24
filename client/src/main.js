import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'bootstrap/dist/css/bootstrap.min.css'
import { apiRoute } from '@/services/apiRoute.js';

const app = createApp(App);

// protótipo Vue para acesso global
app.config.globalProperties.$apiRoute = apiRoute;

app.use(router).mount('#app');
