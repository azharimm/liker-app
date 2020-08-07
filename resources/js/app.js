require('./bootstrap');

window.Vue = require('vue');
Vue.component('app-timeline', require('./components/timeline/AppTimeline.vue').default);
Vue.component('app-timeline-create', require('./components/timeline/AppTimelineCreate.vue').default);
Vue.component('app-timeline-post', require('./components/timeline/AppTimelinePost.vue').default);
Vue.component('app-timeline-post-like', require('./components/timeline/AppTimelinePostLike.vue').default);

const app = new Vue({
    el: '#app',
});
