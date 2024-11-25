<template>
    <form @submit.prevent="addComment">
        <div class="mb-2">
            <textarea
                v-model="comment.body"
                required
                class="form-control"
                placeholder="Start typing..."
                rows="3"
                cols="30"
                id="comment-body"
            ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</template>

<script>
import { reactive } from "vue";
import { useCommentsStore } from "@/stores/useCommentsStore.js";

export default {
    name: "CommentForm",
    props: {
        user_id: {
            type: Number,
            required: true,
        },
        post_id: {
            type: Number,
            required: true,
        },
    },
    setup(props) {
        const comment = reactive({
            body: "",
        });

        const store = useCommentsStore();
        

        const addComment = async () => {
            if (!comment.body.trim()) {
                alert("Comment cannot be empty!");
                return;
            }

            try {
                const data = {
                    body: comment.body,
                    user_id: props.user_id,
                    post_id: props.post_id,
                }
                await store.storeComments(data);
                comment.body = ""; 
                alert("Comment added successfully!");
            } catch (error) {
                console.error("Failed to add comment:", error);
                alert("An error occurred while adding the comment.");
            }
        };

        return { comment, addComment };
    },
};
</script>
