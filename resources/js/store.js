import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        posts: []
    },
    getters: {
        posts(state) {
            return state.posts
        }
    },
    actions: {
        async getPosts({commit}) {
            let posts = await axios.get('api/posts');
            commit('SET_POSTS', posts.data.data)
        },
        async getPost({commit}, id) {
            let post = await axios.get('api/posts/'+id);
            commit('PREPEND_POST', post.data.data)
        },
        async createPosts({commit}, data) {
            let posts = await axios.post('api/posts', data);
            commit('PREPEND_POST', posts.data.data)
        },
        async likePost({commit}, id) {
            let posts = await axios.post(`api/posts/${id}/likes`);
            commit('UPDATE_POST', posts.data.data)
        },
        async refreshPost({commit}, id) {
            let post = await axios.get('api/posts/'+id);
            commit('UPDATE_POST', post.data.data)
        }
    },
    mutations: {
        SET_POSTS(state, posts) {
            state.posts = posts
        },
        PREPEND_POST(state, post) {
            let posts = [...state.posts];
            posts.unshift(post);

            state.posts = posts;
        },
        UPDATE_POST(state, post) {
            state.posts = state.posts.map(p => {
                if(p.id === post.id) {
                    return post;
                }

                return p;
            }) 
        },
    }
})