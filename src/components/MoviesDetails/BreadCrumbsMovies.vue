<template>
    <div>
        <div class="ui grid">
        <div class="left floated left aligned nine wide column pb-0">
            <div class="series-genres pb-0">
                <div xmlns:v="http://rdf.data-vocabulary.org/#" class="Breadcrumb">
                    <span typeof="v:Breadcrumb">
                        películas
                    </span> &gt; <span typeof="v:Breadcrumb">
                    {{movieTitle}}</span>
                </div>
            </div>
        </div>
        <div class="right floated right aligned six wide column pb-0">
            <div class="media-date">
                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.99 2c-5.52 0-9.99 4.48-9.99 10s4.47 10 9.99 10c5.53 0 10.01-4.48 10.01-10s-4.48-10-10.01-10zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z">
                    </path>
                    <path d="M12.5 7h-1.5v6l5.25 3.15.75-1.23-4.5-2.67z"></path>
                </svg>
                <span>{{fechaCreated}}</span>
            </div>
        </div>
    </div>
    <div class="ui grid">
        <div class="left floated sixteen wide tablet eight wide computer column">
            <a href="https://yabancidizi.vip/film/kill-chain" data-navigo="">
                <h1 class="page-title">{{movieTitle}}</h1>
            </a>
        </div>
        <div class="right aligned floated sixteen wide tablet eight wide computer column"
            id="series-action-buttons">
            <div class="button-group">
                <button class="ui secondary scrolling button dropdown top right pointing" data-addcollections="3422"
                    tabindex="0">
                    <span>Agregar a Mi Colección</span>
                </button>
                <button class="ui secondary button fnc_addFollow" data-status="2" data-series="3422">Seguir </button>
            </div>
        </div>
    </div>
        
        </div>
</template>


<script>
import {mapState} from 'vuex'

export default {
  name: 'BreadCrumbsMovies',
    props: {
        movieTitle:{
            type: String, 
            required: true,
        },
        fechaCreated:{
            type: String,
            required: true
        }
    },
    data (){
        return {
          BreadCrumbsMovies: [],
    
        }
    },
    methods: {
       
    },
}
</script>