<template>
    <div class="timeline__post media">
        <img src="" class="timeline__avatar mr-3 rounded">
        <div class="media-body">
            <div class="font-weight-bold">
                Azhari
            </div>
            <p>
                post body
            </p>
            <app-timeline-post-like />
        </div>
    </div>
</template>

<style scoped>
    .timeline__post {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .timeline__avatar {
        width: 60px;
    }
</style>