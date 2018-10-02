<template>
    <div>
        <app-nav></app-nav>
        <div class="container">
            <app-selector></app-selector>
            <app-record v-if="showRecord"></app-record>
            <app-confirmation v-if="showConfirmation"></app-confirmation>
            <app-thanks v-if="showThanks"></app-thanks>
            <!--<router-view></router-view>-->
        </div>
    </div>
</template>

<script>
    import Nav from './Nav';
    import Selector from './Selector'
    import Record from './Record'
    import Confirmation from './Confirmation'
    import Thanks from './Thanks'
    import { mapGetters } from 'vuex'

    export default {
        data () {
            return {}
        },
        components: {
            'app-nav': Nav,
            'app-selector': Selector,
            'app-record': Record,
            'app-confirmation': Confirmation,
            'app-thanks': Thanks,
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
            showRecord () {
                return this.status === 'ready' || this.status === 'started'
            },
            showConfirmation () {
                return this.status === 'stopped'
            },
            showThanks () {
                return this.status === 'done'
            },
        },
    }
</script>

<style scoped>

</style>
