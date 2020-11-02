<template>
    <div class="text-body">
        
        <div class="text-h4 text-center">
            Instagram / Youtube Video Downloader
        </div>
        
        <v-row align-content="center" justify="center">
        <v-col
          cols="12"
          sm="6"
          md="9"
          lg="6"
          xl="3"
        >
            <p class="text-h5">Enter Instagram Youtube URL</p>
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
                @click="loader = isloading; getColors()" 
                class=""
                elevation="17"    
                width="100%"
            >
                Download
                <v-icon>mdi-download</v-icon>
            </v-btn>
        </v-col>
        </v-row>

        <v-fade-transition>
            <div v-if="!isloading && videoinfo.length > 0" class="mt-5">
           
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

                    </v-card>
                    </v-col>
            </v-row>
            </div>
        </v-fade-transition>

    </div>
</template>

<script>
import Form from 'vform'

export default {
  metaInfo() {
    return { title: 'Random Color'};
  },
    data(){
        return{
            form: new Form({
              url: ''
            }),

            videoinfo: [],
            isloading: false,
            loader: null
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
        this.form.post('/api/postvideourl/')
        .then(({ data }) => { 
          console.log(data)
          this.form.url = '' 
          this.isloading = false
        })
    }
  }
}
</script>

<style scoped>
>>>.v-card__actions{
    padding-top: 0px;
}
</style>