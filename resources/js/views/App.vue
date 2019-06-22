<template>

    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <router-link to="/" tag="a" class="navbar-brand">Codeline Hotel</router-link>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <router-link class="btn btn-outline-danger my-2 my-sm-0" to="/auth" tag="button">Login/Register</router-link>
            </div>       
        </div>
        </nav>
        
        <router-view></router-view>
    </div>

</template>

<style scoped>
    .container {
        padding: 5px;
    }
</style>

<script>
    export default {}
</script>