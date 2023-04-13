<script setup>
import AppLogo from "@/Shared/AppLogo.vue";
import NavLink from "@/Shared/NavLink.vue";
import LoginButton from "@/Shared/Buttons/UserButton.vue";
import RegisterButton from "@/Shared/Buttons/PrimaryButton.vue";
import Notifications from "@/Shared/Notifications.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="mx-auto w-4/5 py-2 min-h-screen pb-32">
        <div class="flex justify-between">
            <AppLogo/>
            <div class="flex gap-6">
                <NavLink :href="route('customer')" :active="$page.component==='Customer'">Заказчикам</NavLink>
                <NavLink :href="route('specialist')" :active="$page.component==='Specialist'">Специалистам</NavLink>
            </div>
            <div class="flex gap-6">
                <Notifications class="my-auto" v-if="$page.props.notifications" :notifications="$page.props.notifications.data"/>
                <LoginButton/>
                <RegisterButton v-if="$page.props.auth.user==null" :href="route('user.profile')">Создать профиль</RegisterButton>
            </div>
        </div>
        <slot/>
    </div>
    <div class="bg-black w-full h-80 text-white py-20">
        <div class="w-4/5 mx-auto flex justify-between">
            <div class="font-bold text-xl">Лабеан</div>
            <div class="text-sm">
                <div class="mb-2">Заказчикам</div>
                <div class="mb-2">Специалистам</div>
                <div class="">Создать заказ</div>
            </div>
            <div class="">
                <div class="">Авторизация</div>
                <div class="">Регистрация</div>
            </div>
        </div>

    </div>
</template>

