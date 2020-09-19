<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <router-link class="navbar-brand" :to="{name:'home'}">Resto {{auth.role?' | '+auth.role:''}}</router-link>

        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link class="nav-link" exact :to="{name:'home'}">Home</router-link>
                </li>
                <li class="nav-item dropdown" v-if="auth.role == 'Admin'">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        >Category</a
                    >
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link class="dropdown-item" :to="{name:'category.index'}">List</router-link>
                        <router-link class="dropdown-item" :to="{name:'category.create'}">Create</router-link>
                    </div>
                </li>
                <li class="nav-item dropdown" v-if="auth.role == 'Admin'">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        >Product</a
                    >
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link class="dropdown-item" :to="{name:'product.index'}">List</router-link>
                        <router-link class="dropdown-item" :to="{name:'product.create'}">Create</router-link>
                    </div>
                </li>
                <li class="nav-item" v-if="auth.role == 'User'">
                    <router-link class="nav-link" exact :to="{name:'order.create'}">Order</router-link>
                </li>
            </ul>

            <div class="float-right">
                <div class="row">

                    <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Chat
                    </button>

                    <router-link v-if="!stat" class="btn btn-primary" :to="{name:'auth.login'}">
                        Login
                    </router-link>
                    <button v-if="stat" class="btn btn-primary d-flex align-items-center" @click="logout">
                        {{`${auth.name} | `}}Logout
                        <template v-if="loading">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background-image: none; display: block; shape-rendering: auto; background-position: initial initial; background-repeat: initial initial;" width="20px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"> <g transform="translate(80,50)"> <g transform="rotate(0)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="1"> <animateTransform attributeName="transform" type="scale" begin="-0.875s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.875s"></animate> </circle> </g> </g><g transform="translate(71.21320343559643,71.21320343559643)"> <g transform="rotate(45)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.875"> <animateTransform attributeName="transform" type="scale" begin="-0.75s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.75s"></animate> </circle> </g> </g><g transform="translate(50,80)"> <g transform="rotate(90)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.75"> <animateTransform attributeName="transform" type="scale" begin="-0.625s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.625s"></animate> </circle> </g> </g><g transform="translate(28.786796564403577,71.21320343559643)"> <g transform="rotate(135)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.625"> <animateTransform attributeName="transform" type="scale" begin="-0.5s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.5s"></animate> </circle> </g> </g><g transform="translate(20,50.00000000000001)"> <g transform="rotate(180)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.5"> <animateTransform attributeName="transform" type="scale" begin="-0.375s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.375s"></animate> </circle> </g> </g><g transform="translate(28.78679656440357,28.786796564403577)"> <g transform="rotate(225)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.375"> <animateTransform attributeName="transform" type="scale" begin="-0.25s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.25s"></animate> </circle> </g> </g><g transform="translate(49.99999999999999,20)"> <g transform="rotate(270)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.25"> <animateTransform attributeName="transform" type="scale" begin="-0.125s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.125s"></animate> </circle> </g> </g><g transform="translate(71.21320343559643,28.78679656440357)"> <g transform="rotate(315)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.125"> <animateTransform attributeName="transform" type="scale" begin="0s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="0s"></animate> </circle> </g> </g> <!-- [ldio] generated by https://loading.io/ --></svg>    
                        </template>
                    </button>
                </div>

            </div>
            
        </div>
        <div class="position-fixed" style="top:50%">
            <div class="collapse" id="collapseExample">
                <div class="card">
                    <div class="card-header">
                        Chat
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data(){
        return{
            stat : false,
            auth: {
                name : '',
                role : ''
            },
            loading : false
        }
    },
    mounted() {
        this.stat = localStorage.length !== 0 ? true : false
        if(this.stat){
            this.auth.name = localStorage.name
            this.auth.role = localStorage.role_name
        }// localStorage.name = 'a'
        console.log(localStorage);
    },
    methods:{
        async logout(){
            this.loading = true;
            try {
                let response = await axios.post('/api/logout',[],{
                    headers: {
                        Authorization: localStorage.uuid
                    }  
                });
                if(response.status === 200){
                    let res = response.data.data;
                    this.loading = false;
                    this.success = res.message
                    this.$toasted.show(res.message.text,{
                        type: res.message.type,
                        duration: 3000
                    })
                    localStorage.removeItem('uuid');
                    localStorage.removeItem('name');
                    localStorage.removeItem('email');
                    localStorage.removeItem('role_uuid');
                    localStorage.removeItem('role_name');
                    this.stat = ''
                    window.location.href = '/';
                }else{
                    this.$toasted.show(res.message.text,{
                        type: 'error',
                        duration: 3000
                    })
                }
            } catch (e) {
                console.log(e);
                this.loading = false;
                this.$toasted.show("Something went wrong",{
                    type: 'error',
                    duration: 3000
                })
            }
        }
    }
};
</script>