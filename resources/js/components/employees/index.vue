<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Employee List</h1>

    </div>
    <div class="row">
        <div class="col-md-8 offset-2">
            <div v-if="showMessage" class="alert alert-success">
                {{message}}
            </div>
        </div>
      <div class="card shadow mb-4 col-md-8 offset-2">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary d-sm-inline-block">
           Employee List
          </h6>
          <router-link :to="{ name: 'EmployeesCreate' }" style="float:right" class="btn btn-outline-success"> <i class="fa fa-plus"></i>
            Create New </router-link >
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table
              class="table table-bordered ">
              <thead>
                <tr>
                  <th>Sl.</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Address</th>
                  <th>Department</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(employee,id) in employees" :key="employee.id">
                  <td>#{{ id + 1 }}</td>
                  <td>{{ employee.f_name }}</td>
                  <td>{{ employee.l_name }}</td>
                  <td>{{ employee.address }}</td>
                  <td>{{ employee.departments }}</td>
                  <td>
                    <router-link
                      class="btn btn-info btn-sm"
                      :to="{
                        name: 'EmployeesEdit',
                        params: { id: employee.id },
                      }"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger btn-sm"
                      @click="deleteEmp(employee.id)">
                      Del
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      employees: [],
      showMessage: false,
      message : '',
    };
  },
  created() {
    this.getEmployees();
  },
  methods: {
    getEmployees() {
      axios
        .get("/employees/index")
        .then((res) => {
          this.employees = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deleteEmp(id) {
      axios.delete("/employees/destroy/" + id).then((res) => {
          this.showMessage = true;
          this.message = res.data;
          this.getEmployees();
      });
    },
  },
};

</script>

<style></style>
