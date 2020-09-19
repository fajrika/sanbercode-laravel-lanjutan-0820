<template>
    <div class="container">
        <h1>Show Product</h1>
        <h2>{{product.name}}</h2>
        <hr>
        <div class="mb-4">
            <h3>price : {{product.price}}</h3>
            <h3>category : {{product.category.name}}</h3>
            <h3>Description : {{product.description}}</h3>
            <h3>Created at :{{product.created_at}}</h3>
            <router-link :to="{name:'product.edit', params: {product : this.$route.params.product}}" class="btn btn-primary">
                Edit
            </router-link>        
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            product:[],
        }
    },
    
    mounted(){
        this.getProduct();
    },

    methods: {
        async getProduct(){
            try {
                let response = await axios.get('/api/product/'+this.$route.params.product,{
                    headers: {
                        Authorization: localStorage.uuid
                    }  
                });
                if(response.status === 200){
                    let res = response.data.data
                    this.product = res.metadata;            
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
    //     //     let response = await axios.get('/api/product');
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