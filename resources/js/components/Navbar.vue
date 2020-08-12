<template>
  <nav class="shadow py-3 dark:bg-gray-900">
    <div class="container flex-between mx-auto">
      <div class="flex-around sm:flex-between">
        <router-link
          :to="{ name: 'home'}"
          class="mr-3 my-3 text-xl text-gray-200"
          v-text="appName"
        />
        <LocaleDropdown />
      </div>
      <div class="flex-around sm:flex-between">
        <template>
          <div class="mx-2 relative">

          </div>
        </template>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from "vuex";
import LocaleDropdown from "./LocaleDropdown";
import { directive as clickOutside } from "vue-on-click-outside";
import { setDarkTheme } from "../utilities/utils";

export default {
  components: {
    LocaleDropdown
  },
  directives: {
    clickOutside
  },
  data() {
    return {
      menuOpen: false,
      appName: window.config.appName
    };
  },
  created()
  {
    //Always set Dark Theme
    setDarkTheme(true)
  },
  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch("auth/logout");
      setDarkTheme(false);

      // Redirect to login.
      this.$router.push({ name: "welcome" });
    }
  },
  watch: {
    check: {
      immediate: true,
      handler: function(newVal) {
        // user logged in
        if (newVal) {
          setDarkTheme(this.$store.getters["theme/darkMode"]);
        }
      }
    }
  }
};
</script>

<style scoped lang="scss">
</style>
