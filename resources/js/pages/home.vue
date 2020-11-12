<template>
<div>

  <p class="text-h2 text-center mb-0">DATOBO</p>
  <p class="text-h6 text-center mt-0 mb-6">Danny's ToolBox</p>

  <HomeCard 
    title="Video Downloader"
    :subtitle="$t('video_downloader_description')"
    path="downloader"
    :icons="['mdi-instagram', 'mdi-reddit', 'mdi-twitter']"
  />

  <HomeCard 
    title="Instagram Image-Gallery Merger"
    :subtitle="$t('merger_description')"
    path="imagemerger"
    :icons="['mdi-instagram']"
  />

  <HomeCard 
    title="Nopaste"
    :subtitle="$t('nopaste')"
    path="nopaste"
    :icons="['mdi-content-paste']"
  />

  <HomeCard 
    title="PDF Tools"
    :subtitle="$t('pdf_description')"
    path="pdfmerge"
    :icons="['mdi-file-pdf']"
  />

  <HomeCard 
    :title="$t('color')"
    :subtitle="$t('color_description')"
    path="randomcolor"
    :icons="['mdi-eyedropper-variant']"
  />

</div>
</template>

<script>
import LocaleDropdown from "../components/LocaleDropdown"
import HomeCard from "../components/HomeCard"

export default {
  metaInfo() {
    return { title: this.$t("home") };
  },
  components: {
    LocaleDropdown,
    HomeCard
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