<template>
    <div>
        <app-nav></app-nav>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Nav from './Nav';

    export default {
        name: 'Root',
        components: {
            'app-nav': Nav,
        },
    }
</script>

<style scoped>

</style>
