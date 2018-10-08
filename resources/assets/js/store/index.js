import Vue from 'vue'
import Vuex from 'vuex'
import actions from './actions'
import mutations from './mutations'
import getters from './getters'
import Recorder from '../src/Recorder'

Vue.use(Vuex)

const state = {
    actions: {},
    collaborators: {},
    grades: {},
    input: {
        action: {},
        postCollaborator: {},
        actCollaborator: {},
    },
    status: {
        ready: false,
        recording: false,
        recorded: false,
        uploaded: false,
    },
    users: {},
    recorder: new Recorder(),
}

export default new Vuex.Store({
  state,
  mutations,
  actions,
  getters,
})
