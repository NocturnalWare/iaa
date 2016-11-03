var Vue    = require('../vue.min.js');

import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
  search_input: {input : ''},
}

const mutations = {

}

if(typeof inkaddict !== 'undefined'){
}

export default new Vuex.Store({
  state,
  mutations
})