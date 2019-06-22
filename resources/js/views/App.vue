<template>
    <v-app>
        <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-container>
            <b-navbar-brand href="#">Codeline Hotel</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>

            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
            
                <b-nav-item-dropdown right>
                    <!-- Using 'button-content' slot -->
                    <template slot="button-content"><em>User</em></template>
                    <b-dropdown-item tag="li" to="/">Home</b-dropdown-item>
                    <b-dropdown-item tag="li" to="/login">Sign Out</b-dropdown-item>
                </b-nav-item-dropdown>

            </b-navbar-nav>

            </b-collapse>
            </b-container>
        </b-navbar>
        
        <!-- The most important thing here -->
        <router-view></router-view>        
        
        </div>            

    </v-app>
</template>

<style scoped>
    .container {
        padding: 5px;
    }
</style>

<script>
    export default {}
</script>