/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import ElementUI from 'element-ui';
import qsList from './components/QS-list'
import qsData from './components/QS-data'
import qsFill from './components/QS-fill'
import qsEdit from './components/QS-edit'
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    components: {
        qsList,
        qsData,
        qsFill,
        qsEdit,
    },
    data() {
        return {
            activeName: 'first',
            form: {
                name: '',
                region: '',
                date1: '',
                date2: '',
                delivery: false,
                type: [],
                resource: '',
                desc: ''
            }
        }
    },
    methods: {
        onSubmit() {
            console.log('submit!');
        }
        ,
        handleClick(tab, event) {
            console.log(tab, event);
        }
    }
});

