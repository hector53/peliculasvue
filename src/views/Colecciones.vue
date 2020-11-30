<template>
<div class="inner-content container" id="page-collection">
			
			

	<MisColecciones />

	<ColeccionesDestacadas />

    
</div>
</template>

<script>

// @ is an alias to /src
import {mapState} from 'vuex'
import MisColecciones from '@/components/Colecciones/MisColecciones.vue'
import ColeccionesDestacadas from '@/components/Colecciones/ColeccionesDestacadas.vue'
export default {
  name: 'Colecciones',
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
         ColeccionesDestacadas, MisColecciones
         }, 
  mounted() {
       this.$store.state.skeleton = 1
    },
}
</script>
