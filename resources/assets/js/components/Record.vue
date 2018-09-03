<template>
    <div class="row">
        <div class="col-12 card text-center">
            <div class="card-header">
                Camera
            </div>
            <div class="card-body">
                <h5 class="card-title">Here is a video</h5>
            </div>
        </div>

        <div class="col-12 text-center">
            <button v-if="showStart" type="button" class="btn btn-light btn-lg" @click="startRecord"><i class="fa fa-play-circle fa-3x" style="color:#AAAAAA;"></i></button>
            <button v-if="showStop" type="button" class="btn btn-light btn-lg" @click="stopRecord"><i class="fa fa-pause-circle fa-3x" style="color:#AAAAAA;"></i></button>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {
                recording: false,
            }
        },
        computed: {
            // store の getter をローカルにマッピングさせることで算出可能にしている。
            ...mapGetters({
                selectedActionId: 'selectedActionId',
                status: 'status',
            }),
            showStart () {
                let selected = (this.selectedActionId !== null && typeof(this.selectedActionId) !== 'undefined')
                return selected && this.status === 'ready'
            },
            showStop () {
                let selected = (this.selectedActionId !== null && typeof(this.selectedActionId) !== 'undefined')
                return selected && this.status === 'started'
            },
        },
        methods: {
            startRecord () {
                console.log('here is startRecord method')
                this.$store.dispatch('statusStarted')
            },
            stopRecord () {
                console.log('here is stopRecord method')
                this.$store.dispatch('statusStopped')
            },
        }

    }
</script>

<style scoped>

</style>
