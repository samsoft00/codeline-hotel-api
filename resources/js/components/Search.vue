<template>
    <div>
      <div class="home_sub">
        <div class="background_image" style="background-image:url(images/index_1.jpg)"></div>
        <div class="home_container">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="home_content text-center">
                  <div class="home_title">Search Results</div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="container" style="padding-top:20px">
        <div class="row">
            
            <div class="col-lg-4 col-md-6" style="margin-bottom:30px;" v-for="(room, index) in rooms" :key="index">
                <div class="card">
                    
                    <img :src="room.image" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ room.hotel.name }}</h5>
                        <div class="card-text">

                        </div>
                        <router-link tag="button" :to="{ name: 'room', params: { roomId: room.id }}" class="btn btn-primary btn-block" >{{ room.name }}</router-link>
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
                rooms: []
            }
        },
        methods:{
            searchHotelFromRoute(){
                let search = {
                    type: this.$route.query.type,
                    end_date: this.$route.query.end_date,
                    start_date: this.$route.query.start_date,
                }
                //http://127.0.0.1:8000/api/room/search?type=2&start_date=11-06-2019&end_date=13-06-2019
                axios.get(`/api/room/search?type=${search.type}&start_date=${search.start_date}&end_date=${search.end_date}`)
                    .then(response => this.rooms = response.data)
                    .catch(error => console.log(error));                
            }
        },
        created(){
            this.searchHotelFromRoute();
        }
    }
</script>

<style lang="scss" scoped>

</style>