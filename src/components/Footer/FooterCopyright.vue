<template>
  <div class="copyright">
					<p v-html="copyright">
                            </p>
					
					
				</div>
</template>


<script>

import {mapState} from 'vuex'

export default {
  name: "FooterCopyright",
  
  data() {
    return {
      copyright: ""
    };
  },
    computed:{
        ...mapState(['urlProcesos'])
    },
   
  methods: {
async getCopyright(){

              await fetch(this.urlProcesos+'wp-json/footer/options/?q=3')
                    .then((r) => r.json())
                    .then((res) => {
             //           console.log(res);
					      this.copyright = res
                  
                    }
                    );

        }
    },
  mounted() {
    this.getCopyright()

  },
  updated() {
      
  },

 
};
</script>
<style >

</style>