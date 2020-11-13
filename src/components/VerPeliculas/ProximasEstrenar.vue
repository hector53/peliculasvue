<template>
<div>
    <ul id="latest_trailers">
        <li class="watched" v-for="(movie, index) in arrayEstrenos" :key="index" >
            <a href="film/kin" title="Kin izle" @click.prevent="newTrailerSerie(movie.trailer)" >
                <div class="trailer_simg">
                    <img class="lazy-wide loaded imgPeliEstrenar"
                    :src="movie.imagen"
                    alt="Kin" data-src="/uploads/series/kin_thumb.jpg"
                    data-was-processed="true">
                    <span class="watch-now">Publicada</span>
                </div>
                <h6>{{movie.titulo}}</h6>
            </a>
        </li>

    </ul>
</div>
</template>

<script>

export default {
  name: 'ProximasEstrenar',
     props: {
        arrayEstrenos:{
            type: Array, 
            required: true,
        },
    },
    data (){
       return {
        
        }
    },
    
    methods: {
           newTrailerSerie(trailer){
              //mostrar trailer de youtube 
              var youtube = trailer.split("=")
            //  console.log(youtube[1]);
              this.$swal({
                html:
                  '<iframe width="100%" height="300" src="https://www.youtube.com/embed/'+youtube[1]+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                  showConfirmButton: false,
                  showCloseButton: true,
                
              })
              return  
            }, 
    },
      components: {
         }, 
    mounted() {
    }
}
</script>
<style scoped>
.imgPeliEstrenar{
    height: 100%!important;
}
</style>