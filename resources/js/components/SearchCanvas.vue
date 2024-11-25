<template>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ placeholder }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <input 
        :placeholder="props.placeholder"
        v-model="data.term"
        type="text" class="form-control">
    </div>
</div>
</template>

<script setup>
import { reactive } from 'vue';
const data = reactive({
        term: ''
})

const props = defineProps({
    placeholder:{
        type:String,
        required:true 
    }
})
</script>
