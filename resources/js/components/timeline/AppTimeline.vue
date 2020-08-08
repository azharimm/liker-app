<template>
    <div>
        <app-timeline-create />

        <div class="timeline__posts">
            <app-timeline-post v-for="post in posts" :key="post.id" :post="post" />
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            posts: []
        }
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        async getPosts() {
            let posts = await axios.get('api/posts');
            this.posts = posts.data.data;
        }
    }
}
</script>

<style scoped>
    .timeline__post {
        margin-top: 40px;
    }
</style>