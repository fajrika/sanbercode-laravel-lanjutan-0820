<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form class="form" action="#" method="post" @submit.prevent="store">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" v-model="form.email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" v-model="form.password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary d-flex align-items-center">
                                Submit
                                <template v-if="loading">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background-image: none; display: block; shape-rendering: auto; background-position: initial initial; background-repeat: initial initial;" width="20px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"> <g transform="translate(80,50)"> <g transform="rotate(0)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="1"> <animateTransform attributeName="transform" type="scale" begin="-0.875s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.875s"></animate> </circle> </g> </g><g transform="translate(71.21320343559643,71.21320343559643)"> <g transform="rotate(45)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.875"> <animateTransform attributeName="transform" type="scale" begin="-0.75s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.75s"></animate> </circle> </g> </g><g transform="translate(50,80)"> <g transform="rotate(90)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.75"> <animateTransform attributeName="transform" type="scale" begin="-0.625s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.625s"></animate> </circle> </g> </g><g transform="translate(28.786796564403577,71.21320343559643)"> <g transform="rotate(135)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.625"> <animateTransform attributeName="transform" type="scale" begin="-0.5s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.5s"></animate> </circle> </g> </g><g transform="translate(20,50.00000000000001)"> <g transform="rotate(180)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.5"> <animateTransform attributeName="transform" type="scale" begin="-0.375s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.375s"></animate> </circle> </g> </g><g transform="translate(28.78679656440357,28.786796564403577)"> <g transform="rotate(225)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.375"> <animateTransform attributeName="transform" type="scale" begin="-0.25s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.25s"></animate> </circle> </g> </g><g transform="translate(49.99999999999999,20)"> <g transform="rotate(270)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.25"> <animateTransform attributeName="transform" type="scale" begin="-0.125s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.125s"></animate> </circle> </g> </g><g transform="translate(71.21320343559643,28.78679656440357)"> <g transform="rotate(315)"> <circle cx="0" cy="0" r="6" fill="#93dbe9" fill-opacity="0.125"> <animateTransform attributeName="transform" type="scale" begin="0s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform> <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="0s"></animate> </circle> </g> </g> <!-- [ldio] generated by https://loading.io/ --></svg>    
                                </template>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            form:{
                'email' : '',
                'password' : ''
            },
            loading : false
        }
    },

    methods: {

        async store(){
            this.loading = true;
            try {
                let response = await axios.post('/api/login',this.form);
                if(response.status === 200){
                    let res = response.data.data;
                    this.loading = false;
                    this.success = res.message
                    this.$toasted.show(res.message.text,{
                        type: res.message.type,
                        duration: 3000
                    })
                    localStorage.uuid = res.metadata.uuid;
                    localStorage.name = res.metadata.name;
                    localStorage.email = res.metadata.email;
                    localStorage.role_uuid = res.metadata.role_uuid;
                    localStorage.role_name = res.metadata.role.name;
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
}
</script>

<style>

</style>