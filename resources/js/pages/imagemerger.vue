<template>
    <span class="text-body">
        <div class="font-mono text-5xl font-bold text-center">
            Image Merger
        </div>
        <div class="mx-auto shadow-xl rounded to w-full md:w-2/4 p-6 mt-8 my-2">
            <div class="flex justify-between items-center">
                <h4 class="uppercase text-grey text-xs text-wide tracking-wide font-thin ">URL Eingeben</h4>
            </div>
            <h3 class="text-grey-dark text-sm font-medium font-sans leading-normal">Gib eine URL zu imgur oder Twitter ein!</h3>
            <p class="my-3 text-grey font-light tracking-wide font-sans leading-normal text-sm"></p>
    
            <input type="text" v-model="url" class="text-gray-700 w-full rounded px-3 py-2" placeholder="imgur / Twitter URL"/>
            <button @click="postURL" class="bg-red-600 hover:bg-red-500 px-3 py-2 rounded w-full focus:outline-none mt-4">Abschicken</button>
        </div>
    </span>
</template>

<script>
export default {

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