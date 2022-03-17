require('./bootstrap');

import * as Vue from "vue"
import App from './App.vue'
import axios from 'axios'
import router from './router'
import Default from "./layouts/Default"

Vue.createApp(App).component('default-layout', Default).use(router).mount('#app');
