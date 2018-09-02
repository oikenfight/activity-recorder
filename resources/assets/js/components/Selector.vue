<template>
    <div class="row justify-content-center" style="padding-top: 30px">
        <div class="col-10 justify-content-center">

            <div class="form-group">
                <label for="action-form">Action</label>
                <select class="form-control form-control-lg" :class="{'is-invalid': !selected}" id="action-form" v-model="selectedActionId" >
                    <option v-if="!selected" value="">Select Me</option>
                    <option v-for="action in actions" :value="action.id">{{ action.name }}</option>
                </select>
                <div v-if="!selected" class="invalid-feedback">
                    <p class="help-block">{{ message }}</p>
                </div>
            </div>

            <div v-if="selected">

            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {
                message: 'Please select an action.'
            }
        },
        computed: {
            // store の getter をローカルにマッピングさせることで算出可能にしている。
            ...mapGetters({
                actions: 'actions',
            }),
            selectedActionId: {
                get () {
                    return this.$store.getters.selectedActionId
                },
                set (value) {
                    this.$store.dispatch('setSelectedActionId', value)
                },
            },
            selected () {
                return this.selectedActionId !== null && typeof(this.selectedActionId) !== 'undefined'
            },
        }
    }
</script>

<style scoped>

</style>
