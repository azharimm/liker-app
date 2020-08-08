<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="body" class="sr-only">Share something</label>
            <textarea
                class="form-control"
                placeholder="Share something"
                rows="3"
                v-model="form.body">
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Post It</button>
    </form>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
    data() {
        return {
            form: {
                body: ''
            }
        }
    },
    methods: {
        ...mapActions({
           createPosts: 'createPosts'
        }),
        async submit() {
            await this.createPosts(this.form);
            this.form.body = '';
        }
    }
}
</script>