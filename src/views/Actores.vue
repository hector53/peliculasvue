<template>
   <div>
         <div class="inner-content container" id="page-artist_detail" v-for="(actor, index) in arrayActor" :key="index">
			
					
<div class="bg-cover-faker">

	<div class="profile-header">
		<img :src="actor.imagen" :alt="actor.nombreActor" :title="actor.nombreActor">
		<div class="heading-user-title">
			<h1 class="page-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
				{{actor.nombreActor}}			</font></font></h1>
        
    <Seguir :userName="userName" :id_user="id_user" :id_actor="actor.id_actor" :tipo="4" @getSeguidores="getSeguidoresbyActor()" />

        </div>
		<div class="media-meta mt-0">
			<div>
				<h6 id="following_count">{{seguidores}}</h6>
				<small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Seguidores</font></font></small>
			</div>
		</div>
	</div>

	<div class="media-meta mt-xl">
		<table class="ui fixed single line celled table">
			<tbody>
				<tr>
					<td width="170">
						<div><font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Fecha de nacimiento</font></font></div>
						<div>{{actor.birthday}}</div>
					</td>
					<td width="160">
						<div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lugar de nacimiento</font></font></div>
						<div><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">{{actor.place_of_birth}}</font></font></div>
					</td>
					<td width="155">
						<div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número de series de televisión / películas reproducidas</font></font></div>
						<div>{{actor.participo.length}}</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div class="ui column grid mt-lg">
	
		<div class="ten wide column">
			<h4 class="sidebar-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Interino</font></font></h4>
			<div class="global-box p-md flex">
				<ul class="cast-series-list">
                        <li v-for="(movie, index) in actor.participo" :key="index">
                      <router-link @click="$store.commit('scrollToTop')"
                         :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                            <img :src="movie.imagen">
                            <h3 class="truncate">{{movie.titulo}}</h3>
                            <span class="date-year">{{movie.year}}</span>
                            </router-link>
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                {{movie.character}}	
                            </font>
                            </font>
                        </li>
                                
                </ul>
			</div>
		</div>
			
		<div class="six wide column">
			<h4 class="sidebar-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Biografía</font></font></h4>
			<div class="global-box p-lg flex">
				<div class="sub-title font-md"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
					{{actor.biography}}			</font></font></div>
			</div>
		</div>
		
		
	
	</div>
</div>				
			</div>
 			</div>
 
</template>


<script>

import {mapState} from 'vuex'
import Cookies from "js-cookie";
import Seguir from '@/components/Seguir/Seguir.vue'
export default {
  name: "Actores",
  
  data() {
    return {
       arrayActor: [],
       userName: null, 
       id_user: null, 
       seguidores: 0
    };
  },
    computed:{
        ...mapState(['urlProcesos'])
    },
    components:{
Seguir, Cookies
    },
  methods: {
    async   getActorbyID(c){
    
            await fetch(
            this.urlProcesos +
            "wp-json/actor/get/?id_actor="+this.$route.params.slug+"&q=getAll" )
            .then((r) => r.json())
            .then((res) => {
            console.log(res);
               this.arrayActor = res
               this.seguidores = res[0].seguidores
                 this.$store.state.skeleton = 1

            });
        }, 
      async  getSeguidoresbyActor(){
         await fetch(
            this.urlProcesos +
            "wp-json/actor/get/?id_actor="+this.$route.params.slug+"&q=getS" )
            .then((r) => r.json())
            .then((res) => {
            console.log(res);
              
               this.seguidores = res[0].seguidores

            });
        }
    },
  mounted() {
       var co = Cookies.get("user_session"); 
        if(co != undefined)
        {
        co = JSON.parse(co)
    this.id_user = co.user_id; 
    this.userName = co.user_login
        }
      this.getActorbyID(); 
  },
  updated() {
      
  },

 created() {
   this.$store.state.skeleton = 0
 },
};
</script>
<style >
.date-year{
    position: absolute;
    right: 0;
    top: 0;
    font-size: 11px;
    color: #6d7080;
    text-align: right;
}

</style>