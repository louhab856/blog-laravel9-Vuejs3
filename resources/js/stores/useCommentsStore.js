import { defineStore } from "pinia";
import axios from "axios";

export const useCommentsStore = defineStore('useCommentsStore', {
    state: () => ({
        comments: []
    }),
    getters: {
        getComments: (state) => state.comments
    },
    actions: {
        async storeComments(data) {
            try {
                const response = await axios.post('/api/add/comment', {
                    user_id: data.user_id,
                    post_id: data.post_id,
                    body: data.body
                });
                this.comments.unshift(response.data);
            } catch (error) {
                console.error("Error storing comment:", error);
            }
        },
        async fetchComment(post_id) {
            try {
                const response = await axios.get(`/api/comment/${post_id}`);
                this.comments = response.data;
            } catch (error) {
                console.error("Error fetching comments:", error);
            }
        }
    }
});
