import router  from './routes.js';
import VueObserveVisibility from 'vue-observe-visibility'
import store from './store/store.js'

import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueObserveVisibility)


new Vue({

    router,
    store,
    computed:{
		currentPage(){
			return this.$route.path
		}
	},


}).$mount('#app')
