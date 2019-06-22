<template>
    <div>
      <div class="jumbotron">
        <div class="container">

          <h1 class="display-4">Search Hotels</h1>
          <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
          <hr class="my-4">

          <form>
            <div class="form-row align-items-center">
              <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputName">Start Date</label>
                <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
              </div>
              <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">End Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                </div>
              </div>
              <div class="col-auto my-1">
                <button type="submit" class="btn btn-danger">Search</button>
              </div>
            </div>
          </form>

        </div>
      </div>
      
      <div class="container">
        <div class="row">

          <div class="card col-lg-2" style="margin:5px" v-for="(hotel, index) in hotels.data" :key="index">
            <img :src="hotel.image" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ hotel.name }}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
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
        hotels:[]
      }
    },
    methods:{
    },
    mounted() {
      axios.get('/api/hotels')
           .then(response => {
             console.log(response.data);
             this.hotels = response.data;
           })
           .catch(error => console.log(error));
    },
  }
</script>

<style lang="scss" scoped>
  .col-lg-2{
    padding: 0px;
  }
</style>