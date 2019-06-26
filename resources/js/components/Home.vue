<template>
    <div>


      <div class="home">
        <div class="background_image" style="background-image:url(/images/hotel/613027204_750x422.png)"></div>
        <div class="home_container">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="home_content text-center" style="margin-top:100px">
                  <div class="home_title">Find Hotel Near You</div>
                  <div class="booking_form_container">
                    <form role="form" v-on:submit.prevent="handleSearchSubmit()">
                      <div class="d-flex flex-xl-row flex-column align-items-start justify-content-start">
                        <div class="booking_input_container d-flex flex-row align-items-start justify-content-start flex-wrap">
                          <!-- <div><input type="text" v-model="search.start_date" class="datepicker booking_input booking_input_a booking_in" placeholder="Start Date" required="required"></div> -->
                          <div>
                            <datepicker :inputClass=options.style format="dd-MM-yyyy" placeholder="Start Date" v-model="search.start_date"></datepicker>
                          </div>
                          <div>
                            <datepicker :inputClass=options.style format="dd-MM-yyyy" placeholder="End Date" v-model="search.end_date"></datepicker>
                            <!-- <input type="text" v-model="search.end_date" class="enddate booking_input booking_input_a booking_out" placeholder="End Date" required="required"> -->
                          </div>
                          <div>
                            <select v-model="search.type" class="booking_input" id="type">
                              <option :value="null" disabled>Room Type</option>
                              <option style="color:#777777" v-for="(room, index) in roomType" :key="index" v-bind:value="room.id">{{ room.type }}</option>
                            </select>                            
                          </div>
                        </div>
                        <div><button type="submit" class="booking_button trans_200">Search</button></div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="center-title">
              <h2 class="title" style="padding-top:10px">Hotels Near You</h2>
            </div>
          </div>
        </div>
        <hr/>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6" style="margin-bottom:30px;" v-for="(hotel, index) in hotels.data" :key="index">
            <div class="card">
            
              <img :src="'/images/hotel/'+hotel.image" class="card-img-top" alt="" style="max-height:150px">
              <div class="card-body">
                <h5 class="card-title">{{ hotel.name }}</h5>
                <p class="card-text">Some quick example text to build on the card title.</p>
                <a tag="button" href="javascript:;" class="btn btn-warning btn-block" >{{ hotel.name }}</a>
              </div>            

            </div>
          </div>        
        
        </div>
      </div>

    </div>
</template>

<script>
  import Datepicker from 'vuejs-datepicker'; 
  import moment from 'moment'; 

  export default {
    components:{
      Datepicker
    },
    data(){
      return {
        search:{
          start_date: null,
          end_date: null,
          type: null,          
        },
        hotels:[],
        roomType: [],
        options: {
          format: 'dd-MM-yyyy',
          style: 'booking_input booking_input_a booking_in',
          useCurrent: false,
          showClear: true,
          showClose: true
        }        
      }
    },
    methods:{
      handleSearchSubmit(){
        //check for null value
        console.log();
        if(this.search.start_date === null 
            || this.search.end_date === null 
            || this.search.type === null){
              return this.$toastr.w("One of the field is empty, check and try again!");
            }

        let payload = {
          start_date: moment(this.search.start_date).format('YYYY-MM-DD'),
          end_date: moment(this.search.end_date).format('YYYY-MM-DD'),
          type: this.search.type
        };

        this.$router.push({ name: 'search', query: payload });
      },
      fetchHotels(){
        axios.get('/api/hotels')
            .then(response => {
              //  console.log(response.data);
              this.hotels = response.data;
            })
            .catch(error => console.log(error));
      },
      fetchRoomType(){
        axios.get('/api/room-type')
            .then(response => response.data)
            .then(res => {
              console.log(res);
              this.roomType = res;
            })
            .catch(error => console.log(error));
      }
    },
    mounted() {
      // this.search.start_date.datepicker({dateFormat: 'dd-mm-yy'});
      // $('.enddate').datepicker({dateFormat: 'dd-mm-yy'});
    },
    created(){
      this.fetchHotels();
      this.fetchRoomType();
    }
  }
</script>

<style lang="scss" scoped>
  .col-lg-2{
    padding: 0px;
  }
</style>