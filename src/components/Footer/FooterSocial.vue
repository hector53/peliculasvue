<template>
  <div class="ui grid">
					<div class="row">
					
						<div class="right floated sixteen wide tablet twelve wide computer column">
							<ul class="footer-social right floated">
								<li>
									<a href="https://facebook.com/yabancidiziorg" rel="nofollow">
										<i class="footer-social-facebook"></i>
										<p>
											<span>Facebook</span>
											<span>Me gusta</span>
										</p>
									</a>
								</li>
								<li>
									<a href="https://twitter.com/yabancidiziorg" rel="nofollow">
										<i class="footer-social-twitter"></i>
										<p>
											<span>Twitter</span>
											<span>Seguir</span>
										</p>
									</a>
								</li>
								<li>
									<a href="https://instagram.com/yabancidiziorg" rel="nofollow">
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
      
    };
  },
    computed:{
        ...mapState(['urlProcesos'])
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