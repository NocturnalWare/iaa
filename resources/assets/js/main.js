var Vue    = require('vue/dist/vue.js');
var jQuery = require('./jquery.min.js');
var Router = require('./vue-router.min.js');
var moment = require('moment');

Vue.use(require('./vue-resource.min.js'));


window.jQuery = jQuery;
window.Vue = Vue;
window.moment = moment;

import createOrder from './components/create-order.vue';
import orderTable from './components/order-table.vue';

new Vue({
    el: '#inkaddict',
    data:{ },
    components:{
    	createOrder,
    	orderTable,
    },

});