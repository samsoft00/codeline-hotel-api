<template>
    <div class="container">

    <div class="row" style="margin-top:20px">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" v-on:submit.prevent="handleLoginFormSubmit()">
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
                            <router-link tag="a" to="/register" class="btn btn-lg btn-primary btn-block">Register</router-link>
                        </div>
                    </div>
                </fieldset>
            </form>
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
                this.axios.post('/oauth/token', data)
                     .then(payload => {
                         if(payload.status === 200){
                             user.access_token = payload.data.access_token;
                             user.refresh_token = response.data.refresh_token;
                             window.localStorage.setItem('user', JSON.stringify(user));
                             this.$router.push({name: 'home'});//temporary
                         }
                     })
                     .catch(error => console.log(error.response.data.error_description));
            }
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