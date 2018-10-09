export default {
    allActions ({commit}) {
        axios.get('api/actions')
            .then(response => {
                  commit('ALL_ACTIONS', response.data.actions)
        })
    },

    allCollaborators ({commit}) {
        axios.get('api/collaborators')
        .then(response => {
            commit('ALL_COLLABORATORS', response.data.collaborators)
        })
    },

    allGrades ({commit}) {
        axios.get('api/collaborators/grades')
        .then(response => {
            commit('ALL_GRADES', response.data.grades)
        })
    },

    setInput ({commit}, selector) {
        commit('SET_INPUT', selector)
    },

    statusInit ({commit}) {
        commit('STATUS_INIT')
    },

    statusReady ({commit}) {
        commit('STATUS_READY')
    },

    statusRecording ({commit}) {
        commit('STATUS_RECORDING')
    },

    statusRecorded ({commit}) {
        commit('STATUS_RECORDED')
    },

    statusUploaded ({commit}) {
        commit('STATUS_UPLOADED')
    },

    initRecording ({commit}) {
        commit('INIT_RECORDING')
    },

    uploadVideo ({commit}, formData) {
        axios.post('api/video', formData)
        .then(response => {
            commit('STATUS_UPLOADED')
        })
    },
}

