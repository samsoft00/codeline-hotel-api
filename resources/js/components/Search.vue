<template>
    <div>
      <div class="home_sub">
        <div class="background_image" style="background-image:url(/images/hotel/premium-room.png)"></div>
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
                    
                    <img :src="'/images/hotel/'+room.image" class="card-img-top" alt="" style="max-height:150px">
                    <div class="card-body">
                      <div class="badge badge-danger details_sub" style="font-size:inherit">${{ room.type.cost.price }}/Night</div><br/>
                        <h5 class="card-title" style="margin-bottom:0px">
                          {{ 'Room '+room.name }}
                        </h5>
                        <div class="card-text" style="margin-bottom:10px">
                          <table class="table table-borderless">
                            <tr>
                              <th>Start Date</th>
                              <td>{{ search.start_date }}</td>
                            </tr>
                            <tr>
                              <th>End Date</th>
                              <td>{{ search.end_date }}</td>
                            </tr>
                            <tr>
                              <th>Total Days</th>
                              <td>{{ search.days+" Days" }}</td>
                            </tr>
                            <tr>
                              <th>Total Cost</th>
                              <td>{{ total(room.type.cost.price) }}</td>
                            </tr>                                                                                   
                          </table>
                        </div>
                        <button tag="button" v-on:click="bookRoom(room.id)" class="btn btn-primary btn-block" >More Info</button>
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
                rooms: [],
                search: {}
            }
        },
        methods:{
            searchHotelFromRoute(){
                this.search.type = this.$route.query.type;
                this.search.end_date = this.$route.query.end_date;
                this.search.start_date = this.$route.query.start_date;
                 
                let start = moment(this.search.start_date);
                let end   = moment(this.search.end_date);

                //Difference in number of days
                this.search.days = moment.duration(end.diff(start)).asDays();
            
                //http://127.0.0.1:8000/api/room/search?type=2&start_date=11-06-2019&end_date=13-06-2019
                axios.get(`/api/room/search?type=${this.search.type}&start_date=${this.search.start_date}&end_date=${this.search.end_date}`)
                    .then(response => this.rooms = response.data)
                    .catch(error => console.log(error));                
            },
            total(value){
              if(value === null){return;}
              const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 2
              });

              this.search.total = formatter.format(this.search.days * value);
              return this.search.total;
            },
            bookRoom(roomId){
              let data = {
                room_id: roomId,
                date_start: this.search.start_date,
                date_end: this.search.end_date,
                search: {...this.search}
              };

              window.localStorage.setItem('search', JSON.stringify(data));
              const user = JSON.parse(window.localStorage.getItem('user'));

              if(user && user.access_token){
                this.$router.push({ name: 'room', params: { roomId: roomId }});
              }else{
                this.$router.push({ name: 'auth', query: { roomId: roomId }});
              }
            }
        },
        created(){
            this.searchHotelFromRoute();
        }
    }
</script>

<style lang="scss" scoped>
  table th, .table td {
      padding: 0.3rem;
  }
</style>