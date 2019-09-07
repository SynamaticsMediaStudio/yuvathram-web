<template>
    <form class="row justify-content-center" @submit.prevent="login">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card card-body border-0 shadow-sm">
                <h3 class="thinner text-primary">Welcome Back.</h3>
                <div class="form-group">
                    <label 
                        for="phone" 
                        class="text-grey">Phone Number</label>
                    <input 
                        type="text" 
                        v-mask="'#### #### ##'" 
                        :disabled="loading" 
                        name="phone" 
                        id="phone" 
                        class="form-control" 
                        :class="{'is-invalid':errors.phone}"
                        v-model="user.phone">
                    <span 
                        class="invalid-feedback" 
                        v-if="errors.phone">
                        {{errors.phone[0]}}
                    </span>
                </div>
                <div class="form-group">
                    <label 
                        for="password" 
                        class="text-grey">Password</label>
                    <input 
                        type="password" 
                        :disabled="loading" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        :class="{'is-invalid':errors.password}"
                        v-model="user.password">
                    <span 
                        class="invalid-feedback" 
                        v-if="errors.password">
                        {{errors.password[0]}}
                    </span>
                </div>
                <div class="form-group">
                   <button 
                    type="submit" 
                    :disabled="loading" 
                    class="btn btn-block btn-primary">
                       <span 
                            v-if="loading" 
                            class="spinner-border spinner-border-sm" 
                            role="status" 
                            aria-hidden="true"></span> 
                       <span 
                            v-else>Login</span>
                    </button>
                </div>
            </div>
            <div 
                class="py-4 text-center text-light">
                <a 
                    class="text-light" 
                    href="">Forgot Password</a> | 
                <a 
                    class="text-light" 
                    href="">Create new Account</a>
            </div>
        </div>
    </form>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            loading:false,
            errors:[],
            user:{
                phone:"",
                password:""
            }
        }
    },
    methods: {
        login(){
            this.loading = true;
            this.errors = [];
            axios.post('/login',this.user)
                .then(res=>{
                    window.location.href = "/"
                })
                .catch(error=>{
                    this.errors = error.response.data.errors;
                })
                .then(()=>{
                    this.loading = false;
                })
        }
    },
}
</script>
