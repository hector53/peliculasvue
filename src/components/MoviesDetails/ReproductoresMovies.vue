<template>
      <div>

  <div id="series-tabs" class="ui pointing secondary menu">
        <a class="ui pointing item " href="#" :class="{'active': SubtituladaDoblada == true}" @click.prevent="ShowPlayers(1)">Subtitulada</a>
        <a class="ui pointing  item" href="#"  :class="{'active': SubtituladaDoblada == false}" @click.prevent="ShowPlayers(2)" >Doblada</a>
        <a class="item desktop-only" id="sinemaModu" style="color:#fff;" @click="ActivarmodoCine">Modo Cine</a>
    </div>


        <div class="alternatives-for-this" v-show="SubtituladaDoblada">
            <div class="item" v-for="(player, index) in PlayersSubtitulos " :key="index"
            :class="{'active': activePlayer == index}" 
            @click.prevent="ShowPlayersSubs(index, player.embed)"
            >{{player.stream}}</div>
        </div>

        <div class="alternatives-for-this" v-show="SubtituladaDoblada == false">
            <div class="item"  v-for="(player, index) in PlayersDoblada " :key="index"
            :class="{'active': activePlayer == index}" @click.prevent="ShowPlayersSubs(index, player.embed)" >{{player.stream}}</div>
        
        </div>
        <div data-gets="" data-type="vuu">
            <a rel="nofollow" href="https://bit.ly/3jR08j7" target="_blank" class="desktop-only"
                style="margin:0 auto; width:100%;height: 45px">
                <img src="https://yabancidizi.pw/video/btistt.gif"
                    alt="" width="100%" height="40" border="0">
            </a>
            <br>
        </div>
        <div class="ui grid">
            <div class="left floated left aligned column pb-0 twelve wide computer sixteen wide mobile" 
            id="playersol" :class="{'modoCinePlayerSol' : modoCine}" v-click-outside="clicAfueraModoCine">
                <div class="video-wrapper" id="video-area" >
                             <div class="player" v-if="notCap" >
                        <div class="this-episode-not-ready" style="position: initial;">

                        <div>
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{tituloSerie}}</font></font></h3>
                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aún no tenemos reproductores para esta Película para la opcion {{opcion}}</font></font></p>

                        </div>
                        <iframe src="" width="100%" height="100%" frameborder="0" id="fragman-now-youtube" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                        </div>
                        </div>   

                        <div class="player" v-else >

                        <div v-html="embedCode"  ></div>

                        </div>
                </div>
            </div>
            <div class="left floated aligned four wide column computer only pb-0 pl-0" id="playersag">
                <div data-gets="" data-type="vdy">
                    <a rel="nofollow" href="https://bit.ly/3jNWreg" target="_blank"><img
                            src="https://yabancidizi.pw/video/yd-promo.gif?v=1"
                            alt="" border="0" width="250" height="210"></a>
                    <br>
                    <a rel="nofollow" href="https://bit.ly/3lKe2VB" target="_blank"><img
                            src="https://yabancidizi.pw/video/yd-deposit.gif?v=2.3"
                            alt="" border="0" width="250" height="210"></a>
                   
                </div>
            </div>
        </div>
           <br />
          <div class="light-off" :class="{'modoCineLucesOn' : modoCine, 'modoCineLucesOff' : modoCine == false}" ></div>
 
        </div>
</template>


<script>
import {mapState} from 'vuex'
import ClickOutside from 'vue-click-outside'
export default {
  name: 'ReproductoresMovies',
     props: {
        movieID:{
            type: String, 
            required: true,
        },
         tituloSerie:{
            type: String, 
           
        }
    },
    data (){
       return {
            PlayersSubtitulos: [], 
            PlayersDoblada: [], 
            SubtituladaDoblada: true, 
            activePlayer: 0, 
            embedCode: "", 
            embedCodeSubtitulada: "",
            embedCodeDoblada: "", 
            modoCine: false, 
            contadorCine: 0, 
            notCap: false, 
            opcion: "subtitulada"
        }
    },
     computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
         async GetPlayersSubtitulados(){
            await fetch(this.urlProcesos+'wp-json/peliculas/detalle_slug/post/?id='+this.movieID+'&subtitulada=1')
                    .then((r) => r.json())
                    .then((res) => {
                 //       console.log(res);
                        this.PlayersSubtitulos = res["players"];
                        this.embedCode = res["embed"]; 
                     this.embedCodeSubtitulada = res["embed"]; 

                       if(res["embed"] == null){
                            this.notCap = true
                     }else{
                         this.notCap = false
                     }
                    console.log(res["embed"])
                    }
                    );
           }, 

            async GetPlayersDobladas(){
            await fetch(this.urlProcesos+'wp-json/peliculas/detalle_slug/post/?id='+this.movieID+'&subtitulada=2')
                    .then((r) => r.json())
                    .then((res) => {
                      //  console.log(res);
                        this.PlayersDoblada = res["players"];
                        this.embedCodeDoblada = res["embed"]; 
              
                    }
                    );
           }, 
        
        
            ShowPlayers(id){
                if(id == 1){
                    this.SubtituladaDoblada = true;
                    this.embedCode = this.embedCodeSubtitulada; 
                    this.activePlayer = 0; 
                     if(this.embedCode  == null){
                            this.notCap = true
                            this.opcion = "subtitulada"
                     }else{
                         this.notCap = false
                             this.opcion = "subtitulada"
                     }
                }
                if(id == 2){
                    this.SubtituladaDoblada = false;
                    this.embedCode = this.embedCodeDoblada; 
                    this.activePlayer = 0; 
                     if(this.embedCode  == null){
                            this.notCap = true
                            this.opcion = "doblada"
                     }else{
                         this.notCap = false
                         this.opcion = "doblada"
                     }
                }
            }, 
            
            ShowPlayersSubs(index, embed){
                this.activePlayer = index;
                this.embedCode = embed
            }, 
            ActivarmodoCine(){
                this.$store.commit('scrollToTopCine');
                this.modoCine = !this.modoCine

                if(this.modoCine == false){
                            console.log("modo cine Desactivado")
                }
                 if(this.modoCine == true){
                            console.log("modo cine Activado")
                }
            },
            clicAfueraModoCine(){
                this.contadorCine++
                if(this.contadorCine > 1){
                     if(this.modoCine == true){
                    this.modoCine = false
                                 console.log("modo cine Desactivado")
                                 this.contadorCine = 0
                }
                }
               
            }
    },
       directives: {
    ClickOutside
  }, 
    mounted() {
        this.GetPlayersSubtitulados();
         this.GetPlayersDobladas();
    }
}
</script>

<style>

.modoCinePlayerSol{
    z-Index: 56!important;
    width: 100%!important;
    position: absolute!important;
    top: 0!important;
}
.modoCineLucesOn{
        position: fixed!important;
    top: 0px!important;
    left: 0px!important;
    width: 100%!important;
    height: 100%!important;
    background: rgb(0, 0, 0);
    z-index: 50!important;
    display:block!important
}

.modoCineLucesOff{
        position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background: rgb(0, 0, 0);
    z-index: 50;
    display:none
}



</style>