<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Employee</h1>
    </div>

    <div class="mb-5 col-md-6 offset-3">
      <div class="card">
        <div class="card-header">
            <div style="float:left">
             Edit Empolyee Info
            </div>
             <router-link :to="{ name: 'EmployeesIndex' }" class="btn btn-outline-primary" style="float:right"> <i class="fa fa-back"></i> Back </router-link  >
        </div>

        <div class="card-body">
          <form @submit.prevent="updateEmployee">

            <div class="form-group row">
              <label for="f_name" class="col-md-4 col-form-label text-md-right" >First Name</label>

              <div class="col-md-6">
                <input
                  id="f_name"
                  type="text"
                  class="form-control"
                  v-model="form.f_name"
                  value=""
                  required
                  autocomplete="f_name"
                  autofocus
                />
              </div>
            </div>

            <div class="form-group row">
              <label for="m_name" class="col-md-4 col-form-label text-md-right"
                >Middle Name</label
              >

              <div class="col-md-6">
                <input
                  id="m_name"
                  type="text"
                  class="form-control"
                  v-model="form.m_name"
                  value=""
                  required
                  autocomplete="m_name"
                  autofocus
                />
              </div>
            </div>

            <div class="form-group row">
              <label for="l_name" class="col-md-4 col-form-label text-md-right"
                >Last Name</label
              >

              <div class="col-md-6">
                <input
                  id="l_name"
                  type="text"
                  class="form-control"
                  v-model="form.l_name"
                  value=""
                  required
                  autocomplete="l_name"
                  autofocus
                />
              </div>
            </div>

            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right"
                >Address</label
              >

              <div class="col-md-6">
                <textarea
                  id="address"
                  type="text"
                  class="form-control"
                  v-model="form.address"
                  value=""
                  required
                  autocomplete="address"
                  autofocus
                  cols="30"
                  rows="1"
                ></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right"> Country </label>
              <div class="col-md-6">
                <select v-model="form.country_id" @change="getState()" class="form-control">
                  <option value="">Select Country</option>
                  <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }} </option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="state_id" class="col-md-4 col-form-label text-md-right">State</label>
              <div class="col-md-6">
                <select  v-model="form.state_id" @change="getCity()" class="form-control">
                  <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="city_id" class="col-md-4 col-form-label text-md-right" >City</label>
              <div class="col-md-6">
                <select v-model="form.city_id"  class="form-control">
                  <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name}} </option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right"> Department </label>
              <div class="col-md-6">
                <select v-model="form.department_id"  class="form-control">
                  <option>Select Department</option>
                  <option v-for="dept in depts" :key="dept.id" :value="dept.id">{{ dept.name }} </option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="f_name" class="col-md-4 col-form-label text-md-right">Zip-Code</label>

              <div class="col-md-6">
                <input
                  id="zip_code"
                  type="text"
                  class="form-control"
                  v-model="form.zip_code"
                  value=""
                  required
                  autocomplete="f_name"
                  autofocus
                />
              </div>
            </div>
            <div class="from-group"></div>

            <div class="form-group row">
              <label for="f_name" class="col-md-4 col-form-label text-md-right"
                >Birthdate</label >
              <div class="col-md-6">
                <datepicker input-class="form-control" v-model="form.birthdate" ></datepicker>
              </div>
            </div>

            <div class="form-group row">
              <label for="f_name" class="col-md-4 col-form-label text-md-right"
                >Date Hired</label>
              <div class="col-md-6">
                <datepicker input-class="form-control " v-model="form.date_hired" ></datepicker>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
export default {
  components: {
    Datepicker,
  },
  data() {
    return {
      countries: [],
      states: [],
      cities: [],
      depts: [],
      form: {
        f_name: "",
        m_name: "",
        l_name: "",
        address: "",
        department_id: "",
        country_id: "",
        state_id: "",
        city_id: "",
        zip_code: "",
        birthdate: null,
        date_hired: null,
      },
    };
  },
  created() {
    this.getCountries();
    this.getDepartments();
    this.getEmployee();
  },
  methods: {
    getEmployee(){
        axios.get("/employee/edit/" + this.$route.params.id)
            .then(res=>{
                this.form = res.data.data;
                this.getState();
                this.getCity();
            }).catch(error=>{
                console.log(error);
            })

      },
    getCountries() {
      axios.get("/employees/countries")
        .then((res) => {
          this.countries = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getState() {
      axios.get("/employees/" + this.form.country_id + "/states")
        .then((res) => {
          this.states = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getCity() {
      axios.get("/employees/" + this.form.state_id + "/cities")
        .then((res) => {
          this.cities = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getDepartments(){
        axios.get("/employees/departments")
            .then((res)=>{
                this.depts = res.data;
            })
            .catch((error)=>{
                console.log(console.error);
            });
    },
    updateEmployee(){
        axios.put("/employee/update/"+  this.$route.params.id,{
                'f_name': this.form.f_name,
                'm_name': this.form.m_name,
                'l_name': this.form.l_name,
                'address':this.form.address,
                'department_id': this.form.department_id,
                'country_id': this.form.country_id,
                'state_id': this.form.state_id,
                'city_id': this.form.city_id,
                'zip_code': this.form.zip_code,
                'birthdate': this.format_date(this.form.birthdate),
                'date_hired': this.format_date(this.form.date_hired)
            }).then(res=>{
                this.$router.push({name:'EmployeesIndex'});
            })
    },
    format_date(value){
        if(value){
            return moment(String(value)).format('YYYYMMDD')
        }
    },
  }
};
</script>

<style>
</style>
