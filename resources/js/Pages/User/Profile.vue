<script setup>
import {Head} from '@inertiajs/vue3';
import SecondaryButton from "@/Shared/Buttons/SecondaryButton.vue";
</script>

<script>
import SecondaryLayout from "@/Layouts/SecondaryLayout.vue";

export default {
    layout: SecondaryLayout,
}
</script>

<template>
    <Head title="Регистрация"/>

    <section class="py-20">
        <div class="flex justify-around">
            <div class="w-1/3">
                <h2 class="font-bold text-4xl mb-10">Доверь работу профессионалам</h2>
                <p class="mb-10">
                    На нашем сайте зарегистрировано множество специалистов, которые могут решить практически любую
                    проблему. Администрация сайта проверяет каждого специалиста, чтобы предоставить клиенту безопасность
                    и лучший сервис, который вы можете найти среди других сайтов и приложений.
                </p>
                <SecondaryButton :href="route('user.register.customer')">Заказать услугу</SecondaryButton>
            </div>
            <div class="w-1/3">
                <img class="rounded-3xl"
                     src="https://rector.by/upload/content/img_800/1568096531_statya_rektor_1_tz_20.png">
            </div>
        </div>
    </section>
    <section class="py-20">
        <div class="flex justify-around">
            <div class="w-1/3">
                <img class="rounded-3xl" src="https://images-ext-2.discordapp.net/external/t9hWQrVvDHTSAsqzWVP_zUT6T8hcShmT7E72Tz9T4UE/https/4creates.com/templates/4DEV/images/catimg/prgr.jpg?width=702&height=468">
            </div>
            <div class="w-1/3">
                <h2 class="font-bold text-4xl mb-10">Заработай на том, что умеешь</h2>
                <p class="mb-10">
                    Вы хороши в написании текстов, ремонте домов или оказании услуг сантехника? Подумайте о том, чтобы
                    применить свои навыки на нашей платформе, наша большая база клиентов с разными потребностями поможет
                    тебе в этом.
                </p>
                <SecondaryButton :href="route('user.register.specialist')">Стать исполнителем</SecondaryButton>
            </div>
        </div>
    </section>
</template>
