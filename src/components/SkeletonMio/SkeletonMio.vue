<template>
    <div>
	<skeleton-loading>
            <row style="width:95%; margin:auto"
                :gutter="{
                    bottom: '15px'
                }"
            >
                <square-skeleton 
                    :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						 width: '50px',
                    }"
                >
                </square-skeleton>

            </row>
			<row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						 width: '150px',
                    }"
                >
                </square-skeleton>


			</row>
				<row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						
                    }"
                >
                </square-skeleton>


			</row>

				<row style="width:95%; margin:auto">
                    <column :span="8" :gutter="0">
                    <square-skeleton :backColor="'#1b1d26'"
						:count="1"
						:boxProperties="{
							top: '10px',
							height: '400px',
							
						}"
					>
					</square-skeleton>
                     </column>
                <column :span="20" :gutter="10">
                      	<square-skeleton :backColor="'#1b1d26'"
                            :count="5"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                             
                                
                            }"
                        >
                        </square-skeleton>
                        <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                               width: '150px',
                                
                            }"
                        >
                        </square-skeleton>
                         <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '60px',
                                height: '26px',
                               width: '100px',
                                
                            }"
                        >
                        </square-skeleton>
                         <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                               width: '100px',
                                
                            }"
                        >
                        </square-skeleton>
                </column>
		 	  


			</row>
            <row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="2"
                    :boxProperties="{
                        top: '10px',
                        height: '46px',
						
                    }"
                >
                </square-skeleton>


			</row>
        </skeleton-loading>
    </div>
</template>

<script>


export default {
  name: 'SkeletonMio',
  
   data (){
        return {
          
	
        }
    },
	
    methods: {
       },
     components: {},
  mounted() {
           
  },
}
</script>
