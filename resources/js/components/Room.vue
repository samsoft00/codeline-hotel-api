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
                            <div class="badge badge-danger details_sub" style="font-size:inherit">${{ room.type.cost.price }}/Night</div>
                            <div class="details_list">
                                <ul>
                                    <li>Room Name: {{ room.name }}</li>
                                    <li>Room Capacity: {{ room.capacity.name+ ' Room' }}</li>
                                    <li>Room Type: {{ room.type.type }}</li>
                                </ul>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                <th>Start Date</th>
                                <td>{{ this.search.date_start }}</td>
                                </tr>
                                <tr>
                                <th>End Date</th>
                                <td>{{ this.search.date_end }}</td>
                                </tr>
                                <tr>
                                <th>Total Days</th>
                                <td>{{ this.search.search.days+" Days" }}</td>
                                </tr>
                                <tr>
                                <th>Total Cost</th>
                                <td>{{ this.search.search.total }}</td>
                                </tr>
                            </table>
                            <div class="book_now_button">
                                <a @click="bookRoomNow()" href="javacript:;" tag="a">Book Now</a>
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
                    type: {
                        type: '', 
                        id:'',
                        cost:{price: ''}},
                    hotel: {
                        name: ''
                    }
                },
                search:{}
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
                return `background-image:url(${'/images/hotel/'+this.room.hotel.image})`;
            },

            getRoomBackground(){
                return `background-image:url(${'/images/hotel/'+this.room.image})`;
            },
            fetchSearchInfo(){
                this.search = JSON.parse(window.localStorage.getItem('search'));
            },
            bookRoomNow(){
              const user = JSON.parse(window.localStorage.getItem('user'));
              const search = JSON.parse(window.localStorage.getItem('search'));
              
              console.log(search);
              if(user && user.access_token){
                let data = {
                    end_date:search.date_end,
                    start_date: search.date_start,
                    room_id: search.room_id,
                    total_price: parseFloat( search.search.total.slice(1) ),
                    total_night: parseInt( search.search.days )
                }
                axios.post('/api/book-room', data)
                     .then(response => {
                        this.$toastr.e("")
                       //clear storage
                        window.localStorage.removeItem('search');
                       this.$router.push({ name: 'booking', params: { bookId: response.data.id }});
                     })
                     .catch(error => this.$toastr.e(error.response.data.error_description));

              }else{
                this.$router.push({ name: 'auth', query: { roomId: roomId }});
              }                
            }
        },
        mounted(){
            this.fetchRoomById();
            // console.log(this.room);
        },
        created(){
            this.fetchSearchInfo();
        }
    }
</script>

<style lang="scss" scoped>
  table th, .table td {
      padding: 0.3rem;
  }
</style>