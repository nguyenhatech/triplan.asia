import Vue from 'vue'
import Vuex from 'vuex'

/**
 * -----------------------------------------------------------------------------------------------------------
 * Loading vuex modules
 * -----------------------------------------------------------------------------------------------------------
 */

Vue.use(Vuex)

const debug = false

export default new Vuex.Store({
  modules: {

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
  strict: debug,
  plugins: debug ? [createLogger()] : []
})
