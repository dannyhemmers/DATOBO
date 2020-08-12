<template>
  <v-select
    :options="availableLocales"
    @input="setLocale"
    v-model="lang"
    :clearable="false"
    class="style-chooser"
  />
</template>

<script>
import { mapGetters } from "vuex";
import { loadMessages } from "~/plugins/i18n";

export default {
  computed: {
    availableLocales: function() {
      return Object.keys(this.locales).map(key => {
        return {
          label: this.locales[key],
          code: key
        };
      });
    },
    currentLocale: function() {
      return this.availableLocales.find(locale => locale.code === this.locale);
    },
    ...mapGetters({
      locale: "lang/locale",
      locales: "lang/locales"
    })
  },
  data() {
    return {
      lang: null
    };
  },
  mounted() {
    this.lang = this.currentLocale;
  },
  methods: {
    setLocale(locale) {
      if (this.$i18n.locale !== locale.code) {
        loadMessages(locale.code);
        this.$store.dispatch("lang/setLocale", locale.code);
      }
    }
  }
};
</script>
<style>
  .style-chooser .vs__search::placeholder,
  .style-chooser .vs__dropdown-toggle,
  .style-chooser .vs__dropdown-menu {
    background: #1a202c;
    border: 1px #242b3a solid;
    color: #FFF!important;
    text-transform: lowercase;
    font-variant: small-caps;
  }

  .style-chooser .vs__clear,
  .style-chooser .vs__open-indicator {
    fill: #FFF;
  }

  .style-chooser .vs__selected{
    color: #FFF;
  }
</style>