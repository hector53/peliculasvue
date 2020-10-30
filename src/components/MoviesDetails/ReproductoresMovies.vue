<template>
      <div>

  <div id="series-tabs" class="ui pointing secondary menu">
        <a class="ui pointing item " href="#" :class="{'active': SubtituladaDoblada == true}" @click.prevent="ShowPlayers(1)">Subtitulada</a>
        <a class="ui pointing  item" href="#"  :class="{'active': SubtituladaDoblada == false}" @click.prevent="ShowPlayers(2)" >Doblada</a>
        <a class="item desktop-only" id="sinemaModu" style="color:#fff;">Modo Cine</a>
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
            <div class="left floated left aligned column pb-0 twelve wide computer sixteen wide mobile" id="playersol">
                <div class="player-wrapper video-wrapper" id="video-area" >
                        <div v-html="embedCode"></div>
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
          
        </div>
</template>


<script>
import {mapState} from 'vuex'

export default {
  name: 'ReproductoresMovies',
     props: {
        movieID:{
            type: String, 
            required: true,
        },
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
                        console.log(res);
                        this.PlayersSubtitulos = res["players"];
                        this.embedCode = res["embed"]; 
                     this.embedCodeSubtitulada = res["embed"]; 
              
                    }
                    );
           }, 

            async GetPlayersDobladas(){
            await fetch(this.urlProcesos+'wp-json/peliculas/detalle_slug/post/?id='+this.movieID+'&subtitulada=2')
                    .then((r) => r.json())
                    .then((res) => {
                        console.log(res);
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
                }
                if(id == 2){
                    this.SubtituladaDoblada = false;
                    this.embedCode = this.embedCodeDoblada; 
                    this.activePlayer = 0; 
                }
            }, 
            
            ShowPlayersSubs(index, embed){
                this.activePlayer = index;
                this.embedCode = embed
            }
    },
    mounted() {
        this.GetPlayersSubtitulados();
         this.GetPlayersDobladas();
    }
}
</script>