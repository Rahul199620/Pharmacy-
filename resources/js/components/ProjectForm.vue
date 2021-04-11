<template>
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Project</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="submit">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Project Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="project_name" v-model="form.project_name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <input type="description" class="form-control" name="description" v-model="form.description"> 
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Create</button>
                  </div>
                <!-- /.card-footer -->
              </form>
            </div>
</template>
<script>


export default({
  
    data(){

            return{
              form:{
                    project_name:"",
                     description:"",
                
              }
            }

    },
     methods:{
       submit(){
          axios.post('./api/Projects/',this.form).then(res=>{
            console.log("res",res.data)
          });

           }

     },
  
     mounted(){
       console.log("Component mounted")
     }

})
</script>
