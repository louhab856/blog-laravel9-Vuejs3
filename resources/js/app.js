import './bootstrap';
import { createPinia } from 'pinia'

import {createApp} from 'vue/dist/vue.esm-bundler.js';
import Comments from './components/Comments.vue';
import AddComment from './components/AddComment.vue';
import CommentsCount from './components/CommentsCount.vue';
import SearchCanvas from './components/SearchCanvas.vue';
const app = createApp({});

app.component('comments-component', Comments);
app.component('add-comments', AddComment);
app.component('comments-count', CommentsCount);
app.component('search-canvas-component', SearchCanvas);





const pinia = createPinia()
app.use(pinia)


app.mount("#app");