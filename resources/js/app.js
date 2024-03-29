
import './bootstrap';
import { createApp } from 'vue';
import router from "@/router/router.js";


const app = createApp({});
import Index from './views/Index.vue';
app.component('index', Index);
app.use(router);

app.mount('#app');
