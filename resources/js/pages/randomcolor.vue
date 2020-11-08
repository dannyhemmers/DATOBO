<template>
    <div class="text-body">
        
        <v-row align-content="center" justify="center">
        <v-col
          cols="12"
          sm="6"
          md="9"
          lg="6"
          xl="4"
        >
            <v-card elevation="18" rounded class="ma-0 pa-6">
            <div class="text-h4 text-center">
                {{ $t("random_color") }}
            </div>

                <div class="text-center">
                <p class="text-h5">{{ $t("color_description") }}</p>
                <v-btn 
                    :loading="isloading" 
                    large 
                    @click="loader = isloading; getColors()" 
                    class="mx-auto"
                    elevation="17">
                    {{ $t("generate") }}
                </v-btn>
                </div>
            </v-card>

        </v-col>
        </v-row>

        


        <v-fade-transition>
            <div v-if="!isloading" class="mt-0">
            <v-container>
            <v-row dense> 
                <v-col
                    v-for="(color, index) in randomcolors"
                    :key="`color-${index}`" 
                    cols="12"
                    sm="4"
                    dense
                >
                    <v-card
                    class="px-2 py-1"
                    rounded
                    >
                    <v-card-actions class="mt-2 text-caption">
                        {{ $t("color") }}
                        <v-spacer></v-spacer>
                        {{ $t("complementary_color") }}
                    </v-card-actions>                    
                    <v-card-actions class="mt-2 mx-1 mb-0 text-overline">
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