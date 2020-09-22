<template>
<div>

  <p class="text-body text-center text-6xl font-mono mb-0">DATOBO</p>
  <p class="text-center text-xl text-gray-500  mt-0">Danny's ToolBox</p>
  <div class="p-24 flex flex-wrap items-center justify-center">
      


  <div class="container flex mx-auto w-full items-center justify-center">
 
   <ul class="flex flex-col">
     <router-link :to="{ name: 'imagemerger'}">
        <li class="border-gray-400 flex flex-row mb-2">
          <div class="select-none cursor-pointer bg-gray-700 rounded-md flex flex-1 items-center px-24 py-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex-1 text-center">
              <div class="text-xl	font-medium text-gray-100">Image Merger</div>
              <div class="text-gray-300 text-sm">Merge multiple Images into 1</div>
            </div>
          </div>
        </li>
     </router-link>
     <router-link :to="{ name: 'randomcolor'}">
        <li class="border-gray-400 flex flex-row mb-2">
          <div class="select-none cursor-pointer bg-gray-700 rounded-md flex flex-1 items-center px-24 py-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex-1 text-center">
              <div class="text-xl font-medium text-gray-100">Random Color Generator</div>
              <div class="text-gray-300 text-sm">Generate Random Colors</div>
            </div>
          </div>
        </li>
     </router-link>
     <router-link :to="{ name: 'pdfmerge'}">
        <li class="border-gray-400 flex flex-row mb-2">
          <div class="select-none cursor-pointer bg-gray-700 rounded-md flex flex-1 items-center px-24 py-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex-1 text-center">
              <div class="text-xl font-medium text-gray-100">PDF Merger</div>
              <div class="text-gray-300 text-sm">Merge multiple PDFs into one</div>
            </div>
          </div>
        </li>
     </router-link>
    </ul>
    
  </div>
<!--       
      <router-link :to="{ name: 'imagemerger'}">
        <div class="flex-shrink-0 m-6 relative overflow-hidden bg-teal-500 rounded-lg shadow-lg">
          <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
          </svg>

          <div class="text-white text-center px-6 pb-6 mt-6">
            <span class="font-semibold text-xl">Image Merger</span>
          </div>
        </div>
      </router-link>

      <router-link :to="{ name: 'randomcolor'}">
        <div class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg shadow-lg">
          <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
          </svg>

          <div class=" text-white text-center px-6 pb-6 mt-6">
              <span class="font-semibold text-xl">Random Color Generator</span>
          </div>
        </div>
      </router-link>

      <router-link :to="{ name: 'pdfmerge'}">
        <div class="flex-shrink-0 m-6 relative overflow-hidden bg-red-500 rounded-lg shadow-lg">
          <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
          </svg>

          <div class="text-white text-center px-6 pb-6 mt-6">
              <span class="font-semibold text-xl">PDF Merger</span>
          </div>
        </div>
      </router-link> -->
      
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