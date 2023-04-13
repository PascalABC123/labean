<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <Link as="button" method="post" :href="route('profile.logout')" class="my-auto bg-gray-600 text-white rounded-xl px-2 py-1">
        <slot/>
    </Link>
</template>
