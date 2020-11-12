<template>
    <div class="text-body">
        
        <v-row align-content="center" justify="center">
        <v-col
          cols="12"
          sm="12"
          md="12"
          lg="12"
          xl="12"
        >
            <v-card v-if="paste" elevation="18" rounded class="ma-0 pa-6">
              <div class="text-caption" style="display: inline;">
                {{ $t("uploaded_by")}} <p style="display: inline" v-if="paste.user">{{paste.user.name}}</p> <p style="display: inline" v-else>{{ $t("guest") }}</p>
                <br>
                {{ $t("language") }} : {{ paste.language }}
                <br>
                {{ $t("date") }} : {{ paste.created_at }}
              </div>
              <vue-code-highlight class="mt-10" :language="paste.language"><pre>{{paste.content}}</pre></vue-code-highlight>
            </v-card>
        </v-col>
        </v-row>

    </div>
</template>

<script>
import Form from 'vform'
import { component as VueCodeHighlight } from 'vue-code-highlight'
import 'prism-es6/components/prism-markup-templating'
import 'prism-es6/components/prism-php'
import 'prism-es6/components/prism-csharp'
import 'prism-es6/components/prism-java'
import 'vue-code-highlight/themes/prism-tomorrow.css'

export default {
  metaInfo() {
    return { title: 'Paste'};
  },
    data(){
        return{
          paste: null,
          uid: '',
          errors: ''
        }
    },
    watch: {
      loader () {
        const l = this.loader
        this[l] = !this[l]
      },
    },

    components: {
      VueCodeHighlight
    },

    mounted () {
      this.uid = this.$route.params.uid
      this.getPaste()
    },

    methods: {
      getPaste(){
          axios.get('/api/getpaste/' + this.uid).then(res => {
            this.paste = res.data
        })
      }

  }
}
</script>

<style scoped>
>>>.v-card__actions{
    padding-top: 0px;
}

>>>pre{
  background: none!important;
}
</style>