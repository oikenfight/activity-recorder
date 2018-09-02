export default {
    ALL_ACTIONS (state, actions) {
        state.actions = actions
    },

    SET_SELECTED_ACTION_ID (state, actionId) {
        state.selectedActionId = actionId
    },
}
