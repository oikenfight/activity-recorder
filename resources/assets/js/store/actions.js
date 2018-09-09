export default {
    allActions ({commit}) {
        axios.get('api/actions')
            .then(response => {
                  commit('ALL_ACTIONS', response.data.actions)
        })
    },

    setSelectedActionId ({commit}, actionId) {
        commit('SET_SELECTED_ACTION_ID', actionId)
    },

    statusReady ({commit}) {
        commit('STATUS_READY')
    },

    statusStarted ({commit}) {
        console.log('here is statusStarted in action')
        commit('STATUS_STARTED')
    },

    statusStopped ({commit}) {
        commit('STATUS_STOPPED')
    },

    statusDone ({commit}) {
        commit('STATUS_DONE')
    },

    initRecording ({commit}) {
        commit('INIT_RECORDING')
    },

    saveVideo ({commit}, blobUrl) {
        commit('SAVE_VIDEO', blobUrl)
    }
}

