<template>
    <div>
        <app-nav></app-nav>
        <h2>This is Index component</h2>
    </div>
</template>

<script>
    import Nav from './Nav';

    export default {
        data () {
            return {}
        },
        components: {
            'app-nav': Nav,
        }
    }
</script>

<style scoped>

</style>
