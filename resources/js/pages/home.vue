<template>
<div>

  <p class="text-h2 text-center mb-0">DATOBO</p>
  <p class="text-h6 text-center mt-0 mb-6">Danny's ToolBox</p>

<v-card
  class="mx-auto my-3"
  max-width="600"
  elevation="14">
  <v-card-title class="headline"><v-icon>mdi-instagram</v-icon>Instagram + <v-icon class="ml-1">mdi-youtube</v-icon>Youtube Video Downloader</v-card-title>
  
  <v-card-subtitle>Download Videos from Youtube or Instagram</v-card-subtitle>

  <v-card-actions>
    <v-btn large elevation="5" :to="{ name: 'downloader'}" >Video Downloader <v-icon>mdi-download</v-icon></v-btn>
  </v-card-actions>
</v-card> 

<v-card
  class="mx-auto my-3"
  max-width="600"
  elevation="14">
  <v-card-title class="headline"><v-icon>mdi-image-multiple</v-icon>Image Merger</v-card-title>

  <v-card-subtitle>Merge multiple Images into one single file.</v-card-subtitle>

  <v-card-actions>
    <v-btn large elevation="5" :to="{ name: 'imagemerger'}">Image Merger <v-icon>mdi-image-edit</v-icon></v-btn>
  </v-card-actions>
</v-card> 
<v-card
  class="mx-auto my-3"
  max-width="600"
  elevation="14">
  <v-card-title class="headline"><v-icon>mdi-file-pdf</v-icon> PDF Tools</v-card-title>

  <v-card-subtitle>Edit PDFs. Merging, extracting, etc.</v-card-subtitle>

  <v-card-actions>
    <v-btn large elevation="5" :to="{ name: 'pdfmerge'}" >Go to PDF Tools <v-icon>mdi-hammer-screwdriver</v-icon></v-btn>
  </v-card-actions>
</v-card>
<v-card
  class="mx-auto my-3"
  max-width="600"
  elevation="14">
  <v-card-title class="headline"><v-icon>mdi-eyedropper-variant</v-icon> Color</v-card-title>

  <v-card-subtitle>Generate Random Colorcodes</v-card-subtitle>

  <v-card-actions>
    <v-btn large elevation="5" :to="{ name: 'randomcolor'}" >Go to Random Color Generator <v-icon>mdi-palette</v-icon></v-btn>
  </v-card-actions>
</v-card>
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