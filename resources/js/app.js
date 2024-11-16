import './bootstrap';

import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import ChildComponent from './components/ChildComponent.vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';

// const app = createApp({});
const app = createApp(App);

const routes = [
    { path: '/example', component: ExampleComponent },
    { path: '/child', component: ChildComponent },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
  
app.use(router);

app.component('example-component', ExampleComponent);
app.component('child-component', ChildComponent);

app.mount('#app');
