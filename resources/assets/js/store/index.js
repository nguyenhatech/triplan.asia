import Vue from 'vue'
import Vuex from 'vuex'

/**
 * -----------------------------------------------------------------------------------------------------------
 * Loading vuex modules
 * -----------------------------------------------------------------------------------------------------------
 */
// Trang chi tiết dịch vụ
import serviceDetail from '../components/service-detail/store'

Vue.use(Vuex)

const debug = false

export default new Vuex.Store({
  modules: {
    serviceDetail
  },
  state: {
    loading: false,
    trans: null
  },
  getters: {
    loading: (state) => state.loading,
    trans: (state)  => state.trans
  },
  actions: {
    fetchTranslations ({commit, dispatch}) {
        axios.get(window.location.origin + '/js/lang.js').then(response => {
            commit('setTrans', response)
        })
    }
  },
  mutations: {
    setTrans (state, trans) {
        state.trans = trans
    }
  },
  strict: debug
})
