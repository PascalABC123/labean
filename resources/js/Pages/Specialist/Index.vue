<script setup>
import { Head } from '@inertiajs/vue3';
import ServiceCard from "@/Shared/ServiceCard.vue";

let props = defineProps({
    services: Object,
});
</script>

<template>
    <Head title="Специалистам"/>

    <section class="mt-20 flex justify-between">
        <h1 class="text-4xl font-bold">Заказы для специалистов</h1>
    </section>

    <section class="mt-10 grid grid-cols-2 gap-x-4 gap-y-2">
        <ServiceCard v-for="service in services.data" :key="service.id" :service="service"/>
    </section>

</template>
