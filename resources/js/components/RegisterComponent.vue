<template>
    <div>
        <div class="py-4"></div>
        <div class="py-4"></div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 py-4 border-right">
                <img src="/assets/images/bg-signup.svg" alt="" class="img-fluid">
            </div>
            <div class="col-sm-12 col-md-8">
                <h2 class="thinner mb-4 text-primary">Signup to Donate</h2>
                <form action="" method="post" class="row form" @submit.prevent="submitForm">
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="name" class="text-grey">Name <sup class="text-danger">*</sup></label>
                        <input type="text" v-model="form.name" id="name" class="form-control" :class="{'is-invalid':errors.name}">
                        <span class="invalid-feedback" v-if="errors.name">
                            {{errors.name[0]}}
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="email" class="text-grey">Email <sup class="text-danger">*</sup></label>
                        <input type="email" v-model="form.email" id="email" class="form-control" :class="{'is-invalid':errors.email}">
                        <span class="invalid-feedback" v-if="errors.email">
                            {{errors.email[0]}}
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="phone" class="text-grey">Phone <sup class="text-danger">*</sup></label>
                        <input type="text" v-model="form.phone" id="phone" v-mask="'#### #### ##'" class="form-control" :class="{'is-invalid':errors.phone}">
                        <span>Phone number without country code</span>
                        <span class="invalid-feedback" v-if="errors.phone">
                            {{errors.phone[0]}}
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="gender" class="text-grey">Gender <sup class="text-danger">*</sup></label>
                        <div class="custom-control custom-radio" v-for="(gender, index) in genders" :key="index">
                            <input type="radio" :id="`gender_${gender.value}`" :value="gender.value" v-model="form.gender" name="gender" class="custom-control-input">
                            <label class="custom-control-label" :for="`gender_${gender.value}`">{{gender.title}}</label>
                        </div>                        
                        <span class="text-danger" v-if="errors.gender">
                            {{errors.gender[0]}}
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="blood_group" class="text-grey">Blood Group <sup class="text-danger">*</sup></label>
                        <select v-model="form.blood_group" id="blood_group" class="form-control" :class="{'is-invalid':errors.blood_group}">
                            <option v-for="(blood_group, index) in blood_groups" :key="index" :value="blood_group">{{blood_group}}</option>
                        </select>
                        <span class="invalid-feedback" v-if="errors.blood_group">
                            {{errors.blood_group[0]}}
                        </span>
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="date_of_birth" class="text-grey">Date of Birth</label>
                        <input type="date" v-model="form.date_of_birth" id="date_of_birth" class="form-control" :class="{'is-invalid':errors.date_of_birth}">
                        <span class="invalid-feedback" v-if="errors.date_of_birth">
                            {{errors.date_of_birth[0]}}
                        </span>
                    </div>                    
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="country" class="text-grey">Country <sup class="text-danger">*</sup></label>
                        <select v-model="form.country" id="country" class="form-control" :class="{'is-invalid':errors.country}">
                            <option v-for="(country, index) in countries" :key="index" :value="country.name">{{country.name}}</option>
                        </select>
                        <span class="invalid-feedback" v-if="errors.country">
                            {{errors.country[0]}}
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="state" class="text-grey">State <sup class="text-danger">*</sup></label>
                        <input type="text" v-model="form.state" id="state" class="form-control" :class="{'is-invalid':errors.state}">
                        <span class="invalid-feedback" v-if="errors.state">
                            {{errors.state[0]}}
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="city" class="text-grey">City <sup class="text-danger">*</sup></label>
                        <input type="text" v-model="form.city" id="city" class="form-control" :class="{'is-invalid':errors.city}">
                        <span class="invalid-feedback" v-if="errors.city">
                            {{errors.city[0]}}
                        </span>
                    </div>
                    <div class="col-sm-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_donated_before" v-model="form.is_donated_before">
                            <label class="custom-control-label" for="is_donated_before">I have donated Blood Before.</label>
                        </div>                        
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_available" v-model="form.is_available">
                            <label class="custom-control-label" for="is_available">I am available for Donating blood .</label>
                        </div>                        

                        <span class="invalid-feedback" v-if="errors.city">
                            {{errors.city[0]}}
                        </span>
                    </div>


                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="password" class="text-grey">Password <sup class="text-danger">*</sup></label>
                        <input type="password" v-model="form.password" id="password" class="form-control" :class="{'is-invalid':errors.password}">
                        <span class="invalid-feedback" v-if="errors.password">
                            {{errors.password[0]}}
                        </span>
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                        <label for="password_confirmation" class="text-grey">Confirm Password <sup class="text-danger">*</sup></label>
                        <input type="password" v-model="form.password_confirmation" id="password_confirmation" class="form-control" :class="{'is-invalid':errors.password_confirmation}">
                        <span class="invalid-feedback" v-if="errors.password_confirmation">
                            {{errors.password_confirmation[0]}}
                        </span>
                    </div>
                    
                    
                    <div class="col-sm-12 form-group py-2 mt-4">
                        <p class="text-lead">By Signing up, I agree to Publish My Phone, Email and other Details publically on Yuvathram Web and Mobile Apps and I agree to the <a href="">Terms and Conditions</a> and <a href="">Privacy Policies</a> of Yuvathram.</p>
                    </div>
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-outline-primary" :disabled="loading">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            loading:false,
            errors:[],
            countries:[],
            blood_groups:[
                "A+",
                "A-",
                "A1+",
                "A1-",
                "A1B+",
                "A1B-",
                "A2+",
                "A2-",
                "A2B+",
                "A2B-",
                "AB+",
                "AB-",
                "B+",
                "B-",
                "Bombay Blood Group",
                "INRA",
                "O+",
                "O-",
            ],
            genders:[
                {
                    title:"Male",
                    value:"male",
                },
                {
                    title:"Female",
                    value:"female",
                },
                {
                    title:"Trans",
                    value:"trans",
                },
            ],
            form:{
                name:"",
                email:"",
                phone:"",
                gender:"",
                date_of_birth:"",
                blood_group:"",
                country:"",
                state:"",
                city:"",
                password:"",
                password_confirmation:"",
                is_donated_before:"",
                is_available:"",
            }
        }
    },
    mounted() {
        this.getCountries();
    },
    methods: {
        getCountries(){
            this.loading = true;
            axios.get("https://restcountries.eu/rest/v2/all")
                .then(res=>{
                    this.countries = res.data;
                })
                .catch(error=>{
                    
                })
                .then(()=>{
                    this.loading = false;
                })
        },
        submitForm(){
            this.errors = [];
            this.loading = true;
            axios.post("/register",this.form)
                .then(res=>{
                    window.location.href = "/"
                })
                .catch(error=>{
                    if(error.response){
                        this.errors = error.response.data.errors;
                    }
                })
                .then(()=>{
                    this.loading = false;
                })
        },
    },
}
</script>