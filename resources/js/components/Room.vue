<template>

    <div>

        <div class="home">
            <div class="background_image" :style=getHomeBackground()></div>
            <div class="home_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content text-center page-top-margin">
                                <div class="home_title">{{ room.hotel.name }}</div>
                                <div class="home_subtitle">{{ room.hotel.address }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="details">
            <div class="container">
                <div class="row">
                    
                    <!-- Details Image -->
                    <div class="col-xl-7 col-lg-6">
                        <div class="details_image">
                            <div class="background_image" :style=getRoomBackground()></div>
                        </div>
                    </div>

                    <!-- Details Content -->
                    <div class="col-xl-5 col-lg-6">
                        <div class="details_content">
                            <div class="details_title">{{ room.capacity.name }} Room ({{ room.name }})</div>
                            <div class="details_list">
                                <ul>
                                    <li>Room Name: {{ room.name }}</li>
                                    <li>Room Capacity: {{ room.capacity.name+ ' Room' }}</li>
                                    <li>Room Type: {{ room.type.type }}</li>
                                </ul>
                            </div>
                            <div class="book_now_button">
                                <router-link to="" tag="a">Book Now</router-link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> 

    </div>

</template>

<script>
    export default {
        data(){
            return {
                room: {
                    name:'',
                    capacity:{name:'', id: ''},
                    type: {type: '', id:''},
                    hotel: {
                        name: ''
                    }
                }
            }
        },
        methods: {
            fetchRoomById(){
                let id = this.$route.params.roomId;
                
                axios.get(`/api/room/${id}`)
                    .then(response => this.room = response.data)
                    .catch(error => console.log(error));
            },

            getHomeBackground(){
                return `background-image:url(${this.room.hotel.image})`;
            },

            getRoomBackground(){
                return `background-image:url(${this.room.image})`;
            }
        },
        mounted(){
            this.fetchRoomById();
            console.log(this.room);
        },
        created(){}
    }
</script>

<style lang="scss" scoped>

</style>