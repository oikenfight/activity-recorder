export default {
    ALL_ACTIONS (state, actions) {
        state.actions = actions
    },

    SET_SELECTED_ACTION_ID (state, actionId) {
        state.selectedActionId = actionId
    },

    STATUS_READY (state) {
        state.status = 'ready'
    },

    STATUS_STARTED (state) {
        console.log('here is statusStarted in mutation')
        state.status = 'started'
    },

    STATUS_STOPPED (state) {
        state.status = 'stopped'
    },

    STATUS_DONE (state) {
        state.status = 'done'
    },
}
