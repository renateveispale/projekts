import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

require('./bootstrap');

window.Vue = require('vue');

Vue.component('post-component', require('./components/PostComponent.vue').default);

const app = new Vue({
    el: '#app',
    created() {
        Echo.private('post.created')
            .listen('PostCreated', (e) => {
                alert(e.post.title + 'Has been published now');
                console.log(e.post.title)
                console.log("Loaded")
            });
    }
});