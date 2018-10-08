<template>
    <div class="row justify-content-center" style="padding-top: 30px">
        <div class="col-10 justify-content-center">

            <div class="form-group">
                <label for="action-form">Action</label>
                <select v-model="selector.action" class="form-control form-control-lg" :class="{'is-invalid': !selector.action}" id="action-form">
                    <option v-if="!selector.action" value="null">Select Me</option>
                    <option v-for="action in actions" :value="action">{{ action.name }}</option>
                </select>
                <div v-if="!selector.action" class="invalid-feedback">
                    <p class="help-block">{{ messages.action }}</p>
                </div>
            </div>

            <!-- Photographer -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <!-- grade -->
                    <label for="post-collaborator-grade-form">grade</label>
                    <select v-model="selector.postCollaboratorGrade" @change="selectPostCollaboratorGrade" class="form-control form-control-lg" :class="{'is-invalid': !selector.postCollaboratorGrade}" id="post-collaborator-grade-form">
                        <option v-if="!selector.postCollaboratorGrade" value="null">Select Me</option>
                        <option v-for="grade in grades" :value="grade.grade">{{ grade.name }}</option>
                    </select>
                    <div v-if="!selector.postCollaboratorGrade" class="invalid-feedback">
                        <p class="help-block">{{ messages.postCollaboratorGrade }}</p>
                    </div>

                    <!-- collaborator -->
                    <label for="post-collaborator-form">Photographer</label>
                    <select v-model="selector.postCollaborator" @change="selectPostCollaborator" class="form-control form-control-lg" :class="{'is-invalid': !selector.postCollaborator}" id="post-collaborator-form">
                        <option v-if="!selector.postCollaborator" value="null">Select Me</option>
                        <option v-for="collaborator in postCollaborators" :value="collaborator">{{ collaborator.name }}</option>
                    </select>
                    <div v-if="!selector.postCollaborator" class="invalid-feedback">
                        <p class="help-block">{{ messages.postCollaborator }}</p>
                    </div>
                </div>

                <!-- Actor -->
                <div class="form-group col-md-6">
                    <!-- grade -->
                    <label for="act-collaborator-grade-form">grade</label>
                    <select v-model="selector.actCollaboratorGrade" @change="selectActCollaboratorGrade" class="form-control form-control-lg" :class="{'is-invalid': !selector.actCollaboratorGrade}" id="act-collaborator-grade-form">
                        <option v-if="!selector.actCollaboratorGrade" value="null">Select Me</option>
                        <option v-for="grade in grades" :value="grade.grade">{{ grade.name }}</option>
                    </select>
                    <div v-if="!selector.actCollaboratorGrade" class="invalid-feedback">
                        <p class="help-block">{{ messages.actCollaboratorGrade }}</p>
                    </div>

                    <!-- collaborator -->
                    <label for="act-collaborator-form">Actor</label>
                    <select v-model="selector.actCollaborator" @change="selectActCollaborator" class="form-control form-control-lg" :class="{'is-invalid': !selector.actCollaborator}" id="act-collaborator-form">
                        <option v-if="!selector.actCollaborator" value="null">Select Me</option>
                        <option v-for="collaborator in actCollaborators" :value="collaborator">{{ collaborator.name }}</option>
                    </select>
                    <div v-if="!selector.actCollaborator" class="invalid-feedback">
                        <p class="help-block">{{ messages.actCollaborator }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {
                selector: {
                    action: null,
                    postCollaboratorGrade: null,
                    postCollaborator: null,
                    actCollaboratorGrade: null,
                    actCollaborator: null,
                },
                messages: {
                    action: 'Please select an action.',
                    postCollaboratorGrade: 'Please select a Photographer Grade.',
                    postCollaborator: 'Please select a Photographer.',
                    actCollaboratorGrade: 'Please select an Actor Grade.',
                    actCollaborator: 'Please select an Actor.',
                },
            }
        },
        mounted () {
            if (this.action) {
                this.selector.action = this.action
            }
            if (this.postCollaborator) {
                this.selector.postCollaboratorGrade = this.postCollaborator.grade
                this.selector.postCollaborator = this.postCollaborator
            }
            if (this.actCollaborator) {
                this.selector.actCollaboratorGrade = this.actCollaborator.grade
                this.selector.actCollaborator = this.actCollaborator
            }
            if (this.action && this.postCollaborator && this.actCollaborator) {
                this.$store.dispatch('statusReady')
            } else {
                this.$store.dispatch('statusInit')
            }
        },
        computed: {
            // store の getter をローカルにマッピングさせることで算出可能にしている。
            ...mapGetters({
                actions: 'actions',
                collaborators: 'collaborators',
                grades: 'grades',
                action: 'action',
                postCollaborator: 'postCollaborator',
                actCollaborator: 'actCollaborator',
            }),
            postCollaborators () {
                if (this.selector.postCollaboratorGrade !== null) {
                    return this.collaborators.filter((collaborator) => {
                        return collaborator.grade === this.selector.postCollaboratorGrade
                    })
                } else {
                    return false
                }
            },
            actCollaborators () {
                if (this.selector.actCollaboratorGrade !== null) {
                    return this.collaborators.filter((collaborator) => {
                        return collaborator.grade === this.selector.actCollaboratorGrade
                    })
                } else {
                    return false
                }
            },
        },
        methods: {
            selectPostCollaboratorGrade () {
                let collaborator = this.selector.postCollaborator
                if (collaborator && this.selector.postCollaboratorGrade !== collaborator.grade) {
                    this.selector.postCollaborator = null
                }
                this.setInput()
            },
            selectPostCollaborator () {
                if (this.selector.postCollaborator.grade !== this.selector.postCollaboratorGrade) {
                    this.selector.postCollaboratorGrade = this.selector.postCollaborator.grade
                }
                this.setInput()
            },
            selectActCollaboratorGrade () {
                let collaborator = this.selector.actCollaborator
                if (collaborator && this.selector.actCollaboratorGrade !== collaborator.grade) {
                    this.selector.actCollaborator = null
                }
                this.setInput()
            },
            selectActCollaborator () {
                if (this.selector.actCollaborator.grade !== this.selector.actCollaboratorGrade) {
                    this.selector.actCollaboratorGrade = this.selector.actCollaborator.grade
                }
                this.setInput()
            },
            setInput () {
                if (this.selector.action
                    && this.selector.postCollaboratorGrade && this.selector.postCollaborator
                    && this.selector.actCollaboratorGrade && this.selector.actCollaborator
                ) {
                    console.log('set input')
                    console.log(this.selector)
                    this.$store.dispatch('setInput', this.selector)
                    this.$store.dispatch('statusReady')
                }
            },
        }
    }
</script>

<style scoped>

</style>
