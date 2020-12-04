<template>
      <div v-if="micomentario" class="ui icon dropdown top right pointing dropdown" 
                :id="'subdropdown_'+id"
                :class="{'active visible' : subdropDown }"
                 tabindex="0" v-click-outside="clicAfueraSubDrop"
                  @click="openSubDropReplyComment()" >
                <svg   class="mofycon dropdown top right pointing dropdown"
                 
                 ><use xlink:href="#icon-arrow-down"></use></svg>
                <div class="menu left transition" :id="'subdrop_svg_'+id"
                 tabindex="-1" :class="{'visible mostrarItem' : subdropDown }">
                <div class="item" data-delete="724650" @click="deleteComment(id)">Eliminar</div>
                </div>
                </div>

         <div v-else class="ui icon dropdown top right pointing dropdown" 
                :id="'subdropdown_'+id"
                
                 tabindex="0" 
                   >
                <svg   class="mofycon dropdown top right pointing dropdown"
                 
                 ><use xlink:href="#icon-arrow-down"></use></svg>
               
                </div>
</template>


<script>

import ClickOutside from "vue-click-outside";
import { mapState } from "vuex";

export default {
  name: "DropDownReply",
  props: {
    id: {
      type: String,
      required: true,
    },
       micomentario: {
      type: Boolean,
      required: true,
    },
  
  },
  data() {
    return {
    
      subdropDown: false, 
      subdropDownID: null
    };
  },
  computed: {
    ...mapState(["urlProcesos"]),
  },
   
  methods: {
     async deleteComment(id){
         await fetch(
          this.urlProcesos +
            "wp-json/comentarios/add/post/?q=delRC&id_comment="+id
        )
          .then((r) => r.json())
          .then((res) => {
              
          //  console.log(res);
            if(res == true){
                this.$emit("getComments");
            }
          
        //    this.getCommentsPost();
            
          });
      }, 
    clicAfueraSubDrop(event){
    //  console.log(event)
       this.subdropDown = false
    },

    openSubDropReplyComment(id){
    //  console.log("cl")
      this.subdropDown = !this.subdropDown
      this.subdropDownID = id
    },

  },
  mounted() {
   // console.log(vm.$children)
  },
  
  directives: {
    ClickOutside,
  },
};
</script>
<style >

.mostrarItem{
  display: block;
}
</style>