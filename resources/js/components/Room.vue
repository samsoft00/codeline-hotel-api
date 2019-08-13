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
                            <Rave
                                :is-production="false"
                                :email="user.email || 'oyewoleabayomi@gmail.com'"
                                :amount="paymentData.total_price"
                                :reference="reference"
                                :rave-key="raveKey"
                                :callback="paymentCallback"
                                :close="close"
                                currency="NGN"
                                ><i>Book Now</i>
                            </Rave>                             
                            <!-- <div class="book_now_button">                          -->
                                <!-- <a @click="bookRoomNow()" href="javacript:;" tag="a">Book Now</a> -->
                            <!-- </div> -->
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
                        name: '',
                        image: ''
                    }
                },
                search:{},
                user:{},
                paymentData:{},
                raveKey: process.env.MIX_FLW_TEST_KEY
            }
        },
        computed:{
            reference(){
                let text = "";
                let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        
                for( let i=0; i < 10; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));
        
                return text;
            }            
        },
        methods: {
            fetchRoomById(){
                let id = this.$route.params.roomId;
                
                axios.get(`/api/rooms/${id}`)
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
            close(){
                console.log('Close App');
            },
            paymentCallback(response){
              const search = JSON.parse(window.localStorage.getItem('search'));             
            //   console.log(response, this.user, search);
              if(this.user && this.user.access_token){
                  
                  if(response.success !== true){
                      this.$toastr.e("Unable to process payment, check and try again!");
                      return;
                  }

                let { tx } = response;
                let data = {
                    end_date:search.date_end,
                    start_date: search.date_start,
                    room_id: search.room_id,
                    total_price: parseFloat( search.search.total.slice(1) ),
                    total_night: parseInt( search.search.days ),
                    
                    tx_id: tx.id,
                    amount: tx.amount,
                    order_ref: tx.orderRef,
                    payment_id: tx.paymentId,
                    charged_amount: tx.charged_amount,
                    tx_ref: tx.txRef,
                    status: tx.status === 'successful' ? true : false,
                    payment_type : tx.paymentType                   
                }
                axios.post('/api/book-room', data)
                     .then(response => {
                        this.$toastr.e("")
                        console.log(`booking ${response}`);
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
            this.user = JSON.parse(window.localStorage.getItem('user'));
            this.paymentData = {
                end_date: this.search.date_end,
                start_date: this.search.date_start,
                room_id: this.search.room_id,
                total_price: parseFloat( this.search.search.total.slice(1) ),
                total_night: parseInt( this.search.search.days )
            }            
        }
    }
</script>

<style lang="scss" scoped>
    table th, .table td {
        padding: 0.3rem;
    }
    button{
        width: 152px;
        height: 54px;
        background: #ffa37b;
        text-align: center;
        margin-top: 26px;
        -webkit-transition: all 200ms ease;
        transition: all 200ms ease;
    }  
</style>