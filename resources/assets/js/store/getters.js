export default {
    actions: state => state.actions,
    collaborators: state => state.collaborators,
    grades: state => state.grades,
    status: state => state.status,
    recorder: state => state.recorder,
    action: state => state.input.action,
    postCollaborator: state => state.input.postCollaborator,
    actCollaborator: state => state.input.actCollaborator,
}
