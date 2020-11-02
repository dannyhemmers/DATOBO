<template>
    <span class="text-body">

        <div class="text-h4 text-center">
            PDF Merger
        </div>
        
        <v-row align-content="center" justify="center">
        <v-col
          cols="12"
          sm="6"
          md="9"
          lg="6"
          xl="4"
        >
            <p class="text-h5 text-center">Upload PDF Files here</p>
            <vue-dropzone 
              @vdropzone-complete-multiple="complete"
              ref="myVueDropzone" 
              id="dropzone" 
              :options="dropzoneOptions"></vue-dropzone>
                        
              <v-btn 
                :loading="isloading" 
                large 
                color="yellow" 
                light
                @click="loader = isloading; getColors()" 
                class="mt-3"
                elevation="17"    
                width="100%"
            >
                Submit
            </v-btn>

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
  background-color: #29313f;
  border: 4px solid #4A5568;
  color: white;
}
</style>