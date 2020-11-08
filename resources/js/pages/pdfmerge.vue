<template>
    <span class="text-body">

        <v-row align-content="center" justify="center">
        <v-col
          cols="12"
          sm="6"
          md="9"
          lg="6"
          xl="6"
        >

        <v-card elevation="18" color="red darken-3" class="my-6 pa-4 text-h5 text-center">
            NOT WORKING FOR NOW - DO NOT TRY!
        </v-card>

            <v-card elevation="18" rounded class="ma-0 pa-6">
            <div class="text-h4 text-center">
              PDF Tools
              <br>
              <v-icon x-large>mdi-file-pdf</v-icon>
            </div>
            <p class="text-h5 text-center">{{ $t('upload_pdf_files_here') }}</p>

            <vue-dropzone 
              @vdropzone-complete-multiple="complete"
              ref="myVueDropzone" 
              id="dropzone" 
              :options="dropzoneOptions"></vue-dropzone>
                        
              <v-btn 
                  :loading="isloading" 
                  large 
                  type="submit"
                  class="mt-3"
                  elevation="10"    
                  width="100%"
                  @click="postPDFs">
                    {{ $t("submit") }}
              </v-btn>  
            </v-card>
        </v-col>
        </v-row>
            
    </span>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
  metaInfo() {
    return { title: 'PDF Merger'};
  },
    data(){
        return{
                isloading: false,
                loader: null,
                errors: '',
              dropzoneOptions: {
              url: '/api/uploadpdf',
              paramName: 'pdfs',
              uploadMultiple: true,
              createImageThumbnails: false,
              maxFilesize: 10,
              parallelUploads: 10,
              autoProcessQueue: false,
            }
        }
    },

    components: {
      vueDropzone: vue2Dropzone
    },

    methods: {
    postPDFs(){
      this.isloading = true
      this.$refs.myVueDropzone.processQueue()
    },

    complete(response){
      console.log(response)
    }
  }
}
</script>

<style scoped>
>>>.vue-dropzone{
  background-color: #1e1e1e;
  border: 2px solid #3d3d3d;
  border-radius: 4px;
  color: white;
}

>>>.dz-message{
  color: grey;
}
</style>