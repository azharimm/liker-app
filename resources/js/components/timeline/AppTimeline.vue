<template>
    <div>
        <app-timeline-create />

        <div class="timeline__posts">
            <app-timeline-post v-for="x in 10" :key="x" />
        </div>
    </div>
</template>

<style scoped>
    .timeline__post {
        margin-top: 40px;
    }
</style>