<template>
    <div>
        <!-- 切替ボタン -->
        <nav class="navbar navbar-light navbar-laravel">
            <button type="button" class="navbar-toggler navbar-nav ml-auto" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="折り畳みナビゲーション">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="collapse navbar navbar-light navbar-laravel" id="navbarToggleExternalContent">
            <ul class="list-group col-12">
                <li class="list-group-item text-center">
                    <a class="text-secondary" href="/admin">管理画面へ</a>
                </li>
                <li class="list-group-item text-center">
                    <a class="text-secondary" href="/admin">管理画面へ</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                authUser: 'auth user',
            }
        }
    }
</script>

<style scoped>

</style>
