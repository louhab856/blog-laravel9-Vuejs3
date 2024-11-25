<template>
    <div class="d-flex flex-column">
        <div v-for="comment in store.comments.slice(0,data.commentsToShow)" :key="comment.id" class="flex">
            <div class="flex-shrink-0">
                <span class="fw-bold">
                    {{ comment.user.name }} 
                </span>
            </div>
            <div class="flex-grow-1 ml-3">
                <span class="text-muted">
                    <i> {{ comment.created_at }} </i>
                </span>
                <p>
                    {{ comment.body }}  
                </p>
            </div>
        </div>
        <button 
        v-if="data.commentsToShow < store.comments.length"
        @click="loadMoreComments"
        class="btn btn-sm btn-link text-decoration-none text-dark">
            Load More 
        </button>
    </div>
</template>
<script>
import { onMounted, reactive } from "vue";
import { useCommentsStore } from "@/stores/useCommentsStore.js";

export default {
    name: "Comments",
    props: {
        post_id: {
            type: Number,
            required: true,
        },
    },
    setup(props) {
        const store = useCommentsStore();
        const data = reactive({
            commentsToShow:3
        })
        onMounted(() => {
            store.fetchComment(props.post_id); // Corrected method name
        });
        const loadMoreComments = ()=>{
            if(data.commentsToShow>= store.comments.length) 
            { return }
            else {
                data.commentsToShow = data.commentsToShow + 3
            }
        }
        return {
            store,
            data,
            loadMoreComments
        };
    },
};
</script>
