<template>
    <div class="">
        <img class=" mx-1 img-fluid" :src="source" alt="">
            <div class="form-inline w-100">
                <div class="form-group mx-sm-1 w-75 mb-2">
                    <input v-model="new_description" class="form-control form-control-sm w-100" type="text">
                </div>
                <button v-show="loading" v-if="is_different" class="btn btn-sm btn-secondary mb-2">Saving</button>
                <button v-show="!loading" v-if="is_different" @click.prevent="updateDescription" class="btn btn-sm btn-primary mb-2">Update</button>
            </div>
    </div>
</template>

<script>
    export default {
        name: 'PhotoComponent',
        props:{
            image_id: Number,
            source: String,
            description: String,
        },
        data(){
            return{
                new_description: '',
                loading: false
            }
        },
        computed:{
            is_different(){
                return !(this.description == this.new_description)
            }
        },
        methods:{
            updateDescription(){
                this.loading = true
                Vue.axios.post('/update_post_photo/'+ this.image_id, {
                    "description": this.new_description
                }).then(response => {
                    if(response.data.message == 'Success!'){
                        this.new_description = response.data.description
                        this.description = response.data.description
                        this.loading = false
                    } else {
                        console.log(response.data.message)
                    }
                    
                }).catch(error => {
                    console.log(error)
                })
            }
        },
        
        mounted() {
            this.new_description = this.description
            console.log('Component mounted.' + this.image_id)
        }
    }
</script>
