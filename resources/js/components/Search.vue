<template>
    <div>

    </div>
</template>

<script>
    export default {
        data(){
            return {}
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
                    .then(response => console.log(response.data))
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