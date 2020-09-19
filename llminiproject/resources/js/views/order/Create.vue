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
                    <th class="text-center">Action</th>
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
                    
                    <td v-if="!selected.includes(product.uuid)">
                        <button class="btn btn-primary col-md-12" @click.prevent="select(product.uuid,product.price)">
                            Pilih
                        </button>
                    </td>                
                    
                    <td v-if="selected.includes(product.uuid)">
                        <button class="btn btn-danger col-md-12" @click.prevent="unselect(product.uuid,product.price)">
                            Cancel
                        </button>
                    </td>

                </tr>
            </tbody>
        </table>
        <div class="fixed-bottom">
            <form class="row">
                <div class="form-group col-md-4 row">
                    <label for="count" class="col-md-4 col-form-label">Order quantity</label>
                    <input v-model="orderQuantity" id="count" type="number" class="form-control col-md-8" disabled>
                </div>
                <div class="form-group col-md-4 row">
                    <label for="count" class="col-md-4 col-form-label">Total price</label>
                    <input v-model="totalPrice" id="count" type="number" class="form-control col-md-8" disabled>
                </div>
                <button class="btn btn-primary offset-md-2 col-md-2 h-100">Order</button>
            </form>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return{
            products:[],
            selected:[],
            orderQuantity: 0,
            totalPrice: 0
        }
    },
    mounted(){
        this.getProducts();
    },

    methods: {
        async getProducts(){            
            try {
                let response = await axios.get('/api/order',{
                    headers: {
                        Authorization: localStorage.uuid
                    }  
                });
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
                    let response = await axios.delete(`/api/order/${uuid}`,{
                    headers: {
                        Authorization: localStorage.uuid
                    }  
                });
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
        },
        async select(uuid,price){
            this.selected.push(uuid)
            this.totalPrice += price;
            this.orderQuantity = this.selected.length
        },
        async unselect(uuid,price){
            this.selected.splice(this.selected.indexOf(uuid),1)
            this.totalPrice -= price;
            this.orderQuantity = this.selected.length
        }
    }
}
</script>

<style>

</style>