<template>
    <div>
      <div class="jumbotron">
        <div class="container">

          <div class="row">
            <div class="col-md-6">
              <h1 class="display-4">Search Hotels</h1>
              <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>            
            </div>
            <div class="col-md-6">
              <form>
                <div class="form-group">
                  <label for="startdate">Start Date</label>
                  <datepicker v-model="start_date" :config="options" placeholder="Start Date"></datepicker>
                </div>
                <div class="form-group">
                  <label for="enddate">End Date</label>
                  <datepicker v-model="end_date" :config="options" placeholder="End Date"></datepicker>
                </div>
                <div class="form-group">
                  <label for="roomType">Room Type</label>
                  <select id="roomType" class="form-control">
                    <option selected>Select Room Type...</option>
                    <option v-for="(room, index) in roomType" :key="index" v-text="room.type"></option>
                  </select>
                </div>
                <button type="submit" class="btn btn-success btn-block">Search</button>
              </form>            

            </div>
          </div>

        </div>
      </div>
      
      <div class="container">
        <h3 class="mt-5">Hotels near you</h3>
        
        <div class="row">
          <div class="card col-lg-2" style="margin:5px" v-for="(hotel, index) in hotels.data" :key="index">
            <img :src="hotel.image" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ hotel.name }}</h5>
              <p class="card-text">Some quick example text to build on the card title.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
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
        start_date: null,
        end_date: null,
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