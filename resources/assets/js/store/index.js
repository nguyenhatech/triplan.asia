import Vue from 'vue'
import Vuex from 'vuex'

/**
 * -----------------------------------------------------------------------------------------------------------
 * Loading vuex modules
 * -----------------------------------------------------------------------------------------------------------
 */
import serviceDetail from '../components/service-detail/store'

Vue.use(Vuex)

const debug = false

export default new Vuex.Store({
  modules: {
    serviceDetail
  },
  state: {
    loading: false
  },
  getters: {
    loading: (state) => state.loading
  },
  actions: {

  },
  mutations: {

  },
  strict: debug
})
