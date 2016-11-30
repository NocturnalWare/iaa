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
import noteBlock from './components/note-block.vue';
import quantityPriceIndex from './components/quantity-price-index.vue';
import upchargePriceIndex from './components/upcharge-price-index.vue';


new Vue({
    el: '#inkaddict',
    data:{ },
    components:{
    	createOrder,
    	orderTable,
    	noteBlock,
    	upchargePriceIndex,
    	quantityPriceIndex,
    },

});