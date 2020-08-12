<template>
  <div>

    <div class="flex flex-wrap mx-auto overflow-hidden">
     
     <router-link class="w-full md:w-1/2 lg:w-1/2 bg-red-700 hover:bg-red-600 p-4 text-center rounded-lg" :to="{ name: 'imagemerger'}"> 
          <h4 class="text-3xl text-gray-200 leading-tight">
            Image Merger
          </h4>
          <p class="text-base text-gray-500 leading-normal">Vereine mehrere Bilder zu einer Bildatei</p>
      </router-link>

      <router-link class="w-full md:w-1/2 lg:w-1/2 bg-red-700 hover:bg-red-600 p-4 text-center rounded-lg" :to="{ name: 'randomcolor'}">
        <h4 class="text-3xl text-gray-200 leading-tight">
          Random Color Generator
        </h4>
        <p class="text-base text-gray-500 leading-normal">Generiere eine Zufallsfarbe und dessen passende Komplementärfarbe</p>
      </router-link>
      
    </div>
    
  </div>
</template>

<script>

export default {
  metaInfo() {
    return { title: this.$t("home") };
  },
  components: {
    
  },
  data() {
    return {
      websocketWorks: false
    };
  },
}
</script>