<template>
    <span class="text-body">
        <div class="font-mono text-5xl font-bold text-center">
            Random Color
        </div>
        <div class="mx-auto shadow-xl rounded w-full md:w-2/4 p-6 mt-8 my-2">
            <h3 class="text-grey-dark text-sm font-medium font-sans leading-normal">Generiere zufällige Farbcodes</h3>
            <p class="my-3 text-grey font-light tracking-wide font-sans leading-normal text-sm"></p>
            <button @click="getColors" class="bg-red-600 hover:bg-red-500 px-3 py-2 rounded w-full focus:outline-none mt-4">Generieren</button>
        </div>
        <div v-if="!isloading" class="flex flex-wrap -mx-2">
            <div v-for="(color, index) in randomcolors" 
                :key="`color-${index}`" 
                :style="{backgroundColor: color.hex}" 
                class="overflow-hidden sm:my-1 sm:px-1 sm:w-1/4 lg:my-3 lg:px-3 lg:w-1/4 mx-2 xl:w-1/4 rounded">
                    {{color.hex.toUpperCase()}}
            </div>
        </div>
        <div v-else class="mx-auto text-center">
            <looping-rhombuses-spinner
                :animation-duration="2500"
                :rhombus-size="15"
                color="#ff1d5e"
                class="mx-auto pt-5 pb-5" 
            />
        </div>
    </span>
</template>

<script>
import { LoopingRhombusesSpinner } from 'epic-spinners'

export default {

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