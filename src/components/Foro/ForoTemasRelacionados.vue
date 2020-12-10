<template>
  <div class="generic-box story-box">
    <h3 class="section-heading">Temas Relacionados</h3>
    <div class="story-list-items mb-lg">
      
      <ul>
        <li class="story-list-item" style="padding:10px" v-for="(movie, index) in arrayRelacionados" :key="index">
        
          
          <h4 class="title-tertiary truncate mt-0 mb-0">
            <router-link @click.native="$store.commit('scrollToTop')" 
	:to="{name:'ForoVerTema', params: {foro_slug: movie.slugForo, tema_slug: movie.slug+'.'+movie.id} }">
            <font style="vertical-align: inherit"
                ><font style="vertical-align: inherit; font-size:14px"  >{{movie.titulo}}</font></font
              ></router-link
            >
          </h4>
          <p class="description-quaternary mb-0 truncate">
            <font style="vertical-align: inherit"> {{movie.contenido}} </font>
          </p>
          <p class="description-quaternary mb-0">
            <font style="vertical-align: inherit"
              ><font style="vertical-align: inherit">
                {{movie.cantidadReply}} comentarios · Publicado {{movie.fecha}} </font
              ><font style="vertical-align: inherit">por </font></font
            ><a href="/perfil/nana" class="item"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">{{movie.autor}}</font></font
              ></a
            ><font style="vertical-align: inherit"
              ><font style="vertical-align: inherit">.</font></font
            >
          </p>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";
export default {
  name: "ForoTemasRelacionados",
  props: ["id_tema"],
  data() {
    return {
      arrayRelacionados: [],
    };
  },
  computed: {
    ...mapState(["urlProcesos", "skeleton"]),
  },

  methods: {
    async getTemasRelacionados() {
      await fetch(
        this.urlProcesos +
          "wp-json/foro/all/?q=getTemasRelacionados&id_tema=" +
          this.id_tema
      )
        .then((r) => r.json())
        .then((res) => {
          //console.log(res);
          this.arrayRelacionados = res;
        });
    },
  },
  components: {},
  mounted() {
    console.log(this.id_tema);
    this.getTemasRelacionados();
  },
};
</script>
