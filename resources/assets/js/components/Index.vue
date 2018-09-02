<template>
    <div>
        <app-nav></app-nav>
        <div class="container">
            <app-selector></app-selector>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Nav from './Nav';
    import Selector from './Selector'

    export default {
        data () {
            return {}
        },
        components: {
            'app-nav': Nav,
            'app-selector': Selector,
        },
        beforeCreate () {
            this.$store.dispatch('allActions')
        },
    }
</script>

<style scoped>

</style>
