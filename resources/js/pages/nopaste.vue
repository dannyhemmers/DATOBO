<template>
    <div class="text-body">
        
        <v-row align-content="center" justify="center">
        <v-col
          cols="12"
          sm="6"
          md="9"
          lg="6"
          xl="6"
        >
            <v-card elevation="18" rounded class="ma-0 pa-6">
            <div class="text-h4 text-center">
              NoPaste
              <br>
              <v-icon x-large>mdi-content-paste</v-icon>
            </div>
            <p class="text-h6 mt-10 text-center">{{ $t("enter_snippet") }}</p>
  
            <form class="mt-4" @submit.prevent="postURL" @keydown="form.onKeydown($event)">
              <v-textarea 
                  outlined
                  solo
                  rows="15"    
                  v-model="form.paste"
              >

              </v-textarea>
              <v-row align-content="center" justify="center">
              <v-select
                :items="['text', 'csharp', 'java', 'javascript', 'php']"
                outlined
                v-model="form.language"
                :label="$t('language')"
        >     </v-select>   
              <v-btn 
                  :loading="isloading" 
                  type="submit"
                  x-large
                  class="py-1 ml-2"
                  elevation="10">
                    {{ $t("submit") }}
              </v-btn>   
              </v-row>
        </form>
        </v-card>
        </v-col>
        </v-row>
        
          <p v-if="isloading" class="text-h6 mt-5 text-center">{{ $t('please_wait') }}</p>


        <v-fade-transition>
            <div v-if="errors" class="mt-2">
           
            <v-row align-content="center" justify="center">
                <v-col
                cols="12"
                sm="6"
                md="9"
                lg="6"
                xl="6"
                >
                    <v-card
                    class="pa-2"
                    rounded
                    >          
                      {{errors}}
                    </v-card>
                    </v-col>
            </v-row>
            </div>
        </v-fade-transition>

    </div>
</template>

<script>
import Form from 'vform'
import { component as VueCodeHighlight } from 'vue-code-highlight'
import 'prism-es6/components/prism-markup-templating'
import 'vue-code-highlight/themes/prism-tomorrow.css'

export default {
  metaInfo() {
    return { title: 'NoPaste'};
  },
    data(){
        return{
            form: new Form({
              paste: '',
              language: 'text'
            }),

            pasteid: null,
            isloading: false,
            loader: null,
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

    methods: {
    postURL(){
        this.isloading = true
        this.form.post('/api/postpaste/')
        .then(({ data }) => { 
          this.pasteid = data
          this.isloading = false

          this.$router.push({ name: 'displaypaste', params: { uid: this.pasteid.paste.uniqueId } })
        })
        .catch(error => {
          this.errors = error
          this.isloading = false
        });
        this.form.snippet = '' 
    }
  }
}
</script>

<style scoped>
>>>.v-card__actions{
    padding-top: 0px;
}
</style>