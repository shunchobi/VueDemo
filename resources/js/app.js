import './bootstrap';

import '../css/app.scss'
import { createApp } from 'vue'
import App from './App.vue'
import Test from './Test.vue'
import Section2 from './Section2.vue'
import ComponentsGameApp from './ComponentsGame/ComponentsGameApp.vue'
import FormApp from './Forms/FormApp.vue'
import ApiTest from './ApiTest.vue'


const app = document.querySelector('#app');
if (app) {
  createApp(App).use(router).mount(app);
}
const test = document.querySelector('#test');
if (test) {
  createApp(Test).mount(test);
}
const section2 = document.querySelector('#sec2');
if (section2) {
  createApp(Section2).mount(section2);
}
const componentsGame = document.querySelector('#components-game');
if (componentsGame) {
  createApp(ComponentsGameApp).mount(componentsGame);
}
const formApp = document.querySelector('#form-app');
if (formApp) {
  createApp(FormApp).mount(formApp);
}
const apiTest = document.querySelector('#api-test');
if (apiTest) {
  createApp(ApiTest).mount(apiTest);
}


// createApp(App).mount('#app')
// createApp(Test).mount('#test')
// createApp(Section2).mount('#sec2')
// createApp(ComponentsGameApp).mount('#components-game')