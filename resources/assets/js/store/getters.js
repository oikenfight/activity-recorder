export default {
    actions: state => state.actions,
    collaborators: state => state.collaborators,
    grades: state => state.grades,
    action: state => state.action,
    postCollaborator: state => state.postCollaborator,
    actCollaborator: state => state.actCollaborator,
    // action: state => actionId => state.actions.filter((action) => {
    //     return action.id === actionId
    // }),
    // postCollaborator: state => postCollaboratorId => state.collabolators.filter((collaborator) => {
    //     return collaborator.id === postCollaboratorId
    // }),
    // actCollaborator: state => actCollaboratorId => state.collaborators.filter((collaborator) => {
    //     return collaborator.id === actCollaboratorId
    // }),
    status: state => state.status,
    recorder: state => state.recorder,
    blobUrl: state => state.blobUrl,
}
