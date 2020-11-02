<template>
<v-app-bar
      color=""
    >

      <v-toolbar-title>
        <router-link class="navbarLogo" :to="{ name: 'home'}">  
          <v-icon large>mdi-toolbox</v-icon>
          DATOBO
        </router-link>
      </v-toolbar-title>

      <v-spacer></v-spacer>

    </v-app-bar>

</template>

<script>
import { mapGetters } from "vuex";
import { directive as clickOutside } from "vue-on-click-outside";
import { setDarkTheme } from "../utilities/utils";

export default {
  components: {
    
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

<style scoped>
.navbarLogo{
  text-decoration: none!important;
  color: white!important;
}
</style>
