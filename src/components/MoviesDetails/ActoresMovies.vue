<template>
   
             <div class="sixteen wide tablet five wide computer column" id="common-cast-list">
                            <h4 class="sidebar-heading">Reparto Principal</h4>
                            <div class="global-box">
                                <div class="ui middle aligned divided list">
                                    <div class="item" v-for="(movie, index) in arrayActoresMovie" :key="index">
         <router-link @click.native="$store.commit('scrollToTop')" 
	:to="{name:'VerActor', params: {slug: movie.slugActor+'.'+movie.id_actor} }">                               
                     
                                            <div class="artist-photo"
                                                :style="{ 'background-image' : 'url('+movie.imagen+')' }"></div>
                                            <div class="content">
                                                <h5 class="truncate">{{movie.nombreActor}}</h5>
                                                <div class="description truncate">{{movie.character}}</div>
                                            </div>
                                        </router-link>
                                    </div>
                               
                                </div>
                            </div>
    
                        </div>
 
</template>


<script>


export default {
  name: "ActoresMovies",
  props: {
    arrayActoresMovie: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
       
    };
  },
  
  methods: {
    
    },
  mounted() {
   
  },
  updated() {
      
  },

 
};
</script>
<style >


</style>