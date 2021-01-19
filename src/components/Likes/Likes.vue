<template>
 <div class="like-section">
         <button class="ui button fnc_addFeel"
          data-id="40846" data-type="1"
           data-status="1" onlyusers=""
           @click.prevent="likeUp()"
           :class="{'disabled' : disableBtn, 'primary' : likeUpActive, 'secondary': likeUpActive==false }"
           >
              <svg class="mofycon">
              <use xlink:href="#icon-thumbs-up"></use>
              </svg>
              <span>{{likesUps}}</span>
              </button>
              <button class="ui button fnc_addFeel"
              @click.prevent="likeDown()"
                :class="{'disabled' : disableBtn, 'primary' : likeDownActive, 'secondary': likeDownActive==false }"
         
              >
              <svg class="mofycon">
              <use xlink:href="#icon-thumbs-down"></use>
              </svg>
              <span>{{likesDowns}}</span>
              </button>
</div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";

export default {
  name: "Likes",
   props: ['post_id', 'id_user', 'userName'],
  data() {
    return {
        likesUps: 0,
        likesDowns: 0,
        disableBtn: false, 
        likeUpActive: false, 
        likeDownActive: false

    };
  },
  computed: {
    ...mapState(["urlProcesos", "skeleton"]),
  },

  methods: {

        likeUp(){
            console.log("like UP")
            this.disableBtn = true

               fetch(
          this.urlProcesos +
            "wp-json/likes/all/?q=likeUp&id_user=" +
            this.id_user + "&id_post=" + this.post_id )
          .then((r) => r.json())
          .then((res) => {
              console.log(res)
              if(res[0].like == 0){
                  console.log("ya diste tu like")
                  this.$notify({ group: 'notificacionLikes',
                   text: 'Ya diste tu like', 
                   type: 'error', 
                    duration: 2000, 
                    speed: 1000, 
                  
                   })
                  this.disableBtn = false
              }else{
                 //envio a consultar otra vez los datos de up y down
                 
                this.getLikes()
                
              }
            
          });
        }, 
 likeDown(){
            console.log("like Down")
            this.disableBtn = true

               fetch(
          this.urlProcesos +
            "wp-json/likes/all/?q=likeDown&id_user=" +
            this.id_user + "&id_post=" + this.post_id )
          .then((r) => r.json())
          .then((res) => {
              console.log(res)
              if(res[0].like == 0){
                  console.log("ya diste tu like")
                  this.$notify({ group: 'notificacionLikes',
                   text: 'Ya diste tu like', 
                   type: 'error', 
                    duration: 2000, 
                    speed: 1000, 
                   
                   })
                  this.disableBtn = false
              }else{
                 //envio a consultar otra vez los datos de up y down
                 
                this.getLikes()
                
              }
            
          });
        },
      async  getLikes(){
       await         fetch(
          this.urlProcesos +
            "wp-json/likes/all/?q=getLikes&id_user=" +
            this.id_user + "&id_post=" + this.post_id )
          .then((r) => r.json())
          .then((res) => {
              console.log(res)
             this.likesUps = res[0].likesUps
            this.likesDowns = res[0].likesDowns
            if(res[0].userLikeUp > 0){
                this.likeUpActive = true
            }
            if(res[0].userLikeDown > 0){
                this.userLikeDown = true
            }
            this.disableBtn = false
          });

        }
   
    },
  components: {},
  mounted() {
      this.getLikes()
  },
};
</script>
<style >
</style>