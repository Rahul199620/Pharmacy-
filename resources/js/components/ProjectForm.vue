<template>
<div class="container">
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
           

           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Projects list</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>S.NO</th>
                      <th>Project Name</th>
                      <th>Description</th>
                      <th>Modify</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="Proj in Project" :key="Proj.id">
                      <td>{{Proj.id}}</td>
                      <td>{{Proj.project_name}}</td>
                      <td>{{Proj.description}}</td> 
                      <td><button   type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal">
  Edit
</button></td> 
                    
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div> 
            <EditProject></EditProject>
</div>
            
</template>
<script>
import EditProject from "./EditProject";

export default{
   name: "ProjectForm",
   components: {
    EditProject
  },
   data(){

            return{
                   
              form:{
                    project_name:"",
                    description:"",
                
              },
                Project:{},
                   errors:{},
                   
            }

    },
     methods:{
            submit(){
                     var self=this
                     axios.post('./api/Projects/',this.form).then(response=>{
                       console.log(response);
                    },(error) => {
                      console.log(error);
                      self.errors=error.response.data.errors
});

           },
           getProjects(){
                         var self=this
                         axios.get("./api/Projects").then((response)=>{
                         self.Project=response.data
                     })

     }

          

     

     },
     
   created() {
            this.getProjects();
        },
     mounted(){
       console.log("Component mounted")
     }

}
</script>
