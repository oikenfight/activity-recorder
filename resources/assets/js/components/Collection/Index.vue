<template>
    <div>
        <!--<app-selector></app-selector>-->
        <!--<app-record v-if="showRecord"></app-record>-->
        <!--<app-confirmation v-if="showConfirmation"></app-confirmation>-->
        <!--<app-thanks v-if="showThanks"></app-thanks>-->
        <router-view></router-view>
    </div>
</template>

<script>
    // import Selector from './Selector'
    // import Record from './Record'
    // import Confirmation from './Confirmation'
    // import Thanks from './Thanks'
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {}
        },
        components: {
            // 'app-nav': Nav,
            // 'app-selector': Selector,
            // 'app-record': Record,
            // 'app-confirmation': Confirmation,
            // 'app-thanks': Thanks,
        },
        beforeCreate () {
            this.$store.dispatch('allActions')
            this.$store.dispatch('allCollaborators')
            this.$store.dispatch('allGrades')
        },
        computed: {
            // store の getter をローカルにマッピングさせることで算出可能にしている。
            ...mapGetters({
                status: 'status',
            }),
            // showRecord () {
            //     return (this.status.ready && !this.status.recorded && !this.status.uploaded)
            //         || (this.status.recording && !this.status.recorded && !this.status.uploaded)
            // },
            // showConfirmation () {
            //     return this.status.recorded && !this.status.uploaded
            // },
            // showThanks () {
            //     return this.status.uploaded
            // },
        },
    }
</script>

<style scoped>

</style>
