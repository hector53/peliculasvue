<?php
function  peliculas_ver_endpoint( $request_data ) {
	global $wpdb;
	$a=array();
	$gen = array();
    $peliculasHomeDestacadas1=array();
    $peliculasDestacadas2 = array();
    $peliculasEstrenar=array();
    $xPag = $request_data->get_param( 'xPag' );
	$ini = $request_data->get_param( 'ini' );
    $fin = $request_data->get_param( 'fin' );
    $Order = $request_data->get_param( 'Order' );
	//listo los generos de las pelicuklas
	$registros_gen = $wpdb->get_results("SELECT vue_terms.name, vue_terms.slug from vue_term_taxonomy, vue_terms where vue_term_taxonomy.term_id = vue_terms.term_id and vue_term_taxonomy.taxonomy = 'genero'");
	//ahora listo las peliculas destacadas del slider slick
	$registros_slider = $wpdb->get_results(" SELECT * FROM vue_posts, vue_postmeta WHERE vue_posts.post_type = 'movie' and vue_posts.post_status = 'publish' and vue_posts.ID = vue_postmeta.post_id and vue_postmeta.meta_key = 'destacada' and vue_postmeta.meta_value = 1 order by vue_posts.ID desc limit 0,20  ");
	for($i=0; $i<sizeof($registros_slider); $i++){
            //luego el titulo 
            $titulo = $registros_slider[$i]->post_title;  
            //luego el slug
            $slug = $registros_slider[$i]->post_name;  
            //luego la imagen 
            //primero buscamos la thumbnail id
            $registros_thumbnail_id = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = 'imagen_portada' and post_id = '".$registros_slider[$i]->ID."'  ");
            $featured_img_url = wp_get_attachment_url($registros_thumbnail_id[0]->meta_value);
          
            array_push($peliculasHomeDestacadas1,array("id" => $registros_slider[$i]->ID ,"titulo"=>$titulo,
            "slug"=>$slug, "imagen"=>$featured_img_url
            ));
        }
	//ahora las peliculas proximas a estrenar 
	$registros_Estrenar = $wpdb->get_results(" SELECT * FROM vue_posts, vue_postmeta WHERE vue_posts.post_type = 'movie' and vue_posts.post_status = 'publish' and vue_posts.ID = vue_postmeta.post_id and vue_postmeta.meta_key = 'proxima_estrenar' and vue_postmeta.meta_value = 1 order by vue_posts.ID desc limit 0,8  ");
	for($i=0; $i<sizeof($registros_Estrenar); $i++){
            //luego el titulo 
            $titulo = $registros_Estrenar[$i]->post_title;  
            //luego el slug
            $slug = $registros_Estrenar[$i]->post_name;  
            //luego la imagen 
            //primero buscamos la thumbnail id
            $registros_thumbnail_id = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = 'imagen_portada' and post_id = '".$registros_Estrenar[$i]->ID."'  ");
            $featured_img_url = wp_get_attachment_url($registros_thumbnail_id[0]->meta_value);
			//trailer
			$registros_trailer = $wpdb->get_results(" select * FROM `vue_postmeta`
			 WHERE meta_key = 'trailer' and post_id = '".$registros_Estrenar[0]->ID."'  ");
			 $registros_trailer = $registros_trailer[0]->meta_value;
            array_push($peliculasEstrenar,array("id" => $registros_Estrenar[$i]->ID ,"titulo"=>$titulo,
            "slug"=>$slug, "imagen"=>$featured_img_url, "trailer" => $registros_trailer
            ));
        }
	
    //ahora las ultimas peliculas q luego le hare la paginacion
    

	 

        if($Order == "null"){
            $args = array(
                'numberposts'	=> -1,
                'post_type'		=> 'movie',
                );
                $args["orderby"] = "ID"; 
                $args["order"] = "DESC"; 	
            
            }else{
              
            }
            if($Order == 'addMa'){
                $args = array(
                    'numberposts'	=> -1,
                    'post_type'		=> 'movie',
                    );
                $args["orderby"] = "ID"; 
                $args["order"] = "DESC"; 		
            }
            
            if($Order == 'addMe'){
                $args = array(
                    'numberposts'	=> -1,
                    'post_type'		=> 'movie',
                    );
                $args["orderby"] = "ID"; 
                $args["order"] = "ASC"; 
                
                
            }


            if($Order == 'imdbMe'){
                $args = array(
                    'numberposts'	=> -1,
                    'post_type'		=> 'movie',
                    'meta_query'	=> array(
                    'relation'		=> 'AND',
                    )
            
                    );
               
                
                array_push($args["meta_query"], array(	
                'key'		=> 'imdb_score',
                'value'		=> array( 0,10 ),
                'type'    => 'numeric',
                'compare' => 'BETWEEN',
                ));
               
                
            $args["orderby"] = "meta_value"; 
            $args["order"] = "ASC"; 
        
            }
            
            if($Order == 'imdbMa'){
                $args = array(
                    'numberposts'	=> -1,
                    'post_type'		=> 'movie',
                    'meta_query'	=> array(
                    'relation'		=> 'AND',
                    )
            
                    );
                //imdb
                array_push($args["meta_query"], array(	
                    'key'		=> 'imdb_score',
                    'value'		=> array( 0,10 ),
                    'type'    => 'numeric',
                    'compare' => 'BETWEEN',
                    ));
                
            $args["orderby"] = "meta_value"; 
            $args["order"] = "DESC"; 
        
            }
            
            if($Order == 'yearMe'){
                $args = array(
                    'numberposts'	=> -1,
                    'post_type'		=> 'movie',
                    'meta_query'	=> array(
                    'relation'		=> 'AND',
                    )
            
                    );
                //años 
                array_push($args["meta_query"], array(	
                    'key'		=> 'year',
                    'value'		=> array( 2000,2020 ),
                    'type'    => 'numeric',
                    'compare' => 'BETWEEN',
                        ));
                
            $args["orderby"] = "meta_value"; 
            $args["order"] = "ASC"; 
            }
            
            
            if($Order == 'yearMa'){
                $args = array(
                    'numberposts'	=> -1,
                    'post_type'		=> 'movie',
                    'meta_query'	=> array(
                    'relation'		=> 'AND',
                    )
            
                    );
                //años 
                array_push($args["meta_query"], array(	
                    'key'		=> 'year',
                    'value'		=> array( 2000,2020 ),
                    'type'    => 'numeric',
                    'compare' => 'BETWEEN',
                        ));
                
            $args["orderby"] = "meta_value"; 
            $args["order"] = "DESC"; 
        
            }

            $the_query = new WP_Query( $args );
           // print_r($the_query); exit;
            //echo $the_query->found_posts; 
            $contador = $the_query->found_posts; 
            //echo "aqui la 2"; 
            $args["posts_per_page"] = $fin; 
            $args["offset"] = $ini; 
            $the_query = new WP_Query( $args );
         //   print_r($the_query); exit;
            $totalPaginas = ceil($contador / $xPag); 
            $registros = $the_query->posts;


        for($i=0; $i<sizeof($registros); $i++){
           
            //luego el titulo 
            $titulo = $registros[$i]->post_title;  
            //luego el slug
            $slug = $registros[$i]->post_name;  
            //luego la imagen 
           
            //ahora buscamos la imagen que sera pequeña
            $registros_thumbnail_id2 = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = '_thumbnail_id' and post_id = '".$registros[$i]->ID."'  ");
        
            $featured_img_url2 = wp_get_attachment_url($registros_thumbnail_id2[0]->meta_value);
            //ahora los generos 

            $term_list = wp_get_post_terms( $registros[$i]->ID, 'genero', array( 'fields' => 'names' ) );
            $generos = "";   
            for($e=0; $e<sizeof($term_list); $e++){
                if($e==0){
                    $generos = $term_list[$e]; 
                }elseif($e==1){
                    $generos .= ", ".$term_list[$e];
                }
                }

            //aqui necesitamos la calificacion imdb
            $registros_imdb = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = 'imdb_score' and post_id = '".$registros[$i]->ID."'  ");
            $registros_imdb = $registros_imdb[0]->meta_value;
            //el aaño de creacion
            $registros_ano = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = 'year' and post_id = '".$registros[$i]->ID."'  ");
            $registros_ano = $registros_ano[0]->meta_value;
            array_push($peliculasDestacadas2,array("id" => $registros[$i]->ID ,"fecha"=>$registros_ano,"titulo"=>$titulo,
            "slug"=>$slug,  "genero" => $generos, "imagen2"=>$featured_img_url2, "imdb" => $registros_imdb
            ));
        }
     
	//peliculas notables 
		$peliculasNotables = array();
     $registros = $wpdb->get_results(" SELECT * FROM vue_posts, vue_postmeta WHERE vue_posts.post_type = 'movie' and vue_posts.post_status = 'publish' and vue_posts.ID = vue_postmeta.post_id and vue_postmeta.meta_key = 'pelicula_notable' and vue_postmeta.meta_value = 1 order by vue_posts.ID desc limit 0,8  ");
   
    for($i=0; $i<sizeof($registros); $i++){

        //luego el titulo 
        $titulo = $registros[$i]->post_title;  
        //luego el slug
        $slug = $registros[$i]->post_name;  
        //luego la imagen 
        //primero buscamos la thumbnail id
        $registros_thumbnail_id = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = 'imagen_portada' and post_id = '".$registros[$i]->ID."'  ");
        $featured_img_url = wp_get_attachment_url($registros_thumbnail_id[0]->meta_value);
        array_push($peliculasNotables,array("id" => $registros[$i]->ID , "titulo"=>$titulo,
        "slug"=>$slug, "imagen"=>$featured_img_url
        ));
    }
	
	//peliculas destacada por el editor
		$peliculasEditor = array();
     $registros = $wpdb->get_results(" SELECT * FROM vue_posts, vue_postmeta WHERE vue_posts.post_type = 'movie' and vue_posts.post_status = 'publish' and vue_posts.ID = vue_postmeta.post_id and vue_postmeta.meta_key = 'peliculas_editor' and vue_postmeta.meta_value = 1 order by vue_posts.ID desc limit 0,8  ");
   
    for($i=0; $i<sizeof($registros); $i++){

        //luego el titulo 
        $titulo = $registros[$i]->post_title;  
        //luego el slug
        $slug = $registros[$i]->post_name;  
        //luego la imagen 
       //ahora buscamos la imagen que sera pequeña
            $registros_thumbnail_id2 = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = '_thumbnail_id' and post_id = '".$registros[$i]->ID."'  ");
        
            $featured_img_url2 = wp_get_attachment_url($registros_thumbnail_id2[0]->meta_value);
       

	   array_push($peliculasEditor,array("id" => $registros[$i]->ID , "titulo"=>$titulo,
        "slug"=>$slug, "imagen"=>$featured_img_url2
        ));
    }
	//prueba array select pais 
		//	$field = get_field('country', '208');
	//	$value = $field['value'];
		//$label = $field['label'];

	//	$pais = "value: ".$value." Label".$label;  
	
	array_push($a,array("generos" => $registros_gen, "peliculas_slider" => $peliculasHomeDestacadas1, 
	"peliculas_estrenar" => $peliculasEstrenar, "ultimas_peliculas" => $peliculasDestacadas2, 
	"peliculas_notables" => $peliculasNotables, "peliculas_editor" => $peliculasEditor, "totalPaginas" => $totalPaginas
	
			   ));		
	
	return $a;
	}
    
add_action( 'rest_api_init', function () {
    register_rest_route( 'peliculas/ver', '/post/', array(
        'methods' => 'GET',
        'callback' => 'peliculas_ver_endpoint'
    ));
});

?>