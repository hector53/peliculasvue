<template>
  <div class="ui grid">
					<div class="row">
					
						<div class="right floated sixteen wide tablet twelve wide computer column">
							<ul class="footer-social right floated">
								<li >
									<a :href="'https://facebook.com/'+facebook" rel="nofollow" target="_blank">
										<i class="footer-social-facebook"></i>
										<p>
											<span>Facebook</span>
											<span>Me gusta</span>
										</p>
									</a>
								</li>
								<li>
									<a :href="'https://twitter.com/'+twitter" rel="nofollow" target="_blank">
										<i class="footer-social-twitter"></i>
										<p>
											<span>Twitter</span>
											<span>Seguir</span>
										</p>
									</a>
								</li>
								<li>
									<a :href="'https://instagram.com/'+instagram" rel="nofollow" target="_blank">
										<i class="footer-social-instagram"></i>
										<p>
											<span>Instagram</span>
											<span>Seguir</span>
										</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
</template>


<script>

import {mapState} from 'vuex'

export default {
  name: "FooterSocial",
  
  data() {
    return {
	  instagram: "", 
	  twitter: "", 
	  facebook: ""
    };
  },
    computed:{
        ...mapState(['urlProcesos'])
    },
   
  methods: {
	  	 async getSocial(){

              await fetch(this.urlProcesos+'wp-json/footer/options/?q=1')
                    .then((r) => r.json())
                    .then((res) => {
                       // console.log(res);
					 this.instagram = res[0].instagram
					 this.twitter = res[0].twitter
					 this.facebook = res[0].facebook
                  
                    }
                    );

        }
    },
  mounted() {
	  this.getSocial()
  },
  updated() {
      
  },

 
};
</script>
<style >

</style>