import Vue from 'vue'
import Vuex from 'vuex'
import actions from './actions'
import mutations from './mutations'
import getters from './getters'
import Recorder from '../src/Recorder'

Vue.use(Vuex)

const state = {
    actions: {},
    selectedActionId: null,
    status: 'ready',    // 'ready' or 'started' or 'stopped' or 'done'
    users: {},
    recorder: new Recorder(),
}

export default new Vuex.Store({
  state,
  mutations,
  actions,
  getters,
})
