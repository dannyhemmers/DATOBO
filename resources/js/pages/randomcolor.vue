<template>
    <div class="text-body">
        
        <div class="font-mono text-5xl font-bold text-center">
            Random Color
        </div>
        
        <div class="mx-auto shadow-xl items-center justify-center rounded bg-gray-800 w-full md:w-2/4 p-6">
            <h3 class="text-grey-dark text-sm font-medium font-sans">Generiere zufällige Farbcodes</h3>
            <div class="flex flex-wrap">
            <button @click="getColors" class="w-3/4 bg-red-600 hover:bg-red-500 py-2 rounded focus:outline-none">Generieren</button>
                
                    <select class="w-1/4 text-gray-100 bg-gray-700 hover:bg-gray-600 py-2 pr-2 rounded shadow focus:outline-none focus:shadow-outline">
                        <option>1</option>
                        <option>2</option>
                        <option>4</option>
                        <option selected="selected">8</option>
                        <option>16</option>
                    </select>
                
            </div>
        </div>
        
        <div v-if="!isloading" class="flex flex-wrap items-center justify-center mt-6">
            <div v-for="(color, index) in randomcolors" 
                :key="`color-${index}`" 
                :style="{backgroundColor: color.hex}" 
                class="overflow-hidden w-full sm:w-full md:w-1/2 p-2 lg:w-1/3 xl:w-1/4 rounded">
                    <p class="font-medium" :style="{color: color.hexcomp}">{{color.hex.toUpperCase()}}</p>
            </div>
        </div>
        
        <div v-else class="mx-auto text-center mt-6">
            <looping-rhombuses-spinner
                :animation-duration="2500"
                :rhombus-size="15"
                color="#ff1d5e"
                class="mx-auto pt-5 pb-5" 
            />
        </div>

    </div>
</template>

<script>
import { LoopingRhombusesSpinner } from 'epic-spinners'

export default {
  metaInfo() {
    return { title: 'Random Color'};
  },
    data(){
        return{
            randomcolors: [],
            isloading: false
        }
    },

    components: {
        LoopingRhombusesSpinner
    },

    methods: {
    getColors(){
        this.isloading = true
        axios.get('/api/getcolors').then(response => {
          this.randomcolors = response.data
          this.isloading = false
        });
    }
  }
}
</script>

<style scoped>
.flex-wrap > div {
 border: 0.2em transparent solid;
  background-clip: padding-box;
  border-radius: 0.45rem;
}
</style>