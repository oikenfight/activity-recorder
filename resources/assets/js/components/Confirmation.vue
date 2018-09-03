<template>
    <div class="row">
        <div class="col-12 card text-center">
            <div class="card-body">
                <h5 class="card-title">Here is a took Video.</h5>
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
            }),
        },
        methods: {
            upload () {
                this.$store.dispatch('statusDone')
                // TODO: add action to upload video.
            },
        }
    }
</script>

<style scoped>

</style>
