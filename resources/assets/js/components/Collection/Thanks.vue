<template>
    <div class="row justify-content-center">
        <div class="col-10 card text-center">
            <div class="card-body">
                <h1 class="card-title">Thank you so much !!</h1>
                <div class="col-12 text-center" style="padding-top: 50px">
                    <button type="button" class="btn btn-light btn-lg" @click="checkMessage"><i class="fa fa-check-circle fa-5x" style="color:#38c172;"></i></button>
                </div>
            </div>
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
                status: 'status',
                recorder: 'recorder',
            }),
        },
        methods: {
            checkMessage () {
                this.$store.dispatch('statusInit')
                this.recorder.clear()
                this.$router.push({ path: '/' });
            },
        }
    }
</script>

<style scoped>

</style>
