<template>
    <div class="container">
        <div class="py-4"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 text-center" v-if="loading">
                <div class="spinner-border text-primary thin-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>                
            </div>
            <div class="col-sm-4 border-right">
                <div class="card card-body border-0 shadow-sm">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="group_blood">Blood Group</label>
                            <select name="group" id="group_blood" class="form-control">
                                <option value="*">All Blood Groups</option>
                                <option v-for="(blood_group, index) in blood_groups" :key="index" :value="blood_group">{{blood_group}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="group_blood">Country</label>
                            <select name="group" id="group_blood" class="form-control">
                                <option value="*">Anywhere</option>
                                <option v-for="(country, index) in countries" :key="index" :value="country.name">{{country.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="group_blood">Country</label>
                            <select name="group" id="group_blood" class="form-control">
                                <option value="*">Anywhere</option>
                                <option v-for="(country, index) in countries" :key="index" :value="country.name">{{country.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <th class="text-grey w-25">Name</th>
                            <th class="text-grey w-25">Phone</th>
                            <th class="text-grey">Group</th>
                            <th class="text-grey">Gender</th>
                            <th class="text-grey">Location</th>
                            <th class="text-grey">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-borderless">
                        <tr v-for="(donor, index) in donors" :key="index">
                            <th>{{donor.name}}</th>
                            <td><a :href="`tel:${donor.phone}`">{{donor.phone}}</a></td>
                            <td><span class="text-primary">{{donor.blood_group}}</span></td>
                            <td>{{donor.gender_formatted}}</td>
                            <td>{{donor.city}}, {{donor.state}}, {{donor.country}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="error-alert" v-if="error">
            {{error}}
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                loading:false,
                error:null,
                donors:[],
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
            }
        },
        mounted() {
            this.GetDonors();
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
            GetDonors(){
                this.loading = true;
                axios.get('/api/donors')
                    .then(res=>{
                        this.donors = res.data;
                    })
                    .catch(error=>{
                        this.error = error.message;
                    })
                    .then(()=>{
                        this.loading = false;
                    })
            }
        },
    }
</script>
<style lang="scss">
    .thin-border{
        border-width: 2px;
    }
    .error-alert{
        position: fixed;
        bottom:10px;
        right: 10px;
        padding:10px;
        background-color: rgba($color: #000000, $alpha: 0.5);
        color: #FFFFFF;
        border-radius: 50px;
        text-align: center;
    }
</style>
