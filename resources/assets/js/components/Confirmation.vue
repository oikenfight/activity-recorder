<template>
    <div class="row">
        <div class="col-12 card text-center">
            <div class="card-body">
                <!-- アスペクト比は stair actions に合わせてある -->
                <video id="playback_video" class="embed-responsive embed-responsive-4by3" style="border: 1px solid;"></video>
            </div>
        </div>

        <div class="col-12 text-center">
            <button v-if="!playing" type="button" class="btn btn-light btn-lg" @click="startPlay"><i class="fa fa-play-circle fa-3x" style="color:#38c172;"></i></button>
            <button v-if="playing" type="button" class="btn btn-light btn-lg" @click="stopPlay"><i class="fa fa-pause-circle fa-3x" style="color:#38c172;"></i></button>
            <button type="button" class="btn btn-light btn-lg" @click="upload"><i class="fa fa-arrow-circle-o-up fa-3x" style="color:#38c172;"></i></button>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {
                video: null,
                playing: false
            }
        },
        mounted () {
            this.video = document.getElementById('playback_video')
            this.playInit()
        },
        computed: {
            // store の getter をローカルにマッピングさせることで算出可能にしている。
            ...mapGetters({
                action: 'action',
                postCollaborator: 'postCollaborator',
                actCollaborator: 'actCollaborator',
                status: 'status',
                recorder: 'recorder',
            }),
        },
        methods: {
            playInit () {
                this.video.pause()
                this.video.currentTime = 0
            },
            startPlay () {
                this.playing = true
                this.video.play()
            },
            stopPlay () {
                this.playing = false
                this.playInit()
            },
            upload () {
                let formData = new FormData()
                formData.append('blob', this.recorder.getVideoBlob(), 'blob.webm')
                formData.append('action_id', this.action.id)
                formData.append('post_collaborator_id', this.postCollaborator.id)
                formData.append('act_collaborator_id', this.actCollaborator.id)
                this.$store.dispatch('uploadVideo', formData)
            },
        },
    }
</script>

<style scoped>

</style>
