<script setup>
import { Head } from '@inertiajs/vue3';
import PrimaryButton from "@/Shared/Buttons/PrimaryButton.vue";
</script>

<template>
    <Head title="Заказчикам"/>

    <section class="mt-20 flex justify-between">
        <h1 class="text-4xl font-bold">Специалисты</h1>
        <PrimaryButton v-if="$page.props.canCreate.customer" :href="route('customer.create')">Создать свой заказ</PrimaryButton>
    </section>
</template>
