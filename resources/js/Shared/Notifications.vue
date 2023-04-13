<script setup>
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    notifications: Array,
});
</script>

<script>
export default {
    data() {
        return {
            isActive: false,
        };
    },
    methods: {
        toggle() {
            this.isActive = !this.isActive;
        },
    }
};
</script>

<template>
    <div class="">
        <button @click="toggle" v-if="notifications.length"
                class="rounded-3xl my-auto text-sm h-fit px-2.5 text-white py-0.5 bg-red-600">
            {{ notifications.length }}
        </button>
        <div v-show="isActive" class="absolute z-20 bg-white rounded-xl right-28 top-12 shadow p-2">
            <div class="text-sm mb-2">Уведомления:</div>
            <div class="text-sm text-gray-600" v-for="item in notifications">
                <Link :href="route('chats')" v-if="item.type=='accept'" class="">
                    {{item.sender_name}} {{item.sender_surname}} хочет выполнить ваше задание
                </Link>
            </div>
        </div>
    </div>
</template>

