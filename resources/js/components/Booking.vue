<template>
    <div>

        <div class="home">
            <div class="background_image" :style=getHomeBackground()></div>
            <div class="home_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content text-center page-top-margin">
                                <div class="home_title">Room {{ booking.room.name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container" >

        <div class="row">
            <div class="jumbtron col-md-8 offset-md-2">
            <br><br> <h2 style="color:#0fad00">Success</h2>
                    <img src="http://www.iconeasy.com/icon/png/Business/Pretty%20Office/Success.png">
                    <h3>Dear, Faisal khan</h3>
                    <p style="font-size:20px;color:#5C5C5C;">
                        Booking Successful,<br/> Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque voluptatem deserunt quidem animi excepturi illum, incidunt praesentium labore nobis error, blanditiis suscipit veritatis? Deserunt incidunt quis, magni minima ipsa veniam..</p>
                    <router-link to="home" tag="a" class="btn btn-success">     Log in      </router-link>
                <br><br>
            </div>
        </div>

    </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                booking: {
                    room:{
                        image:'',
                        name:'',
                        type:{cost:{}},
                        capacity:{name:''}
                    }
                }
            }
        },
        methods:{
            fetchBookingById(){
                let id = this.$route.params.bookId;
                console.log(id);
                
                axios.get(`/api/book-room/${id}`)
                    .then(response => this.booking = response.data)
                    .catch(error => console.log(error));
            },            
            getHomeBackground(){
                return `background-image:url(${'/images/hotel/'+this.booking.room.image})`;
            }         
        },
        mounted(){
            this.fetchBookingById();
        },        
    }
</script>

<style lang="scss" scoped>

</style>