<template>
    <div v-if="validationErrors">
        <ul class="alert alert-danger">
            <li v-for="(value, index) in validationErrors" :key="index">{{ value }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:['errors'],
        computed:{
            validationErrors(){
                let errors = Object.values(this.errors);
                return errors.flat();
            }            
        }
    }
</script>

<style lang="scss" scoped>

</style>