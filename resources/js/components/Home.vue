<template>
    <div>
      <div class="container">
        <div class="jumbotron">

          <div class="row">
            <div class="col-md-8">
              <h1 class="display-4">Search Hotels</h1>
              <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>            
            </div>
            <div class="col-md-4">
              <form role="form" v-on:submit.prevent="handleSearchSubmit()">
                <div class="form-group">
                  <label for="startdate">Start Date</label>
                  <datepicker v-model="search.start_date" :config="options" placeholder="Start Date"></datepicker>
                </div>
                <div class="form-group">
                  <label for="enddate">End Date</label>
                  <datepicker v-model="search.end_date" :config="options" placeholder="End Date"></datepicker>
                </div>
                <div class="form-group">
                  <label for="roomType">Room Type</label>
                  <select id="roomType" v-model="search.type" class="form-control">
                    <option disabled value="">Room Type</option>
                    <option v-for="(room, index) in roomType" :key="index" v-bind:value="room.id">{{ room.type }}</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-success btn-block">Search</button>
              </form>            

            </div>
          </div>

        </div>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="center-title">
              <h2 class="title">Hotels Near You</h2>
            </div>
          </div>
        </div>
        <hr/>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6" style="margin-bottom:30px;" v-for="(hotel, index) in hotels.data" :key="index">
            <div class="card">
            
              <img :src="hotel.image" class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">{{ hotel.name }}</h5>
                <p class="card-text">Some quick example text to build on the card title.</p>
                <router-link tag="button" :to="{ name: 'hotel', params: { hotelId: hotel.id }}" class="btn btn-primary btn-block" >{{ hotel.name }}</router-link>
              </div>            

            </div>
          </div>        
        
        </div>
      </div>

    </div>
</template>

<script>
  import Datepicker from 'vue-bootstrap-datetimepicker';  

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
          format: 'DD-MM-YYYY',
          useCurrent: false,
          showClear: true,
          showClose: true,
        }        
      }
    },
    methods:{
      handleSearchSubmit(){
        //check for null value
        if(this.search.start_date === null 
            || this.search.end_date === null 
            || this.search.type === null){
              return this.$toastr.e("One of the field is empty, check and try again!");
            }

        this.$router.push({ name: 'search', query: this.search });
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
    mounted() {},
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