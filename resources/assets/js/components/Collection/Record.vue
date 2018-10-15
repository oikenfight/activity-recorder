<template>
    <div>
        <!-- Selector component -->
        <router-view></router-view>

        <!-- Main component -->
        <div class="row" style="padding-top: 20px;">
            <div class="col-12 card text-center">
                <div class="card-body">
                    <div v-if="showStop" class="float-right mr-3">
                        <h3 class="text-danger">Timer: {{ recordingTime }}</h3>
                    </div>
                    <!-- アスペクト比は stair actions に合わせてある -->
                    <video id="local_video" class="embed-responsive embed-responsive-4by3" autoplay="1" style="border: 1px solid;"></video>
                </div>
            </div>

            <div class="col-12 text-center">
                <button v-if="showStart" type="button" class="btn btn-light btn-lg" @click="startRecord"><i class="fa fa-play-circle fa-5x" style="color:#AAAAAA;"></i></button>
                <button v-if="showStop" type="button" class="btn btn-light btn-lg" @click="stopRecord"><i class="fa fa-pause-circle fa-5x" style="color:#AAAAAA;"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {
                recording: false,
                recordingTime: 0,
                timer: null,
            }
        },
        mounted () {
            this.recorder.init()
        },
        computed: {
            // store の getter をローカルにマッピングさせることで算出可能にしている。
            ...mapGetters({
                status: 'status',
                recorder: 'recorder',
            }),
            showStart () {
                return this.status.ready && !this.status.recording
            },
            showStop () {
                return this.status.recording
            },
        },
        methods: {
            startRecord () {
                console.log('here is startRecord method')
                this.$store.dispatch('statusRecording')
                this.recorder.start()
                this.timer = this.startTimer()
            },
            stopRecord () {
                console.log('here is stopRecord method')
                this.$store.dispatch('statusRecorded')
                this.recorder.stop()
                this.$router.push({ path: 'confirmation' });
            },
            startTimer () {
                setInterval(() => {
                    this.recordingTime += 1
                }, 1000)
            },
            stopTimer () {
                if (this.timer) {
                    clearInterval(this.timer);
                }
            },
        }

    }
</script>

<style scoped>

</style>
