<template>

    <div>

        <div class="home" style="height: 200px;">
            <div class="background_image" style="background-image:url(/images/hotel/613027204_750x422.png)"></div>
            <div class="home_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content text-center page-top-margin">
                                <!-- <div class="home_title">Login</div> -->
                                <div class="home_subtitle">Sign in to continue</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container" >

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form role="form" class="jumbotron" style="margin-top: 50px;" v-on:submit.prevent="handleLoginFormSubmit()">
                    <fieldset>
                        <h2>Please Sign In</h2>
                        <hr class="colorgraph">
                        <div class="form-group">
                            <input type="email" name="email" v-model="email" class="form-control input-lg" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" v-model="password" class="form-control input-lg" placeholder="Password" required>
                        </div>
                        <span class="button-checkbox">
                            <button type="button" class="btn" data-color="info">Remember Me</button>
                            <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                            <a href="" class="btn btn-link pull-right">Forgot Password?</a>
                        </span>
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <button type="submit" class="btn btn-lg btn-success btn-block">Sign In</button>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <router-link tag="a" :to="{ name: 'register', query: { roomId: this.$route.query.roomId }}" class="btn btn-lg btn-primary btn-block">Register</router-link>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>


    </div>

</template>

<script>
    export default {
        data(){
            return {
                email: '',
                password: '',
                routeQueryId:"",
                errors: []
            }
        },
        methods: {
            handleLoginFormSubmit(){
                const data = {
                    grant_type: 'password',
                    client_id: parseInt(process.env.MIX_CLIENT_ID),
                    client_secret: process.env.MIX_CLIENT_SECRET,
                    username: this.email,
                    password: this.password,
                    scope: ''
                }
                console.table(data);
                
                const user = {}
                axios.post('/oauth/token', data)
                     .then(payload => {
                         if(payload.status === 200){
                             console.log(payload);
                             user.access_token = payload.data.access_token;
                             user.refresh_token = payload.data.refresh_token;
                             user.email = payload.data.username;
                             window.localStorage.setItem('user', JSON.stringify(user));
                            //  this.$router.push({name: 'home'});//temporary
                             if(this.routeQueryId !== ""){
                                 this.$router.push({name: 'room', params: { roomId: this.routeQueryId } });
                             }else{
                                this.$router.push({name: 'home'});//temporary
                             }                             
                         }
                     })
                     .catch(error => this.$toastr.e(error.response.data.error_description));
            }
        },
        mounted(){
            this.routeQueryId = this.$route.query.roomId;
        }        
    }
</script>

<style lang="scss" scoped>
    .colorgraph {
    height: 5px;
    border-top: 0;
    background: #c4e17f;
    border-radius: 5px;
    background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }
</style>