<template>
    <div>
        <!-- Selector -->
        <div class="row justify-content-center" style="padding-top: 30px">
            <div class="col-10 justify-content-center">
                <!-- Action -->
                <div class="form-group">
                    <label for="action-form">Action</label>
                    <select v-model="selector.action" @change="selectAction" class="form-control form-control-lg" id="action-form">
                        <option v-if="!selector.action" value="null">Select Me</option>
                        <option v-for="action in actions" :value="action">{{ action.name }}</option>
                    </select>
                </div>

                <div class="form-row">
                    <!-- PostCollaborator -->
                    <div class="form-group col-md-6">
                        <label for="post-collaborator-form">撮影者</label>
                        <input readonly class="form-control form-control-lg" :value="postCollaborator.name" id="post-collaborator-form">
                    </div>

                    <!-- ActCollaborator -->
                    <div class="form-group col-md-6">
                        <label for="act-collaborator-form">行動者</label>
                        <input readonly class="form-control form-control-lg" :value="actCollaborator.name" id="act-collaborator-form">
                    </div>
                </div>

            </div>
        </div>

        <!-- Main component -->
        <div class="row">
            <div class="col-12 card text-center">
                <div class="card-body">
                    <!-- アスペクト比は stair actions に合わせてある -->
                    <video id="playback_video" class="embed-responsive embed-responsive-4by3" style="border: 1px solid;"></video>
                </div>
            </div>

            <div class="col-12 text-center">
                <button type="button" class="btn btn-light btn-lg" @click="undo"><i class="fa fa-undo fa-3x" style="color:#AAAAAA;"></i></button>
                <button v-if="!playing" type="button" class="btn btn-light btn-lg" @click="startPlay"><i class="fa fa-play-circle fa-3x" style="color:#38c172;"></i></button>
                <button v-if="playing" type="button" class="btn btn-light btn-lg" @click="stopPlay"><i class="fa fa-pause-circle fa-3x" style="color:#38c172;"></i></button>
                <button type="button" class="btn btn-light btn-lg" @click="upload"><i class="fa fa-arrow-circle-o-up fa-3x" style="color:#38c172;"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {
                video: null,
                playing: false,
                selector: {
                    action: null,
                },
            }
        },
        mounted () {
            if (!this.status.ready && !this.status.recorded) {
                this.$router.push({ path: '/'});
            }
            this.selector.action = this.action
            this.video = document.getElementById('playback_video')
            this.playInit()
        },
        computed: {
            // store の getter をローカルにマッピングさせることで算出可能にしている。
            ...mapGetters({
                actions: 'actions',
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
            undo () {
                this.$store.dispatch('statusReady')
                this.recorder.clear()
                this.$router.push({ path: '/' });
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
                this.$router.push({ path: 'thanks' });
            },
            selectAction () {
                // Action のみ変更可能
                this.$store.dispatch('setInput', this.selector)
            },
        },
    }
</script>

<style scoped>

</style>
