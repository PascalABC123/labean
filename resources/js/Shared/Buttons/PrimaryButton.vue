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
    <Link :href="href" :as="method==='post'? 'button': 'a'" :method="method==='post'? 'post': 'get'" class="my-auto bg-blue-600 text-sm text-white rounded-3xl px-3 py-2">
        <slot/>
    </Link>
</template>
