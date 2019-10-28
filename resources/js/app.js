require('./bootstrap');

Vue.component('parent-list', require('./components/ParentList.vue').default);

const app = new Vue({
    el: '#app',
});
