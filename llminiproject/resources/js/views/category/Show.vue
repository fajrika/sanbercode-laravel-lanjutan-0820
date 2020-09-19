<template>
    <div class="container">
        <h1>Show Category</h1>
        <h2>{{category.name}}</h2>
        <hr>
        <div class="mb-4">
            <h3>Description : {{category.description}}</h3>
            <h3>Created at :{{category.created_at}}</h3>
            <router-link :to="{name:'category.edit', params: {category : this.$route.params.category}}" class="btn btn-primary">
                Edit
            </router-link>        
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            category:[],
        }
    },
    
    mounted(){
        this.getCategory();
    },

    methods: {
        async getCategory(){
            try {
                let response = await axios.get('/api/category/'+this.$route.params.category,{
                    headers: {
                        Authorization: localStorage.uuid
                    }  
                });
                if(response.status === 200){
                    let res = response.data.data
                    this.category = res.metadata;            
                    this.$toasted.show(res.message.text,{
                        type: res.message.type,
                        duration: 3000
                    })
                }
            } catch (e) {
                this.$toasted.show("Something went wrong",{
                    type: 'error',
                    duration: 3000
                })
                this.errors = e.response.data.errors;
            }         
        }
    }
    // methods:{
    //     // async getSubjects(){
    //     //     let response = await axios.get('/api/category');
    //     //     console.log(response);
    //     //     if(response.status === 200){
    //     //         this.subjects = response.data;
    //         }
    //     }
    // }
}
</script>

<style>

</style>