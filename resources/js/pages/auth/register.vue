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
            cols="24"
            sm="8"
            md="4"
          >

          <v-card color="red darken-4" class="my-6 pa-4 text-center">
            {{$t('register_warning')}}
          </v-card>

          <form @submit.prevent="register" @keydown="form.onKeydown($event)">
            <v-card class="elevation-12"
            >
              <v-toolbar
                color="#4527A0"
                dark
                flat
              >
              
                <v-toolbar-title>{{$t('register')}}</v-toolbar-title>
                <v-spacer />
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field
                    :label="$t('name')"
                    name="Name"
                    prepend-icon="mdi-account"
                    type="text"
                    v-model="form.name"
                    :error-messages="form.errors.get('name')"
                  />
                  <v-text-field
                    :label="$t('email')"
                    name="email"
                    prepend-icon="mdi-email"
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
                    :error-messages="form.errors.get('password')"
                  />
                  <v-text-field
                    :label="$t('confirm_password')"
                    name="password_confirmation"
                    prepend-icon="mdi-lock"
                    type="password"
                    v-model="form.password_confirmation"
                    :error-messages="form.errors.get('password_confirmation')"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer />
                <v-btn 
                :loading="loading"
                :disabled="loading"
                color="#4527A0"
                type="submit"
                @click="loader = 'loading'; register()"
                >
                  {{$t('register')}}
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

export default {
  middleware: "guest",

  components: {
    LoginWithGithub
  },

  metaInfo() {
    return { title: this.$t("register") };
  },

  data: () => ({
    form: new Form({
      name: "",
      email: "",
      password: "",
      password_confirmation: ""
    }),
    mustVerifyEmail: false,
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
    async register() {
      // Register the user.
      const { data } = await this.form.post("/api/register");

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true;
      } else {
        // Log in the user.
        const {
          data: { token }
        } = await this.form.post("/api/login");

        // Save the token.
        this.$store.dispatch("auth/saveToken", { token });

        // Update the user.
        await this.$store.dispatch("auth/updateUser", { user: data });

        await this.$store.dispatch("auth/fetchUser");

        // Redirect home.
        this.$router.push({ name: "home" });
      }
    }
  }
};
</script>
