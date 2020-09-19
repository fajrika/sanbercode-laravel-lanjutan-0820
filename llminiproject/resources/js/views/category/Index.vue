<template>
    <div class="container">
        <h1>List Category</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category in categories" :key="category.uuid">
                    <td>
                        <router-link :to="{name:'category.show', params: {category : category.uuid}}">
                            {{category.name}}
                        </router-link>
                    </td>
                    <td>{{category.description}}</td>
                    <td>{{category.created_at}}</td>
                    <td>
                        <router-link :to="{name:'category.edit', params: {category : category.uuid}}" class="btn btn-primary col-md-12">
                            Edit
                        </router-link>
                    </td>                
                    <td>
                        <button class="btn btn-danger col-md-12" @click.prevent="destroyCategory(category.uuid)"
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
            categories:[],
        }
    },
    mounted(){
        this.getCategories();
    },

    methods: {
        async getCategories(){            
            try {
                let response = await axios.get('/api/category',{
                    headers: {
                        Authorization: localStorage.uuid
                    }  
                });
                if(response.status === 200){
                    let res = response.data.data
                    this.categories = res.metadata;
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
        async destroyCategory(uuid){
            let confirm = window.confirm('Are you sure ?')
            if(confirm){
                try {
                    let response = await axios.delete(`/api/category/${uuid}`,{
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
                    this.getCategories();
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