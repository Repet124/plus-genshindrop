import './bootstrap';

import { createApp } from 'vue';
import { createRouter, createWebHashHistory} from 'vue-router';
import App from './components/App.vue';
import Home from './components/Home.vue';

import Mona from './components/Mona/Mona.vue';
import MonaCoocke from './components/Mona/MonaCoocke.vue';
import MonaHoroscope from './components/Mona/MonaHoroscope.vue';
import MonaMaginBall from './components/Mona/MonaMagicBall.vue';
import MonaTaro from './components/Mona/MonaTaro.vue';


const routes = [
	{ path: '/', component: Home },

	{ path: '/mona', component: Mona },
	{ path: '/mona/coocke', component: MonaCoocke },
	{ path: '/mona/horoscope', component: MonaHoroscope },
	{ path: '/mona/magic_ball', component: MonaMaginBall },
	{ path: '/mona/taro', component: MonaTaro },
];

const router = createRouter({
	history: createWebHashHistory(),
	routes: routes
});

const app = createApp(App);
app.use(router);
app.mount('#app');
