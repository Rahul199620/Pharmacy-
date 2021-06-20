<template>
    <div class="container mt-4">
         
        <div class="card- wrap" v-if=openForm>
            <div class="card card-info">
              <div class="card-header">
              <strong>Patient Form</strong>
              </div>
              <div class="card-body">
                  <patient-form
                  :form-id="form_id"
                  ></patient-form>
              </div>    
            </div>
        </div>
      <div class="card mt-4">
              <div class="card-header">
                 <strong>Patient List</strong>

                <div class="card-tools">
                  <button class="btn-info"  @click.prevent="openForm=!openForm">New Patient</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Patient Name</th>
                      <th>Age</th>
                      <th>Admit Date</th>
                      <th>Checkout Date</th>
                      <th>Doctor</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in list" :key="item.id">
                      <td>{{item.id}}</td>
                      <td>{{item.name}}</td>
                       <td>{{item.age}}</td>
                      <td>{{item.admitted_date}}</td>
                      <td>{{item.checkout_date}}</td>
                      <td>{{item.doctor.name}}</td>                      
                      <td><button class="btn btn-info" @click.prevent="openForm=!openForm"  @click="editPatient(item.id)">Edit</button></td>
                      </tr>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

    </div>
</template>
<script>
import PatientForm from './PatientForm.vue';
export default {
  components:{
      PatientForm
    
  },
   data(){
       return{
             form_id:0,
             openForm:false,
             list:{}
       }
        
   },
   methods:{
          
            getPatients:function(){
               var self=this
                        axios.get('patients').then(response=>{
                            self.list=response.data.patients
                         
                             
                       });
 
           },
           editPatient:function(id){
             var self=this
             self.form_id=id
           }


     
   
     
},
  mounted(){
        console.log('mounted');
     },
     created(){
       this.getPatients();
     }
}
</script>