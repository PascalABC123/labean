<script setup>
defineProps({
    joined: {
        type: Date,
        required: true,
    }
});
</script>


<template>
    <div class="flex gap-2 text-sm text-gray-600">
        <svg class="my-auto" viewBox="0 0 14 16" xmlns="http://www.w3.org/2000/svg" width="14px" height="16px"><path class="fill-gray-600" d="M10.75 9H7v3.75h3.75V9zM10 .75v1.5H4V.75H2.5v1.5h-.75c-.833 0-1.493.675-1.493 1.5L.25 14.25a1.5 1.5 0 0 0 1.5 1.5h10.5c.825 0 1.5-.675 1.5-1.5V3.75c0-.825-.675-1.5-1.5-1.5h-.75V.75H10zm2.25 13.5H1.75V6h10.5v8.25z" fill-rule="evenodd"></path></svg>
        <div class="my-auto">Присоединился 0 дней назад.</div>
    </div>
</template>

