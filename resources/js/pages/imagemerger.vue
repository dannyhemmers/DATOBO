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
              Instagram Gallery Merger
              <br>
              <v-icon x-large>mdi-instagram</v-icon>
            </div>
            <p class="text-h6 mt-10 text-center">{{ $t("enter_instagram_url") }}</p>
  
            <form class="mt-4" @submit.prevent="postURL" @keydown="form.onKeydown($event)">
              <v-text-field 
                  outlined
                  solo
                  placeholder="Instagram Post URL"    
                  prepend-inner-icon="mdi-link"
                  v-model="form.url"
              >

              </v-text-field>
              <v-btn 
                  :loading="isloading" 
                  large 
                  type="submit"
                  class=""
                  elevation="10"    
                  width="100%">
                    {{ $t("submit") }}
              </v-btn>      
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

        <v-fade-transition>
            <div v-if="!isloading && result" class="mt-2">
           
            <v-row align-content="center" justify="center">
                <v-col
                cols="12"
                sm="6"
                md="9"
                lg="6"
                xl="6"
                >
                    <v-card
                    class="pa-4 text-center"
                    rounded
                    >          
                      <img height="300px" :src="'/merged/' + result.filename"/>
                      <br>
                        <v-btn @click="downloadFile" large class="mt-3">
                          {{ $t('download') }}
                        <v-icon>mdi-download</v-icon>
                      </v-btn>
                    </v-card>
                    </v-col>
            </v-row>
            </div>
        </v-fade-transition>

    </div>
</template>

<script>
import Form from 'vform'
import { saveAs } from 'file-saver'

export default {
  metaInfo() {
    return { title: 'Image Merger'};
  },
    data(){
        return{
            form: new Form({
              url: ''
            }),

            result: null,
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

    },

    methods: {
    postURL(){
        this.isloading = true
        this.form.post('/api/postgallery/')
        .then(({ data }) => { 
          this.result = data
          this.isloading = false
        })
        .catch(error => {
          this.errors = error
          this.isloading = false
        });
        this.form.url = '' 
    },
    downloadFile(){
      var FileSaver = require('file-saver');
      FileSaver.saveAs("/merged/" + this.result.filename);
    }
  }
}
</script>