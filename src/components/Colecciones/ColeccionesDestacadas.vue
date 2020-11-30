<template>
<div>
      
</div>
</template>

<script>
// @ is an alias to /src
import {mapState} from 'vuex'

export default {
  name: 'ColeccionesDestacadas',
   data (){
        return {
    
        }
    },
      computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
           },
     components: {
         }, 
  mounted() {
    },
}
</script>
