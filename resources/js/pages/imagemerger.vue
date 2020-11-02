<template>
    <span class="text-body">
        <div class="text-h4 text-center">
            Image Gallery Merger
        </div>
        
        <v-row align-content="center" justify="center">
        <v-col
          cols="12"
          sm="6"
          md="9"
          lg="6"
          xl="3"
        >
            <p class="text-h5">Enter URL to imgur / twitter Image Gallery</p>
            <v-text-field 
                outlined
                placeholder="Instagram / Youtube URL"    
            >

            </v-text-field>
            <v-btn 
                :loading="isloading" 
                large 
                color="yellow" 
                light
                @click="loader = isloading; postGallery()" 
                class=""
                elevation="17"    
                width="100%"
            >
                Download
                <v-icon>mdi-download</v-icon>
            </v-btn>
        </v-col>
        </v-row>
    </span>
</template>

<script>
export default {
  metaInfo() {
    return { title: 'Image Merger'};
  },
    data(){
        return{
            url: ''
        }
    },

    components: {

    },

    methods: {
    postURL(){
      let formData = new FormData()
      formData.append('url', this.url)
      axios.post('/api/posturl', formData).then(response => {
        this.url = ""
      });
    }
  }
}
</script>