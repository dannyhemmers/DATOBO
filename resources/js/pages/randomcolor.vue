<template>
    <div class="text-body">
        
        <div class="text-h4 text-center">
            Random Color
        </div>
        
        <div class="text-center">
            <p class="text-h5">Generate Random Color Codes</p>
            <v-btn 
                :loading="isloading" 
                large 
                color="blue-grey darken-3" 
                @click="loader = isloading; getColors()" 
                class="mx-auto"
                elevation="17"    
            >
                    Generate
            </v-btn>
        </div>

        <v-fade-transition>
            <div v-if="!isloading" class="mt-5">
            <v-container>
            <v-row>
                <v-col
                    v-for="(color, index) in randomcolors"
                    :key="`color-${index}`" 
                    cols="12"
                    sm="4"
                >
                    <v-card
                    class="pa-2"
                    rounded
                    >
                    <v-card-actions class="mt-2 text-caption">
                        Color
                        <v-spacer></v-spacer>
                        Complementary Color
                    </v-card-actions>                    
                    <v-card-actions class="mt-2 mb-0 text-overline">
                        {{color.hex.toUpperCase()}}
                        <v-spacer></v-spacer>
                        {{color.hexcomp.toUpperCase()}}
                    </v-card-actions>
                    <v-row class="mx-0 mt-0">
                    <v-col
                        cols="6"
                        sm="6"
                        class="mt-0"
                    >
                        <v-sheet 
                            :color="color.hex"
                            v-ripple
                            height="70"
                            rounded
                            elevation="6"
                        >
                        
                        </v-sheet>
                    </v-col>
                    <v-col
                        cols="6"
                        sm="6"
                    >
                        <v-sheet 
                            :color="color.hexcomp"
                            v-ripple
                            height="70"
                            rounded
                            elevation="6"
                        >
                        
                        </v-sheet>
                    </v-col>
                    </v-row>
                    </v-card>
                    </v-col>
            </v-row>
            </v-container>
            </div>
        </v-fade-transition>

    </div>
</template>

<script>

export default {
  metaInfo() {
    return { title: 'Random Color'};
  },
    data(){
        return{
            randomcolors: [],
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
    getColors(){
        this.isloading = true
        axios.get('/api/getcolors').then(response => {
          this.randomcolors = response.data
          this.isloading = false
          this.loader = null
          console.log(this.randomcolors)
        });
    }
  }
}
</script>

<style scoped>

>>>.v-card__actions{
    padding-top: 0px;
}
</style>