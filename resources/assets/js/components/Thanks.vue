<template>
    <div class="row justify-content-center">
        <div class="col-10 card text-center">
            <div class="card-body">
                <h1 class="card-title">Thank you so much !!</h1>
                <div class="col-12 text-center" style="padding-top: 50px">
                    <button type="button" class="btn btn-light btn-lg" @click="checkMessage"><i class="fa fa-check-circle fa-3x" style="color:#38c172;"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {}
        },
        methods: {
            checkMessage () {
                this.$store.dispatch('statusInit')
            },
        }
    }
</script>

<style scoped>

</style>
