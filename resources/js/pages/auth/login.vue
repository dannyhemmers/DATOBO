<template>
  <v-container
  class="fill-height"
  fluid
>
  <v-row
    align="center"
    justify="center"
  >
    <v-col
      cols="12"
      sm="8"
      md="4"
    >
    <form @submit.prevent="login" @keydown="form.onKeydown($event)">
      <v-card class="elevation-12"
      >
        <v-toolbar
          color="#4527A0"
          dark
          flat
        >
          <v-toolbar-title>{{$t("login")}}</v-toolbar-title>
          <v-spacer />
        </v-toolbar>
        <v-card-text>
          <v-form>
            <v-text-field
              :label="$t('email')"
              name="login"
              prepend-icon="mdi-account"
              type="text"
              v-model="form.email"
              :error-messages="form.errors.get('email')"
            />

            <v-text-field
              id="password"
              :label="$t('password')"
              name="password"
              prepend-icon="mdi-lock"
              type="password"
              v-model="form.password"
              :error-messages="form.errors.get('email')"
            />
            <v-checkbox
              v-model="remember"
              color="#4527A0"
              :label="$t('remember_me')"
            ></v-checkbox>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer />
          <v-btn 
          :loading="loading"
          :disabled="loading"
          color="#4527A0"
          type="submit"
          class="px-4"
          @click="loader = 'loading'; login()"
          >
            {{$t('login')}}
          </v-btn>
        </v-card-actions>
      </v-card>
    </form>
    </v-col>
  </v-row>
</v-container>
</template>

<script>
import Form from "vform";
import LoginWithGithub from "~/components/LoginWithGithub";
import PasswordField from "../../components/PasswordField";

export default {
  middleware: "guest",
  components: {
    PasswordField,
    LoginWithGithub
  },
  metaInfo() {
    return { title: this.$t("login") };
  },
  data: () => ({
    form: new Form({
      email: "",
      password: ""
    }),
    remember: false,
    loader: null,
    loading: false
  }),
  watch: {
    loader () {
      const l = this.loader
      this[l] = !this[l]
      setTimeout(() => (this[l] = false), 3000)
      this.loader = null
    },
  },
  methods: {
    async login() {
      // Submit the form.
      const { data } = await this.form.post("/api/login");

      // Save the token.
      this.$store.dispatch("auth/saveToken", {
        token: data.token,
        remember: this.remember
      });

      // Fetch the user.
      await this.$store.dispatch("auth/fetchUser");

      // Login successful, redirect to where user came from, or home.
      let route = { name: "home" };
      if (this.$store.getters["auth/hasPreLoginRoute"]) {
        route = this.$store.state.auth.preLoginRoute;
        this.$store.dispatch("auth/setPreLoginRoute", null);
      }
      this.$router.push(route);
    }
  }
};
</script>
