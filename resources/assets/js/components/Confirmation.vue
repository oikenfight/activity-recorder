<template>
    <div class="row">
        <div class="col-12 card text-center">
            <div class="card-body">
                <!-- アスペクト比は stair actions に合わせてある -->
                <video id="playback_video" class="embed-responsive embed-responsive-4by3" autoplay="1" style="border: 1px solid;"></video>
            </div>
        </div>

        <div class="col-12 text-center">
            <button type="button" class="btn btn-light btn-lg" @click="upload"><i class="fa fa-arrow-circle-o-up fa-3x" style="color:#38c172;"></i></button>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {}
        },
        computed: {
            // store の getter をローカルにマッピングさせることで算出可能にしている。
            ...mapGetters({
                selectedActionId: 'selectedActionId',
                status: 'status',
                recorder: 'recorder',
            }),
        },
        methods: {
            upload () {
                this.$store.dispatch('statusDone')
                // TODO: add action to upload video.
            },
        },
    }
</script>

<style scoped>

</style>
