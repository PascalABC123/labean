<script setup>
import {Head} from '@inertiajs/vue3';
import UserOnline from "@/Shared/UserOnline.vue";
import UserJoined from "@/Shared/UserJoined.vue";
import LogoutButton from "@/Shared/Buttons/LogoutButton.vue";
import ChangeAboutInfo from "@/Shared/Form/ChangeAboutInfo.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    services: Object,
});

</script>

<script>
export default {
    computed: {
        user() {
            return this.$page.props.auth.user;
        },
    }
}
</script>

<template>
    <Head title="Профиль"/>

    <section class="flex mt-20 ml-32 w-fit">
        <div class="w-1/12 text-sm text-gray-600">
            <img class="rounded"
                 :src="user.avatar? user.avatar: 'https://avatars.mds.yandex.net/i?id=c071b869a097dc08c30888218ef0be9234e78ad5-9095316-images-thumbs&n=13'"
                 alt="avatar">
        </div>
        <div class="mt-3 ml-10">
            <div v-if="user.type==='customer'" class="">Заказчик</div>
            <div v-else class="">Специалист</div>
            <p class="text-2xl font-bold">{{user.name}} {{user.surname}}</p>
            <div class="flex gap-12">
                <UserOnline :last_seen="user.last_seen" :online="user.online"/>
                <UserJoined :joined="Date.now()"/>
                <LogoutButton>Выйти</LogoutButton>
            </div>
            <ChangeAboutInfo :about="this.$page.props.auth.user.about" class="mt-10"/>
        </div>
    </section>
    <section v-if="user.type==='customer'" class="mt-32 ml-32">
        <h2 class="text-xl mb-5">Ваши заказы</h2>
        <div class="rounded-xl shadow w-full p-3">
            <div class="" v-if="services.data.length === 0">Вы пока не создали ни одной заявки</div>
            <Link :href="route('service.update', {id: service.id})" class="flex justify-content-between my-1" v-for="service in services.data">
                <img :src="service.specialization.picture" alt="pic">
                <div class="ml-5 my-auto text-sm text-gray-600">
                    {{service.header}}
                </div>
            </Link>
        </div>
    </section>
</template>
