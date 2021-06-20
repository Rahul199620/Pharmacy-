<template>
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"> Patient Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" v-model="form.name">
                      <div class="alert" v-if="errors.name" :errors="errors">
                                 <strong>{{ errors.name[0] }}</strong> 
                                </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="specialization" class="col-sm-2 col-form-label">Age</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" v-model="form.age" >
                      <div class="alert" v-if="errors.age" :errors="errors">
                                 <strong>{{ errors.age[0] }}</strong> 
                                </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="specialization" class="col-sm-2 col-form-label">Admin Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" v-model="form.admitted_date" >
                      <div class="alert" v-if="errors.admitted_date" :errors="errors">
                                 <strong>{{ errors.admitted_date[0] }}</strong> 
                                </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="specialization" class="col-sm-2 col-form-label">Checkout Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" v-model="form.checkout_date" >
                      <div class="alert" v-if="errors.checkout_date" :errors="errors">
                                 <strong>{{ errors.checkout_date[0] }}</strong> 
                                </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="age" class="col-sm-2 col-form-label">Doctor</label>
                    <div class="col-sm-10">
                      <doctor-select v-model="form.doctor_id"
                      
                      ></doctor-select>
                       <div class="alert" v-if="errors.doctor_id" :errors="errors">
                                 <strong>{{ errors.doctor_id[0] }}</strong> 
                                </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit"  :value="form.form_id > 0 ?'Update' : 'Save'" class="btn btn-info" @click.prevent="SubmitForm">
                  <input type="reset" class="btn btn-info" @click.prevent="resetform" value="cancel">
                </div>
                <!-- /.card-footer -->
              </form>
            
</template>
<script>
export default {
    props:['formId'],
    data(){
        return{
            form:{
                form_id:0,
                name:'',
               age:'',
                admitted_date:'',
                checkout_date:'',
                doctor_id:'',
            },
            errors:{}
             
        }
    },
     methods:{
           SubmitForm:function(){
               var self=this
                        axios.post('patients',self.form).then(response=>{
                           
                          console.log(response);
                          
                       },(error) => {
                         console.log(error);
                         self.errors=error.response.data.errors
   });
           },
            editPatient:function(id){
               var self=this
                        axios.get('patients' + '/' + self.formId + '/edit').then(response=>{
                            var patient=response.data.patient
                            self.form=response.data.patient
                            self.form.form_id=patient.id;
                            
                            
                          
                       });
 
           }
           
     },
     mounted:function(){var self=this
       if(self.formId > 0){
         self.editPatient();
       }
     }
}
</script>











