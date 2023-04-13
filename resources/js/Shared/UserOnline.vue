<script setup>
let props = defineProps({
   online: {
       type: Boolean,
   },
   last_seen: {
       type: Date,
   }
});
</script>


<template>
    <div v-if="online" class="flex text-green-500 text-sm gap-2">
        <svg class="my-auto" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" width="14px" height="14px"><path class="fill-green-500" d="M7 0C3.15 0 0 3.15 0 7s3.15 7 7 7 7-3.15 7-7-3.15-7-7-7zm0 12.25c-2.888 0-5.25-2.363-5.25-5.25 0-2.888 2.362-5.25 5.25-5.25 2.887 0 5.25 2.362 5.25 5.25 0 2.887-2.363 5.25-5.25 5.25zm.25-8H6V8h3.75V6.75h-2.5v-2.5z" fill-rule="evenodd"></path></svg>
        <div class="my-auto">На сайте.</div>
    </div>
    <div v-else class="flex text-gray-600 text-sm gap-2">
        <svg class="my-auto" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" width="14px" height="14px"><path class="fill-gray-600" d="M7 0C3.15 0 0 3.15 0 7s3.15 7 7 7 7-3.15 7-7-3.15-7-7-7zm0 12.25c-2.888 0-5.25-2.363-5.25-5.25 0-2.888 2.362-5.25 5.25-5.25 2.887 0 5.25 2.362 5.25 5.25 0 2.887-2.363 5.25-5.25 5.25zm.25-8H6V8h3.75V6.75h-2.5v-2.5z" fill-rule="evenodd"></path></svg>
        <div class="my-auto">Был онлайн {{last_seen}}.</div>
    </div>
</template>

