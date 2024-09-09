import { createRouter, createWebHistory } from 'vue-router';
import Test from './components/Test.vue';
import Error from './components/status/Error.vue';

const routes = [
    {
        path: '/',
        name: 'Test',
        component: Test
    },
    {
        path: '/error/:type',
        name: 'Error',
        component: Error
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;