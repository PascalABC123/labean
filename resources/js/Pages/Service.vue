<script setup>
import {Head, router} from '@inertiajs/vue3';
import UserOnline from "@/Shared/UserOnline.vue";
import UserJoined from "@/Shared/UserJoined.vue";
import PrimaryButton from "@/Shared/Buttons/PrimaryButton.vue";
import SecondaryButton from "@/Shared/Buttons/SecondaryButton.vue";

let props = defineProps({
    data: Object,
});

const accept = () => {
    router.post(route('service.accept', {id: props.data.service.id}));
};
</script>

<template>
    <Head :title="data.service.header"/>

    <section class="mt-10">
        <div class="flex gap-10">
            <div>
                <div class="">Заказ</div>
                <h1 class="text-2xl font-bold mb-10">
                    {{ data.service.header }}
                </h1>
            </div>
            <div class="mt-7">
                <SecondaryButton
                    v-if="$page.props.auth.user===null || data.user.id !== $page.props.auth.user.id"
                    @click="accept"
                >
                    Принять
                </SecondaryButton>
                <SecondaryButton v-else :href="route('service.update', {id: data.service.id})">Изменить</SecondaryButton>
            </div>
        </div>

        <div class="flex gap-2 text-sm text-gray-600 mb-10">
            <div class="font-bold">
                Категория:
            </div>
            <div class="my-auto">
                {{ data.specialization.name }}
            </div>
        </div>
        <div class="mb-10">
            <div class="text-sm text-gray-600">Описание</div>
            <p>
                {{ data.service.body }}
            </p>
        </div>
        <div class="mb-10">
            <div class="">
                Заказчик:
            </div>
            <div class="flex">
                <div class="w-1/12 text-sm text-gray-600">
                    <img class="rounded"
                         :src="data.user.avatar? data.user.avatar: 'https://avatars.mds.yandex.net/i?id=c071b869a097dc08c30888218ef0be9234e78ad5-9095316-images-thumbs&n=13'"
                         alt="avatar">
                </div>
                <div class="mt-3 ml-10">
                    <p class="text-2xl font-bold">{{ data.user.name }} {{ data.user.surname }}</p>
                    <div class="flex gap-12">
                        <UserOnline :last_seen="data.user.last_seen" :online="data.user.online"/>
                        <UserJoined :joined="Date.now()"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
