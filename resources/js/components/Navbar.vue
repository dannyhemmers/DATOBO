<template>
<v-app-bar
      color=""
    >
    <v-btn class="mr-4" x-large text @click="pushHome">
      <v-icon>mdi-hammer-screwdriver</v-icon>
      DATOBO
    </v-btn>

    <LocaleDropdown/>

      <v-spacer></v-spacer>
      <template v-if="user">
      <v-menu
        offset-y
        z-index="100"
        v-if="!$vuetify.breakpoint.smAndDown"
      >
        <template v-if="!$vuetify.breakpoint.smAndDown" v-slot:activator="{ on }">
          <v-btn v-if="!$vuetify.breakpoint.smAndDown" v-on="on" :style="{color: user.color, fontWeight: 600}">
              {{ user.name }}
            <v-icon>
              mdi-menu-down
            </v-icon> 
          </v-btn>
        </template>

        <v-list>
          
          <v-list-item @click.prevent="logout">
            <v-list-item-title>
              {{ $t('logout') }}
            </v-list-item-title>
          </v-list-item>

        </v-list>
      </v-menu>
      </template>
      <template v-else>

        <v-btn text class="mx-1" :to="{ name: 'login'}">
          {{$t('login')}}
        </v-btn>
        <v-btn text class="mx-1" :to="{ name: 'register'}">
          {{$t('register')}}
        </v-btn>
      </template>
      <v-btn class="mx-1" icon href="https://github.com/dannyhemmers/DATOBO" target="_blank">
        <v-icon>mdi-github</v-icon>
      </v-btn>
    </v-app-bar>

</template>

<script>
import { mapGetters } from "vuex"
import { directive as clickOutside } from "vue-on-click-outside"
import { setDarkTheme } from "../utilities/utils"
import login from "../pages/auth/login"
import LocaleDropdown from "../components/LocaleDropdown"

export default {
  components: {
    login,
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
  computed: mapGetters({
    user: "auth/user",
    check: "auth/check"
  }),
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
      this.$router.push({ name: "home" });
    },
    pushHome() {
      if(this.$route.path != "/")
      {
          this.$router.push({ path: '/' })
      }
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

</style>
