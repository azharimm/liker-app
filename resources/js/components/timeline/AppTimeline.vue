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
import { mapActions, mapGetters } from 'vuex'
export default {
    computed: {
        ...mapGetters({
            posts: 'posts'
        })
    },
    mounted() {
        this.getPosts();
    },
    methods: {
       ...mapActions({
           getPosts: 'getPosts'
       })
    }
}
</script>

<style scoped>
    .timeline__post {
        margin-top: 40px;
    }
</style>