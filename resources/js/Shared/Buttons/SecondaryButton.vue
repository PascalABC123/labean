<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    href: {
        type: String,
    },
    method: {
        type: String,
    }
});
</script>

<template>
    <Link :href="href" :method="method==='post'? 'post': 'get'" class="my-auto bg-gray-600 text-white rounded-xl px-3 py-2">
        <slot/>
    </Link>
</template>
