<?php
function  buscador_descubrir_endpoint( $request_data ) {
	global $wpdb;
    $peliculas=array();
	
	
	//parametros de busqueda 
	$imdbI = $request_data->get_param( 'imdbI' );
	$imdbE = $request_data->get_param( 'imdbE' );
	$yearI = $request_data->get_param( 'yearI' );
	$yearE = $request_data->get_param( 'yearE' );
	$genS = $request_data->get_param( 'genS' );
	//echo $genS; 
	$pais = $request_data->get_param( 'pais' );
	$Order = $request_data->get_param( 'Order' );
	//parametros de busqueda
	//parametros por get paginacion
	$tipo = $request_data->get_param( 't' );
	$xPag = $request_data->get_param( 'xPag' );
	$ini = $request_data->get_param( 'ini' );
	$fin = $request_data->get_param( 'fin' );
	
	
	//incluir paises 
include get_theme_file_path('/endpoints/buscador/paises.php');
	if($tipo == 'serie'){
		//listar todo de serie 
			//primero listar los generos de las series 
	$registros_gen = $wpdb->get_results("SELECT vue_terms.name, vue_terms.slug from vue_term_taxonomy, vue_terms where vue_term_taxonomy.term_id = vue_terms.term_id and vue_term_taxonomy.taxonomy = 'generos' order by vue_terms.name asc");
		
	//ahora listar los paises q tienen post 
	$registros_paises = $wpdb->get_results("SELECT DISTINCT vue_postmeta.meta_value FROM `vue_postmeta` WHERE meta_key = 'country_s'");
	$arrayPaises = array(); 
	//ahora recorro el array de los paises para conseguir el label de acuerdo a lo q venga por el select
	for($i=0; $i<sizeof($registros_paises); $i++){
		$indice = array_search($registros_paises[$i]->meta_value, array_column($paises, 'value'));

		array_push($arrayPaises,array("value" => $paises[$indice]["value"], "name" => $paises[$indice]["name"] ));	
	}
	//listamos todo el mollejero
	if($genS == "null" ){
		$args = array(
			'numberposts'	=> -1,
			'post_type'		=> 'serie',
			'meta_query'	=> array(
			'relation'		=> 'AND',
			)

			); 
	}else{

		$args = array(
			'numberposts'	=> -1,
			'post_type'		=> 'serie',
			'meta_query'	=> array(
			'relation'		=> 'AND',
			), 
			'tax_query' => array(
			   
				),
			); 


	
			
	}






	//primero vamos por el Order
	if($Order == "null"){
	$args["orderby"] = "none"; 	
	}
	if($Order == 'addMa'){
		$args["orderby"] = "ID"; 
		$args["order"] = "DESC"; 		
	}
	
	if($Order == 'addMe'){
		$args["orderby"] = "ID"; 
		$args["order"] = "ASC"; 
		
		
	}
	
	if($Order == 'imdbMe'){
		//imdb
		if($imdbI == "null" and $imdbE == "null"){
		array_push($args["meta_query"], array(	
		'key'		=> 'imdb_score',
		'value'		=> array( 0,10 ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
		));
		}else{
		array_push($args["meta_query"], array(	
		'key'		=> 'imdb_score',
		'value'		=> array( intval($imdbI),intval($imdbE) ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
		));
		}
		
	$args["orderby"] = "meta_value"; 
	$args["order"] = "ASC"; 

	}
	
	if($Order == 'imdbMa'){
		//imdb
		if($imdbI == "null" and $imdbE == "null"){
		array_push($args["meta_query"], array(	
		'key'		=> 'imdb_score',
		'value'		=> array( 0,10 ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
		));
		}else{
		array_push($args["meta_query"], array(	
		'key'		=> 'imdb_score',
		'value'		=> array( intval($imdbI),intval($imdbE) ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
		));
		}
		
	$args["orderby"] = "meta_value"; 
	$args["order"] = "DESC"; 

	}
	
	if($Order == 'yearMe'){
		//años 
		if($yearI == "null" and $yearE == "null"){
			array_push($args["meta_query"], array(	
		'key'		=> 'year',
		'value'		=> array( 2000,2020 ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
			));
		}else{
			array_push($args["meta_query"], array(	
		'key'		=> 'year',
		'value'		=> array( intval($yearI),intval($yearE) ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
			));
		}
		
	$args["orderby"] = "meta_value"; 
	$args["order"] = "ASC"; 
	}
	
	
	if($Order == 'yearMa'){
		//años 
		if($yearI == "null" and $yearE == "null"){
			array_push($args["meta_query"], array(	
		'key'		=> 'year',
		'value'		=> array( 2000,2020 ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
			));
		}else{
			array_push($args["meta_query"], array(	
		'key'		=> 'year',
		'value'		=> array( intval($yearI),intval($yearE) ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
			));
		}
		
	$args["orderby"] = "meta_value"; 
	$args["order"] = "DESC"; 

	}
	
if($Order != "null" && $Order != "imdbMe" && $Order != "imdbMa") {
	//imdb
		if($imdbI == "null" and $imdbE == "null"){
		array_push($args["meta_query"], array(	
		'key'		=> 'imdb_score',
		'value'		=> array( 0,10 ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
		));
		}else{
		array_push($args["meta_query"], array(	
		'key'		=> 'imdb_score',
		'value'		=> array( intval($imdbI),intval($imdbE) ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
		));
		}
}

if($Order != "null" && $Order != "yearMe" && $Order != "yearMa") {
	//años 
		if($yearI == "null" and $yearE == "null"){
			array_push($args["meta_query"], array(	
		'key'		=> 'year',
		'value'		=> array( 2000,2020 ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
			));
		}else{
			array_push($args["meta_query"], array(	
		'key'		=> 'year',
		'value'		=> array( intval($yearI),intval($yearE) ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
			));
		}
}

if($Order == "null") {
	//años 
	
		if($yearI == "null" and $yearE == "null"){
			array_push($args["meta_query"], array(	
		'key'		=> 'year',
		'value'		=> array( 2000,2020 ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
			));
		}else{
			array_push($args["meta_query"], array(	
		'key'		=> 'year',
		'value'		=> array( intval($yearI),intval($yearE) ),
		'type'    => 'numeric',
		'compare' => 'BETWEEN',
			));
		}

			//imdb
			if($imdbI == "null" and $imdbE == "null"){
				array_push($args["meta_query"], array(	
				'key'		=> 'imdb_score',
				'value'		=> array( 0,10 ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
				));
				}else{
				array_push($args["meta_query"], array(	
				'key'		=> 'imdb_score',
				'value'		=> array( intval($imdbI),intval($imdbE) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
				));
				}
}


//pais 
if($pais == "null" ){
	array_push($args["meta_query"], array(	
'key'		=> 'country_s',
'value' => '',
'compare' => 'LIKE'
	));
}else{
	array_push($args["meta_query"], array(	
'key'		=> 'country_s',
'value' => $pais,
'compare' => 'LIKE'
	));
}


//genero 

if($genS == "null" ){
	
}else{
	array_push($args["tax_query"], 
	array(
		'taxonomy' => 'generos',
		'field' => 'slug',
		'terms' => $genS
	)
);
}

			
// query
$the_query = new WP_Query( $args );
//print_r($the_query); 
//echo $the_query->found_posts; 
$contador = $the_query->found_posts; 
//echo "aqui la 2"; 
$args["posts_per_page"] = $fin; 
$args["offset"] = $ini; 
$the_query = new WP_Query( $args );	
//print_r($the_query); exit;
		
	//listamos todo el mollejero fin

	$totalPaginas = ceil($contador / $xPag); 
	//echo $totalPaginas; 
	//ahora listamos las series 
	$arraySerie = array();
	$registros = $the_query->posts;
	//	print_r($registros[0]->post_title);		exit;
	 for($i=0; $i<sizeof($registros); $i++){
		 //primero el titulo
		 $titulo = $registros[$i]->post_title;  
		 //luego el slug
            $slug = $registros[$i]->post_name; 
		 //luego la imagen poster 
	    $registros_thumbnail_id2 = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = '_thumbnail_id' and post_id = '".$registros[$i]->ID."'  ");
        $featured_img_url2 = wp_get_attachment_url($registros_thumbnail_id2[0]->meta_value);
		//luego los generos 
		 $ge = array();
    $term_list = wp_get_post_terms( $registros[$i]->ID, 'generos', array( 'fields' => 'names' ) );
     $generonuevo = ""; 
     $gene = ""; 
            for($e=0; $e<sizeof($term_list); $e++){

                    if($e == (count($term_list)-1) ){
                        $gene = $term_list[$e]." ";
                    }else
                    {
                        $gene = $term_list[$e].", ";
                    }

                
                $generonuevo = str_replace(" ", "-",  $term_list[$e]);
                $generonuevo =  eliminar_acentos($generonuevo);
                $generonuevo = get_site_url()."/series/generos"."/".$generonuevo;
                array_push($ge,array("genero" => $gene, "slug" => mb_strtolower($generonuevo, 'UTF-8')  ));
                }
	//ahora el imdb 
	 $registros_imdb = $wpdb->get_results(" select * FROM `vue_postmeta`
     WHERE meta_key = 'imdb_score' and post_id = '".$registros[$i]->ID."'  ");
    $registros_imdb = $registros_imdb[0]->meta_value;
	
	//luego la sinopsis
    $registros_sinopsis = $wpdb->get_results(" select * FROM `vue_postmeta`
     WHERE meta_key = 'synopsis' and post_id = '".$registros[$i]->ID."'  ");
    $registros_sinopsis = $registros_sinopsis[0]->meta_value;
	//año
    $registros_year = $wpdb->get_results(" select * FROM `vue_postmeta`
     WHERE meta_key = 'year' and post_id = '".$registros[$i]->ID."'  ");
    $registros_year = $registros_year[0]->meta_value;
	//time
    $registros_time = $wpdb->get_results(" select * FROM `vue_postmeta`
     WHERE meta_key = 'time' and post_id = '".$registros[$i]->ID."'  ");
    $registros_time = $registros_time[0]->meta_value;
	//buscamos cuantas temporadas tiene la serie 
	$registros_temporadas = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = 'temporadas' and post_id = '".$registros[$i]->ID."'  ");
	$cantidadTemporadas = $registros_temporadas[0]->meta_value;
	$cantidadTemporadas = explode(":", $cantidadTemporadas);
	$cantidadTemporadas = $cantidadTemporadas[1]; 
	//ahora buscamos la cantidad de capitulos de todas las temporadas
	$cantidadCap = 0; 
	 for($e=0; $e<$cantidadTemporadas; $e++){
		 $buscarCapitulo = "temporadas_".($e)."_capitulo";
	$registros_capitulos = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = '".$buscarCapitulo."' and post_id = '".$registros[$i]->ID."'  ");
	$cantidadCapitulos = $registros_capitulos[0]->meta_value;
	$cantidadCapitulos = explode(":", $cantidadCapitulos);
	$cantidadCapitulos = $cantidadCapitulos[1]; 
	$cantidadCap = $cantidadCap + $cantidadCapitulos; 
	 }
	
	//ahora a guardar todo en el array 
	
		array_push($arraySerie,array(
		"titulo" => $titulo, "slug" => $slug, "imagen" => $featured_img_url2, "generos" => $ge, 
		"imdb" => $registros_imdb, "sinopsis" => $registros_sinopsis, "year" => $registros_year, 
		"time" => $registros_time, "temporadas" => $cantidadTemporadas, "capitulos" => $cantidadCap, 
		
		));
	 }
	
	
	
	//fin listar todo de serie 
	}elseif($tipo == 'pelicula'){
		//listar todo de pelicula 

			//primero listar los generos de las series 
			$registros_gen = $wpdb->get_results("SELECT vue_terms.name, vue_terms.slug from vue_term_taxonomy, vue_terms where vue_term_taxonomy.term_id = vue_terms.term_id and vue_term_taxonomy.taxonomy = 'genero' order by vue_terms.name asc");
		
			//ahora listar los paises q tienen post 
			$registros_paises = $wpdb->get_results("SELECT DISTINCT vue_postmeta.meta_value FROM `vue_postmeta` WHERE meta_key = 'country'");
			$arrayPaises = array(); 
			//ahora recorro el array de los paises para conseguir el label de acuerdo a lo q venga por el select
			for($i=0; $i<sizeof($registros_paises); $i++){
				$indice = array_search($registros_paises[$i]->meta_value, array_column($paises, 'value'));
		
				array_push($arrayPaises,array("value" => $paises[$indice]["value"], "name" => $paises[$indice]["name"] ));	
			}
			//listamos todo el mollejero
			if($genS == "null" ){
				$args = array(
					'numberposts'	=> -1,
					'post_type'		=> 'movie',
					'meta_query'	=> array(
					'relation'		=> 'AND',
					)
		
					); 
			}else{
		
				$args = array(
					'numberposts'	=> -1,
					'post_type'		=> 'movie',
					'meta_query'	=> array(
					'relation'		=> 'AND',
					), 
					'tax_query' => array(
					   
						),
					); 
		
		
			
					
			}
		
		
		
		
		
		
			//primero vamos por el Order
			if($Order == "null"){
			$args["orderby"] = "none"; 	
			}
			if($Order == 'addMa'){
				$args["orderby"] = "ID"; 
				$args["order"] = "DESC"; 		
			}
			
			if($Order == 'addMe'){
				$args["orderby"] = "ID"; 
				$args["order"] = "ASC"; 
				
				
			}
			
			if($Order == 'imdbMe'){
				//imdb
				if($imdbI == "null" and $imdbE == "null"){
				array_push($args["meta_query"], array(	
				'key'		=> 'imdb_score',
				'value'		=> array( 0,10 ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
				));
				}else{
				array_push($args["meta_query"], array(	
				'key'		=> 'imdb_score',
				'value'		=> array( intval($imdbI),intval($imdbE) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
				));
				}
				
			$args["orderby"] = "meta_value"; 
			$args["order"] = "ASC"; 
		
			}
			
			if($Order == 'imdbMa'){
				//imdb
				if($imdbI == "null" and $imdbE == "null"){
				array_push($args["meta_query"], array(	
				'key'		=> 'imdb_score',
				'value'		=> array( 0,10 ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
				));
				}else{
				array_push($args["meta_query"], array(	
				'key'		=> 'imdb_score',
				'value'		=> array( intval($imdbI),intval($imdbE) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
				));
				}
				
			$args["orderby"] = "meta_value"; 
			$args["order"] = "DESC"; 
		
			}
			
			if($Order == 'yearMe'){
				//años 
				if($yearI == "null" and $yearE == "null"){
					array_push($args["meta_query"], array(	
				'key'		=> 'year',
				'value'		=> array( 2000,2020 ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
					));
				}else{
					array_push($args["meta_query"], array(	
				'key'		=> 'year',
				'value'		=> array( intval($yearI),intval($yearE) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
					));
				}
				
			$args["orderby"] = "meta_value"; 
			$args["order"] = "ASC"; 
			}
			
			
			if($Order == 'yearMa'){
				//años 
				if($yearI == "null" and $yearE == "null"){
					array_push($args["meta_query"], array(	
				'key'		=> 'year',
				'value'		=> array( 2000,2020 ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
					));
				}else{
					array_push($args["meta_query"], array(	
				'key'		=> 'year',
				'value'		=> array( intval($yearI),intval($yearE) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
					));
				}
				
			$args["orderby"] = "meta_value"; 
			$args["order"] = "DESC"; 
		
			}
			
		if($Order != "null" && $Order != "imdbMe" && $Order != "imdbMa") {
			//imdb
				if($imdbI == "null" and $imdbE == "null"){
				array_push($args["meta_query"], array(	
				'key'		=> 'imdb_score',
				'value'		=> array( 0,10 ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
				));
				}else{
				array_push($args["meta_query"], array(	
				'key'		=> 'imdb_score',
				'value'		=> array( intval($imdbI),intval($imdbE) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
				));
				}
		}
		
		if($Order != "null" && $Order != "yearMe" && $Order != "yearMa") {
			//años 
				if($yearI == "null" and $yearE == "null"){
					array_push($args["meta_query"], array(	
				'key'		=> 'year',
				'value'		=> array( 2000,2020 ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
					));
				}else{
					array_push($args["meta_query"], array(	
				'key'		=> 'year',
				'value'		=> array( intval($yearI),intval($yearE) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
					));
				}
		}
		
		if($Order == "null") {
			//años 
			
				if($yearI == "null" and $yearE == "null"){
					array_push($args["meta_query"], array(	
				'key'		=> 'year',
				'value'		=> array( 2000,2020 ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
					));
				}else{
					array_push($args["meta_query"], array(	
				'key'		=> 'year',
				'value'		=> array( intval($yearI),intval($yearE) ),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
					));
				}
		
					//imdb
					if($imdbI == "null" and $imdbE == "null"){
						array_push($args["meta_query"], array(	
						'key'		=> 'imdb_score',
						'value'		=> array( 0,10 ),
						'type'    => 'numeric',
						'compare' => 'BETWEEN',
						));
						}else{
						array_push($args["meta_query"], array(	
						'key'		=> 'imdb_score',
						'value'		=> array( intval($imdbI),intval($imdbE) ),
						'type'    => 'numeric',
						'compare' => 'BETWEEN',
						));
						}
		}
		
		
		//pais 
		if($pais == "null" ){
			array_push($args["meta_query"], array(	
		'key'		=> 'country',
		'value' => '',
		'compare' => 'LIKE'
			));
		}else{
			array_push($args["meta_query"], array(	
		'key'		=> 'country',
		'value' => $pais,
		'compare' => 'LIKE'
			));
		}
		
		
		//genero 
		
		if($genS == "null" ){
			
		}else{
			array_push($args["tax_query"], 
			array(
				'taxonomy' => 'genero',
				'field' => 'slug',
				'terms' => $genS
			)
		);
		}
		
					
		// query
		$the_query = new WP_Query( $args );
		//print_r($the_query); 
		//echo $the_query->found_posts; 
		$contador = $the_query->found_posts; 
		//echo "aqui la 2"; 
		$args["posts_per_page"] = $fin; 
		$args["offset"] = $ini; 
		$the_query = new WP_Query( $args );	
		//print_r($the_query); exit;
				
			//listamos todo el mollejero fin
		
			$totalPaginas = ceil($contador / $xPag); 
			//echo $totalPaginas; 
			//ahora listamos las series 
			$arraySerie = array();
			$registros = $the_query->posts;
			//	print_r($registros[0]->post_title);		exit;
			 for($i=0; $i<sizeof($registros); $i++){
				 //primero el titulo
				 $titulo = $registros[$i]->post_title;  
				 //luego el slug
					$slug = $registros[$i]->post_name; 
				 //luego la imagen poster 
				$registros_thumbnail_id2 = $wpdb->get_results(" select * FROM `vue_postmeta` WHERE meta_key = '_thumbnail_id' and post_id = '".$registros[$i]->ID."'  ");
				$featured_img_url2 = wp_get_attachment_url($registros_thumbnail_id2[0]->meta_value);
				//luego los generos 
				 $ge = array();
			$term_list = wp_get_post_terms( $registros[$i]->ID, 'genero', array( 'fields' => 'names' ) );
			 $generonuevo = ""; 
			 $gene = ""; 
					for($e=0; $e<sizeof($term_list); $e++){
		
							if($e == (count($term_list)-1) ){
								$gene = $term_list[$e]." ";
							}else
							{
								$gene = $term_list[$e].", ";
							}
		
						
						$generonuevo = str_replace(" ", "-",  $term_list[$e]);
						$generonuevo =  eliminar_acentos($generonuevo);
						$generonuevo = get_site_url()."/peliculas/genero"."/".$generonuevo;
						array_push($ge,array("genero" => $gene, "slug" => mb_strtolower($generonuevo, 'UTF-8')  ));
						}
			//ahora el imdb 
			 $registros_imdb = $wpdb->get_results(" select * FROM `vue_postmeta`
			 WHERE meta_key = 'imdb_score' and post_id = '".$registros[$i]->ID."'  ");
			$registros_imdb = $registros_imdb[0]->meta_value;
			
			//luego la sinopsis
			$registros_sinopsis = $wpdb->get_results(" select * FROM `vue_postmeta`
			 WHERE meta_key = 'synopsis' and post_id = '".$registros[$i]->ID."'  ");
			$registros_sinopsis = $registros_sinopsis[0]->meta_value;
			//año
			$registros_year = $wpdb->get_results(" select * FROM `vue_postmeta`
			 WHERE meta_key = 'year' and post_id = '".$registros[$i]->ID."'  ");
			$registros_year = $registros_year[0]->meta_value;
			//time
			$registros_time = $wpdb->get_results(" select * FROM `vue_postmeta`
			 WHERE meta_key = 'time' and post_id = '".$registros[$i]->ID."'  ");
			$registros_time = $registros_time[0]->meta_value;
			
			
			//ahora a guardar todo en el array 
			
				array_push($arraySerie,array(
				"titulo" => $titulo, "slug" => $slug, "imagen" => $featured_img_url2, "generos" => $ge, 
				"imdb" => $registros_imdb, "sinopsis" => $registros_sinopsis, "year" => $registros_year, 
				"time" => $registros_time 
				
				));
			 }
			
			
			
			//fin listar todo de pelicula
			





	}else
	{
	$peliculas = "error conchaetumare";
	}
	
	array_push($peliculas,array("generos" => $registros_gen, "paises" => $arrayPaises, 
	"series" => $arraySerie, "totalPaginas" => $totalPaginas
	
	));	
			   
			   
    return  $peliculas;
}
    
add_action( 'rest_api_init', function () {
    register_rest_route( 'buscador/descubrir', '/post/', array(
        'methods' => 'GET',
        'callback' => 'buscador_descubrir_endpoint'
    ));
});
 ?>