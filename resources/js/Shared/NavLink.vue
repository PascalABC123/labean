<script setup>

import { Link } from '@inertiajs/vue3';

defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});
</script>

<template>
    <Link :href="href" class="text-sm py-2 rounded-xl px-1 hover:bg-gray-100 transition-all" :class="active? 'text-blue-600': 'text-gray-600'">
        <slot />
    </Link>
</template>
