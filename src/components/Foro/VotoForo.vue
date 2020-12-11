<template>
  <div class="list-story-upvote-grouper">
    <button
      aria-label="Votar Positivo"
      title="Votar Positivo"
      class="story-upvote-button "
      :class="{'upvoted' : voteUp}"
      @click="Vote(1)"
      :id="'VoteUp_'+id_tema"
    >
      <svg
        width="10"
        height="6"
        viewBox="0 0 10 6"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path d="M0 6l5-6 5 6z"></path>
      </svg>
    </button>
    <span class="story-vote-count"
      ><font style="vertical-align: inherit">
        <font style="vertical-align: inherit">{{votos}}</font></font
      ></span
    >
    <button
      aria-label="Votar Negativo"
      title="Votar Negativo"
      class="story-downvote-button"
      itemscope="true"
      itemtype="http://schema.org/LikeAction"
      data-fid="75"
      data-vote="2"
      :class="{'downvoted' : voteDown}"
      @click="Vote(2)"
      :id="'VoteDown_'+id_tema"
    >
      <svg
        width="10"
        height="6"
        viewBox="0 0 10 6"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path d="M0 0l5 6 5-6z"></path>
      </svg>
    </button>
  </div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";

export default {
  name: "VotoForo",
   props: ['id_tema', 'id_user', 'login'],
  data() {
    return {
        voteUp: false,
        voteDown: false, 
        votosDb: 0,
        votos: 0
    };
  },
  computed: {
    ...mapState(["urlProcesos", "skeleton"]),
  },

  methods: {
    async  Vote(val){
                  if(this.id_user == null){
 vm.$children[0].$refs.HeaderMovies.loginOpen()
 return false
}

if(this.login != null || this.login != ''){
  console.log(this.login)
      if(this.login == 0){
vm.$children[0].$refs.HeaderMovies.loginOpen()
 return false
      }
}


          if(val == 1){
              if(this.voteUp == false){
             await     fetch( this.urlProcesos +"wp-json/like/comment/?q=voteUp&id_comment="
                  +this.id_tema+"&id_user="+this.id_user)
          .then((r) => r.json())
          .then((res) => {
              this.getVotes()
          });
                 
              }
                 
          }else{
              if(this.voteDown == false){
                    await   fetch( this.urlProcesos +"wp-json/like/comment/?q=voteDown&id_comment="
                  +this.id_tema+"&id_user="+this.id_user)
          .then((r) => r.json())
          .then((res) => {
              this.getVotes()
          });
              }
            
          }


      }, 
    async  getVotes(){
   await fetch( this.urlProcesos +"wp-json/like/comment/?q=getVotes&id_comment="
                  +this.id_tema+"&id_user="+this.id_user)
          .then((r) => r.json())
          .then((res) => {
            console.log(res)
              if(res[0].voteUp > 0){
                    this.voteUp = true
              } else{
                  this.voteUp = false
              }
               if(res[0].voteDown > 0){
                    this.voteDown = true
              }else{
                  this.voteDown = false
              }
              this.votos =  res[0].votos
          });
      }
  },
  components: {},
  mounted() {
      this.getVotes()
  },
};
</script>
<style >
</style>