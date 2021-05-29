<template>
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" v-model="form.name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="specialization" class="col-sm-2 col-form-label">Specialization</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" v-model="form.specialization" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" v-model="form.age">
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
                name:"",
                specialization:"",
                age:"",
            }
        }
    }
}
</script>











