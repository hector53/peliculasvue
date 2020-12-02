<template>
  <div class="sixteen wide tablet eleven wide computer column">
    <h4 class="sidebar-heading">
      <font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">Comentarios ( </font></font
      ><span id="review-count"
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">{{cantComments}}</font></font
        ></span
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"> )</font></font
      >
    </h4>

    <section class="user-reviews">
      <div class="ui list" id="review-form">
        <div class="item">
          <form class="review-form">
            <div class="ui form">
              <div class="field">
                <div class="emojionearea">
                  <VueEmoji
                    :width="'100%'"
                    ref="emoji"
                    @input="onInput"
                    :class="'test'"
                  />
                </div>
              </div>
            </div>
            <div class="ui grid">
              <div
                class="right floated right aligned sixteen wide tablet four wide computer column"
              >
                <button
                  class="ui primary button fnc_addComment"
                  @click="addComment()"
                  :class="{ loadingComment: loadingComment }"
                  style="float: inherit"
                  type="button"
                >
                  <font style="vertical-align: inherit">
                    <font style="vertical-align: inherit"
                      >Agregar comentario</font
                    >
                  </font>
                </button>
              </div>
            </div>
          </form>
          <!-- // .review-form -->
        </div>
        <!-- // .item -->
      </div>
      <div class="ui list" id="review-list">
        <div
          class="item comment-item"
          v-for="(item, index) in arrayComentarios"
          :key="index"
        >
          <img class="ui avatar image" :src="item.imagen_perfil" alt="" />
          <div class="content">
            <h6>
              <a
                href="profil/hectoracosta53"
                class="review-author"
                title="@hectoracosta53 Profilini Görüntüle"
                >@{{ item.username }}</a
              >
            </h6>
            <div class="review-time">{{item.fecha}}</div>
            <div class="review-content">
              <p>{{ item.contenido }}</p>
            </div>

            <div class="review-extras">
              <div class="flex-row buttons">
                <button
                  class="ui button fnc_addFeel"
                  onlyusers=""
                  data-id="3678"
                  data-type="1"
                  data-status="2"
                  data-comment="720036"
                >
                  <svg class="mofycon">
                    <use xlink:href="#icon-thumbs-up"></use>
                  </svg>
                  <span>1</span>
                </button>
                <button
                  class="ui button fnc_addFeel"
                  onlyusers=""
                  data-id="3678"
                  data-type="2"
                  data-status="2"
                  data-comment="720036"
                >
                  <svg class="mofycon">
                    <use xlink:href="#icon-thumbs-down"></use>
                  </svg>
                  <span>0</span>
                </button>
                <a
                  href="#"
                  class="reply-link"
                  onlyusers=""
                  data-comment="720036"
                  @click.prevent="activarReply(item.id)"
                  >Responder (<span>{{item.subs}}</span>)</a
                >
              </div>
              <div class="flex-row" >
                <form
                  class="review-reply"
                  data-ctype="2"
                  data-episode=""
                  data-forum=""
                  data-series="3678"
                  data-comment="720036"
                  style="display: none"
                  :id="'reply_'+item.id"
                >
                  <input
                    type="text"
                    placeholder="Respuesta Aquí"
                    class="replyCommentData"
                    style="width: 100%"
                    :id="'replyText_'+item.id"
                  />
                  <button
                    class="ui secondary button fnc_commentReply"
                    type="submit"
                    @click.prevent="responderComment(item.id)"
                    :id="'buttonReply_'+item.id"
                  >
                    Responder
                  </button>
                </form>
              </div>
              <div class="ui list sub-reviews" v-show="item.subs > 0">
                <div class="item comment-item" v-for="(subitem, index2) in item.subcomentarios" :key="index2">
                  <img
                    class="ui avatar image"
                    :src="subitem.imagen_perfil"
                    
                  />
                  <div class="content">
                    <h6>
                      <a href="profil/mafia" class="review-author" title=""
                        >{{subitem.username}}</a
                      >
                    </h6>
                    <div class="review-time">{{subitem.fecha}}</div>
                    <div class="review-content">
                      <p>{{subitem.contenido}}</p>
                    </div>
                    <div class="review-extras">
                      <div class="flex-row buttons">
                        <button
                          class="ui button fnc_addFeel"
                          data-id="3678"
                          data-type="1"
                          data-status="2"
                          data-comment="720136"
                        >
                          <svg class="mofycon">
                            <use xlink:href="#icon-thumbs-up"></use>
                          </svg>
                          <span>1</span>
                        </button>
                        <button
                          class="ui button fnc_addFeel"
                          data-id="3678"
                          data-type="2"
                          data-status="2"
                          data-comment="720136"
                        >
                          <svg class="mofycon">
                            <use xlink:href="#icon-thumbs-down"></use>
                          </svg>
                          <span>0</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="review-more-menu">
                    <div
                      class="ui icon dropdown top right pointing dropdown"
                      tabindex="0"
                    >
                      <svg class="mofycon dropdown top right pointing dropdown">
                        <use xlink:href="#icon-arrow-down"></use>
                      </svg>
                      <div class="menu" tabindex="-1"></div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="review-more-menu">
              <div
                class="ui icon dropdown top right pointing dropdown"
                tabindex="0"
              >
                <svg class="mofycon dropdown top right pointing dropdown">
                  <use xlink:href="#icon-arrow-down"></use>
                </svg>
                <div class="menu" tabindex="-1">
                  <div class="item" data-delete="720780" data-type="2">
                    Yorumu Sil
                  </div>
                  <div class="item" data-spoiler="720780" data-type="2">
                    Spoiler Yap
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- // .list -->
    </section>
    <!-- // .user-reviews -->
  </div>
