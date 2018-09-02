export default {
    allActions ({commit}) {
        axios.get('api/actions')
            .then(response => {
                  commit('ALL_ACTIONS', response.data.actions)
        })
        // TODO: axios で actions を取得
    },

    setSelectedActionId ({commit}, actionId) {
        commit('SET_SELECTED_ACTION_ID', actionId)
    },
}
