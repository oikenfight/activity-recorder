export default {
    ALL_ACTIONS (state, actions) {
        state.actions = actions
    },

    ALL_COLLABORATORS (state, collaborators) {
        state.collaborators = collaborators
    },

    ALL_GRADES (state, grades) {
        state.grades = grades
    },

    SET_INPUT (state, selector) {
        state.input.action = selector.action
        state.input.postCollaborator = selector.postCollaborator
        state.input.actCollaborator = selector.actCollaborator
    },

    STATUS_INIT (state) {
        state.status = {
            ready: false,
            recording: false,
            recorded: false,
            uploaded: false,
        }
    },

    STATUS_READY (state) {
        state.status = {
            ready: true,
            recording: false,
            recorded: false,
            uploaded: false,
        }
    },

    STATUS_RECORDING (state) {
        state.status = {
            ready: true,
            recording: true,
            recorded: false,
            uploaded: false,
        }
    },

    STATUS_RECORDED (state) {
        state.status = {
            ready: true,
            recording: true,
            recorded: true,
            uploaded: false,
        }
    },

    STATUS_UPLOADED (state) {
        state.status = {
            ready: true,
            record: true,
            recorded: true,
            uploaded: true,
        }
    },

    INIT_RECORDING (state) {
        state.recorder.init()
    },

    SAVE_VIDEO (state, blobUrl) {
        state.blobUrl = blobUrl
    },
}
