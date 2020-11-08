<template>
  <v-btn-toggle dense v-model="toggle_exclusive">
        <v-btn @click="setLocale(availableLocales[0])">
          EN
        </v-btn>

        <v-btn @click="setLocale(availableLocales[1])">
          DE
        </v-btn>
      </v-btn-toggle>
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
      lang: null,
      toggle_exclusive: 0
    };
  },
  mounted() {
    this.lang = this.currentLocale;
    if (this.lang.code == 'en')
    {
      this.toggle_exclusive = 0
    }
    else
    {
      this.toggle_exclusive = 1
    }


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
</style>