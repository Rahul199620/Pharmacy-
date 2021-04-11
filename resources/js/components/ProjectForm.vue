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
            <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

       <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Project</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="update">
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
                  <button type="submit" class="btn btn-info">update</button>
                  </div>
                <!-- /.card-footer -->
              </form>
            </div>

       
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
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
                      <td><button  @click="edit(Proj.id)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Edit
</button></td> 
                    
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div> 
</div>
            
</template>
<script>


export default({
  
   data(){

            return{
                   Project:{},
              form:{
                    project_name:"",
                    description:"",
                
              },
                   
            }

    },
     methods:{
            submit(){
                     axios.post('./api/Projects/',this.form).then(res=>{
                      console.log("res",res.data)
                       this.form.project_name=null,
                       this.form.description=null,
                       this.getProjects()
                 });

           },
           getProjects(){
             axios.get("./api/Projects").then((response)=>{
                       this.Project=response.data
                     })

     },

           edit(id){
             axios.get("./api/Projects/"+ id).then((response)=>{
                       this.form.project_name=response.data.project_name
                       this.form.description=response.data.description                                 
                     })

           },

           update(id){
            axios.put("./api/Projects/"+ id,this.form).then((response)=>{
                       this.getProjects();                                    
                     })

           }

     

     },
     
   created() {
            this.getProjects();
        },
     mounted(){
       console.log("Component mounted")
     }

})
</script>
