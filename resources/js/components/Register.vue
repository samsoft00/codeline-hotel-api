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
                                <div class="home_subtitle">Register</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container" >

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form role="form" class="jumbotron" style="margin-top: 50px;" v-on:submit.prevent="handleRegisterFormSubmit()">
                    <fieldset>
                        <h2>Register</h2>
                        <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
                        <hr class="colorgraph">
                        <div class="form-group">
                            <input type="email" name="email" v-model="email" class="form-control input-lg" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" v-model="password" class="form-control input-lg" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm-password" v-model="confirmpassword" class="form-control input-lg" placeholder="Confirm Password" required>
                        </div>                        
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <router-link tag="a" :to="{ name: 'auth', query: { roomId: this.$route.query.roomId }}" class="btn btn-lg btn-primary btn-block">Sign In</router-link>
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
                confirmpassword: '',
                validationErrors: null,
                routeQueryId:""
            }
        },
        methods: {
            handleRegisterFormSubmit(){
                // console.log(this.routeQueryId);
                // if(this.routeQueryId !== ""){
                //     this.$router.push({name: 'booking', params: { roomId: this.routeQueryId } });
                // }else{
                //     return;
                // }

                let data = {
                    email : this.email,
                    password: this.password,
                    'password_confirmation': this.confirmpassword
                }

                console.log(data);
                let user = {};
                axios.post('/api/auth/register', data)
                     .then(payload => {
                         console.log(payload);
                         if(payload.status === 200){
                             user.access_token = payload.data.access_token;
                             window.localStorage.setItem('user', JSON.stringify(user));
                             if(this.routeQueryId !== ""){
                                 this.$router.push({name: 'booking', params: { roomId: this.routeQueryId } });
                             }else{
                                this.$router.push({name: 'home'});//temporary
                             }
                         }
                     })
                     .catch(error => {
                         if(error.response.status === 422){
                             this.validationErrors = error.response.data.errors;
                         }else{
                             this.$toastr.e(error.response.data.message)
                         }
                     });//
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