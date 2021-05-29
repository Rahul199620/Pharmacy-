<template>
    <div class="container mt-4">
         
        <div class="card- wrap" v-if=openForm>
            <div class="card card-info">
              <div class="card-header">
              <strong>Doctor Form</strong>
              </div>
              <div class="card-body">
                  <doctor-form></doctor-form>
              </div>    
            </div>
        </div>
      <div class="card mt-4">
              <div class="card-header">
                 <strong>Doctor List</strong>

                <div class="card-tools">
                  <button class="btn-info"  @click.prevent="openForm=!openForm">New Doctor</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Doctor Name</th>
                      <th>Specialization</th>
                      <th>Age</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      
                    </tr>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

    </div>
</template>
<script>
import DoctorForm from './DoctorForm.vue';
export default {
  components:{DoctorForm
    
  },
   data(){
       return{
             openForm:false,

       }
   }
}
</script>