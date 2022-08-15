require("./bootstrap");

import Vue from "vue";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import locale from "element-ui/lib/locale/lang/tr-TR";
import VueFormWizard from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";
import vSelect from "vue-select";

Vue.use(ElementUI, { locale });
Vue.use(VueFormWizard);
Vue.component(
    "job-create",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "classifiedsec",
    require("./components/Classifiedsec.vue").default
);
Vue.component("v-select", vSelect);

const app = new Vue({
    el: "#app",
});
