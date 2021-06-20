<template>
    <select class="form-control"  v-bind:value="value"
    v-on:input="$emit('input', $event.target.value)" >
  <option  value="">Please select one</option>
  <option v-for="item in doctors"  :value="item.id" :key="item.id">{{item.name}}</option>
  
</select>

</template>
<script>
export default {
    props:['value'],
    data(){
        return{
             doctors:{}
        }
    },
    methods:{
        getDoctors:function(){
               
            var self=this
                        axios.get('doctors',self.form).then(response=>{
                           self.doctors=response.data.doctors
                          console.log(response.data);
                          
                       });
        
    },
    
    
},
mounted(){
        console.log('mounted');
    },
created(){
        this.getDoctors();
    }
}
</script>