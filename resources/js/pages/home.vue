<template>
<div>

  <p class="text-h2 text-center mb-0">DATOBO</p>
  <p class="text-h6 text-center mt-0 mb-6">Danny's ToolBox</p>

<v-hover v-slot="{ hover }">
<v-card
  class="mx-auto my-3"
  max-width="600"
  :elevation="hover ? 14 : 2"
  :class="{ 'on-hover': hover }"
  :to="{ name: 'downloader'}">
  <v-card-title class="headline">
    <v-icon>mdi-instagram</v-icon>
    <v-icon class="ml-1">mdi-reddit</v-icon>
    <v-icon class="ml-1 mr-1">mdi-twitter</v-icon> Video Downloader 
  </v-card-title>
  
  <v-card-subtitle>{{ $t("video_downloader_description") }}</v-card-subtitle>
</v-card> 
</v-hover>

<v-hover v-slot="{ hover }">
<v-card
  class="mx-auto my-3"
  max-width="600"
  :elevation="hover ? 14 : 2"
  :class="{ 'on-hover': hover }"
  :to="{ name: 'imagemerger'}">
  <v-card-title class="headline"><v-icon class="mr-1">mdi-instagram</v-icon>Instagram Image-Gallery Merger</v-card-title>

  <v-card-subtitle>{{ $t("merger_description") }}</v-card-subtitle>
</v-card> 
</v-hover>

<v-hover v-slot="{ hover }">
<v-card
  class="mx-auto my-3"
  max-width="600"
  :elevation="hover ? 14 : 2"
  :class="{ 'on-hover': hover }"
  :to="{ name: 'pdfmerge'}">
  <v-card-title class="headline"><v-icon class="mr-1">mdi-file-pdf</v-icon> PDF Tools</v-card-title>

  <v-card-subtitle>{{ $t("pdf_description") }}</v-card-subtitle>
</v-card>
</v-hover>

<v-hover v-slot="{ hover }">
<v-card
  class="mx-auto my-3"
  max-width="600"
  :elevation="hover ? 14 : 2"
  :class="{ 'on-hover': hover }"
  :to="{ name: 'randomcolor'}">
  <v-card-title class="headline"><v-icon class="mr-1">mdi-eyedropper-variant</v-icon>{{ $t("color") }}</v-card-title>

  <v-card-subtitle>{{ $t("color_description") }}</v-card-subtitle>
</v-card>
</v-hover>

</div>
</template>

<script>
import LocaleDropdown from "../components/LocaleDropdown"

export default {
  metaInfo() {
    return { title: this.$t("home") };
  },
  components: {
    LocaleDropdown
  },
  data() {
    return {
      websocketWorks: false
    };
  },
}
</script>

<style scoped>
>>>.v-card.v-sheet.theme--dark {
    border-left: 5px solid #4527A0!important
}

>>>.v-card {
  transition: background-color .1s ease-in-out;
  background-color: #252525;
}

>>>.v-card:not(.on-hover) {
  background-color: #1e1e1e;
 }
</style>