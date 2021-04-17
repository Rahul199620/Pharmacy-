<template>
   <div class="container">
      <div class="row mt-4">
         <div class="col-sm-8">
            <div class="modal" id="Project">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="card card-info">
                        <div class="modal-body">
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
                                 <div class="alert alert-danger" v-if="errors.project_name" :errors="errors">
                                 <strong>{{ errors.project_name[0] }}</strong> 
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                       <input type="description" class="form-control" name="description" v-model="form.description"> 
                                    </div>
                                 </div>
                                <div class="alert alert-danger" v-if="errors.description" :errors="errors">
                                 <strong>{{ errors.description[0] }}</strong> 
                                </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                 <button type="submit" class="btn btn-info">Create</button>
                              </div>
                              <!-- /.card-footer -->
                           </form>
                           <div v-if="message" class="alert alert-success">
                           <strong>Success!</strong>Project created.
                          </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Projects List</h3>
                  <div class="card-tools">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Project">
                     Create Project
                     </button>
                  </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>S.NO</th>
                           <th>Project Name</th>
                           <th>Description</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="Proj in Project" :key="Proj.id">
                           <td>{{Proj.id}}</td>
                           <td>{{Proj.project_name}}</td>
                           <td>{{Proj.description}}</td>
                           <td><button  @click="RemoveManufacturer(Proj.id)" type="button" class="btn btn-danger" >Delete</button><button  @click="EditManufacturer(Proj.id)" type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#editmodal">Edit
                              </button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!-- /.card-body -->
            </div>
            <EditProject v-bind:manufacture="ManufactureEdit"></EditProject>
         </div>
      </div>
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
                      ManufactureEdit:{},
                      message:false,                   
               }
       },
        methods:{
               EditManufacturer(id){
                            var self=this
                            axios.get('./api/modify/'+ id).then(response=>{
                            self.ManufactureEdit=response.data
                        })
   
               },
               RemoveManufacturer(id){
                           var self=this
                           axios.delete('./api/Projects/' + id).then(function (response) {
                           self.getProjects();    
     });
               },
               submit(){
                        var self=this
                        axios.post('./api/Projects/',this.form).then(response=>{
                           self.message=true,
                          console.log(response);
                          self.getProjects();
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