</template>


<script>
import VueEmoji from "emoji-vue";
import ClickOutside from "vue-click-outside";
import { mapState } from "vuex";

export default {
  name: "ComentariosFlix",
  props: {
    post_id: {
      type: String,
      required: true,
    },
    id_user: {
      type: String,
      required: true,
    },
    userName: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      loadingComment: false,
      arrayComentarios: [],
      textoComentario: "",
      cantComments: 0
    };
  },
  computed: {
    ...mapState(["urlProcesos"]),
  },
  methods: {
      responderComment(id){
        var textoReply = document.getElementById("replyText_"+id).value
        console.log(textoReply)
         document.getElementById("buttonReply_"+id).style.opacity = "0.2";
        this.addCommentReply(id, textoReply)
      },
      activarReply(id){
     const editor = this.$el.querySelector("#reply_"+id);
      editor.style.display = "block";
      }, 
    enterClicked() {
      console.log("presiono enter");
    },
    async addCommentReply(id, contenido){
 var textoReply = document.getElementById("replyText_"+id)
 await fetch(
          this.urlProcesos +
            "wp-json/comentarios/add/post/?q=addR&id_post=" +
            this.post_id +
            "&id_user=" +
            this.id_user +
            "&username=" +
            this.userName +
            "&content=" +
            contenido+
            "&id_comment="+id
        )
          .then((r) => r.json())
          .then((res) => {
              
            console.log(res);
            textoReply.value = ''
            this.getCommentsPost();
                 document.getElementById("buttonReply_"+id).style.opacity = "1";
          });
     
    },




    async addComment() {
      console.log(this.$refs.emoji);
      this.loadingComment = true;
      const editor = this.$el.querySelector(".emoji-wysiwyg-editor");
      editor.style.backgroundColor = "#42454f";

      if (this.textoComentario.length > 0) {
        console.log("mayor q ce4o");
        await fetch(
          this.urlProcesos +
            "wp-json/comentarios/add/post/?q=add&id_post=" +
            this.post_id +
            "&id_user=" +
            this.id_user +
            "&username=" +
            this.userName +
            "&content=" +
            this.textoComentario
        )
          .then((r) => r.json())
          .then((res) => {
            console.log(res);
            this.$refs.emoji.clear();
            this.loadingComment = false;
            editor.style.backgroundColor = "#111215";
            this.getCommentsPost();
          });
      }
    },
    onInput(event) {
      //event.data contains the value of the textarea
      this.textoComentario = event.data;
    },
    async getCommentsPost() {
      console.log(
        this.urlProcesos +
          "wp-json/comentarios/add/post/?q=get&id_post=" +
          this.post_id
      );
      await fetch(
        this.urlProcesos +
          "wp-json/comentarios/add/post/?q=get&id_post=" +
          this.post_id
      )
        .then((r) => r.json())
        .then((res) => {
          console.log(res);
          this.arrayComentarios = res[0].comentarios;
          this.cantComments = res[0].cantidad
        });
    },
  },
  mounted() {
    this.getCommentsPost();
  },
  components: {
    VueEmoji,
  },
  directives: {
    ClickOutside,
  },
};
</script>
<style >
.loadingComment {
  opacity: 0.2;
}
</style>