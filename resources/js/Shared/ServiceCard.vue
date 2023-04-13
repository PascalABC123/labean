<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    service: Object
});
</script>

<template>
    <Link :href="route('service', service.id)" class="block shadow rounded p-1 flex">
        <div class="bg-blue-50 h-fit w-fit rounded">
            <img :src="service.specialization.picture" alt="pic">
        </div>
        <div class="mx-6">
            <div class="">
                {{ service.header }}
            </div>
            <div class="flex gap-6">
                <div class="text-sm text-gray-600">
                    Заказчик: {{ service.user.name }} {{ service.user.surname }}
                </div>
                <div v-if="service.deadline" class="text-sm text-gray-600">
                    Выполнить до: {{ service.deadline }}
                </div>
                <div v-else class="text-sm text-gray-600">
                    Время выполнения не ограничено
                </div>
                <div class="">
                    {{ service.min_price }}-{{ service.max_price }}₽
                </div>
            </div>
        </div>
    </Link>
</template>
