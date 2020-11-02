import Vue from "vue";
import store from "~/store";
import router from "~/router";
import i18n from "~/plugins/i18n";
import App from "~/components/App";
import Vuetify from 'vuetify'
import colors from 'vuetify/es5/util/colors'


import "~/plugins";
import "~/components";
import "~/mixins";
import "~/directives";

Vue.config.productionTip = false;

import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

window.EventBus = new Vue({
    i18n,
    store,
    router,
    ...App,
    vuetify: new Vuetify({
        theme: {
            dark: true
        },
        icons: {
            iconfont: 'mdi',
        },
    })
});