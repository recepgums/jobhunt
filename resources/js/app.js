require('./bootstrap');

import Vue from 'vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

import vSelect from 'vue-select'


import locale from 'element-ui/lib/locale/lang/tr-TR'
import VueFormWizard from "vue-form-wizard";
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import 'vue-select/dist/vue-select.css';

Vue.use(ElementUI,{locale});
Vue.use(VueFormWizard);

// Vue.component('v-select', vSelect)
Vue.component('job-create', require('./components/ExampleComponent.vue').default)
Vue.component('job-filter', require('./components/JobFilter.vue').default)

const app = new Vue({
    el: '#app',
})
