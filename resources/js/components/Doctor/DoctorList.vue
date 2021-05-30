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
                    <tr v-for="item in list" :key="item.id">
                      <td>{{item.id}}</td>
                      <td>{{item.name}}</td>
                      <td>{{item.specialization}}</td>
                      <td>{{item.age}}</td>
                      
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
             list:{}

       }
   },
   methods:{
           getDoctors:function(){
               var self=this
                        axios.get('doctors',self.form).then(response=>{
                            self.list=response.data.doctors
                          console.log(response);
                          
                       });
 
           }
     },
     mounted(){
        console.log('mounted');
     },
     created(){
       this.getDoctors();
     }
   
}
</script>