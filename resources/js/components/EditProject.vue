<template>
   <div id="editmodal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-body">
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
                              <input type="text" class="form-control" name="project_name" v-model="manufacture.project_name" >
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="description" class="col-sm-2 col-form-label">Description</label>
                           <div class="col-sm-10">
                              <input type="description" class="form-control" name="description" v-model="manufacture.description"> 
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button type="submit" class="btn btn-info">Create</button>
                     </div>
                     <!-- /.card-footer -->
                  </form>
                  <div v-if="update_success" class="alert alert-success">
                           <strong>Success!</strong>Project updated.
                          </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
   export default {
       props:['manufacture'],
     data(){
               return{
                    project_name:"",
                    description:"",  
                    update_success:false,
                   } 
                                            
          },
            methods:{
               update() {var self=this
             axios.put('/api/Projects/' + self.manufacture.id, {
             'project_name':self.manufacture.project_name,
             'description':self.manufacture.description,
             }).then(response=>{
             self.update_success=true})
   
   } 
            }
   }
</script>