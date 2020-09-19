<template>
    <div class="container">
        <h1>List Order</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.uuid">
                    <td>
                        <router-link :to="{name:'product.show', params: {product : product.uuid}}">
                            {{product.name}}
                        </router-link>
                    </td>
                    <td>{{product.price}}</td>
                    <td>{{product.category.name}}</td>
                    <td>{{product.description}}</td>
                    <td>{{product.created_at}}</td>
                    <td>
                        <router-link :to="{name:'product.edit', params: {product : product.uuid}}" class="btn btn-primary col-md-12">
                            Edit
                        </router-link>
                    </td>                
                    <td>
                        <button class="btn btn-danger col-md-12" @click.prevent="destroyProduct(product.uuid)"
                        >
                            Delete
                        </button>
                    </td>                
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            products:[],
        }
    },
    mounted(){
        this.getProducts();
    },

    methods: {
        async getProducts(){            
            try {
                let response = await axios.get('/api/product');
                if(response.status === 200){
                    let res = response.data.data
                    this.products = res.metadata;
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
        },
        async destroyProduct(uuid){
            let confirm = window.confirm('Are you sure ?')
            if(confirm){
                try {
                    let response = await axios.delete(`/api/product/${uuid}`);
                    if(response.status === 200){
                        let res = response.data.data
                        this.$toasted.show(res.message.text,{
                            type: res.message.type,
                            duration: 3000
                        })
                    }
                    this.getProducts();
                } catch (e) {
                    this.$toasted.show("Something went wrong",{
                        type: 'error',
                        duration: 3000
                    })
                    this.errors = e.response.data.errors;
                }
            }

        }
    }
}
</script>

<style>

</style>