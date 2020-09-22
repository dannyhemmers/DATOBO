<template>
    <span class="text-body">
        <div class="font-mono text-5xl font-bold text-center">
            PDF Merger
        </div>
        <div class="mx-auto shadow-xl rounded to w-full md:w-2/4 p-6 mt-8 my-2">
            <h3 class="text-grey-dark text-sm font-medium font-sans leading-normal">PDF Dateien hier hochladen (Max. 10 Dateien)</h3>
            <p class="my-3 text-grey font-light tracking-wide font-sans leading-normal text-sm"></p>
            <vue-dropzone 
              @vdropzone-complete-multiple="complete"
              ref="myVueDropzone" 
              id="dropzone" 
              :options="dropzoneOptions"></vue-dropzone>
            <button @click="postPDFs" class="bg-red-600 hover:bg-red-500 px-3 py-2 rounded w-full focus:outline-none mt-4">Abschicken</button>
        </div>
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