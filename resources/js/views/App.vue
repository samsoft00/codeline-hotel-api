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
        
        <router-view class="bg-light" style="padding:15px"></router-view>

        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                <a href="#">Back to top</a>
                </p>
                <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
                <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.3/getting-started/introduction/">getting started guide</a>.</p>
            </div>
        </footer>        
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