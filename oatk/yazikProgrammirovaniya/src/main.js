import './assets/styles/dist/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

/* import { checkMyWK_TOKEN } from "./checkMyWK_TOKEN"; */

const app = createApp(App);

/* app.config.globalProperties.$checkMyWK_TOKEN = checkMyWK_TOKEN; */

app.use(router).mount('#app');