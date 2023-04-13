<script setup>
import {Head} from '@inertiajs/vue3';

defineProps({
    categories: Array,
});
</script>

<template>
    <Head title="Лабеан"/>

    <section class="mt-20 h-80">
        <div class="absolute w-full h-80 top-20 left-0 gradient"></div>
        <div class="relative text-white">
            <h1 class="text-5xl font-bold">Доверь работу специалистам!</h1>
            <p class="mt-10">
                На нашем сайте зарегистрировано множество специалистов, которые могут решить практически любую проблему.
                Администрация сайта проверяет каждого специалиста, запрашивая его паспортные данные, документы об
                образовании и прошлые работы, чтобы предоставить клиенту безопасность и лучший сервис, который вы можете
                найти среди других сайтов и приложений. Выбирая наш сервис вы можете не беспокоится за сохранения ваших
                персональных данных.
            </p>
        </div>
    </section>
    <section>
        <div class="text-3xl font-bold text-gray-600 mt-20 mb-8">
            Выберирайте из предложенных категорий
        </div>
        <div class="grid grid-cols-5 gap-y-2">
            <div class="flex" v-for="category in categories">
                <div class="bg-blue-100 rounded-xl shadow">
                    <img :src="category.picture">
                </div>
                <div class="ml-2 my-auto">{{ category.name }}</div>
            </div>
        </div>
    </section>
    <section>
        <div class="text-3xl font-bold text-gray-600 mt-32 mb-8">
            Как сделать заказ?
        </div>
        <div class="flex gap-6 mb-5">
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                1
            </div>
            <div class="my-auto">
                Зарегистрируйся на сайте под профилем заказчика
            </div>
        </div>
        <div class="flex gap-6 mb-5">
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                2
            </div>
            <div class="my-auto">
                Перейди в раздел "Заказчикам"
            </div>
        </div>
        <div class="flex gap-6 mb-5">
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                3
            </div>
            <div class="my-auto">
                Создай заявку на услугу, заполнив заголовок, описание, цену товара
            </div>
        </div>
        <div class="flex gap-6 mb-5">
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                4
            </div>
            <div class="my-auto">
                Опубликуй заявку
            </div>
        </div>
        <div class="flex gap-6">
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                5
            </div>
            <div class="my-auto">
                Жди, пока заинтересованный заказчик не откликнется на твою заявку
            </div>
        </div>
    </section>
    <section>
        <div class="text-3xl w-fit mx-auto font-bold text-gray-600 mt-32 mb-8">
            Заработай на том, что умеешь
        </div>
        <p class="text-gray-600">
            Вы хороши в написании текстов, ремонте домов или оказании услуг сантехника? Подумайте о том, чтобы применить
            свои навыки на нашей платформе, наша большая база клиентов с разными потребностями поможет тебе в
            этом. Помните, что зарабатывание денег требует усилий и времени, но при правильном мышлении и подходе любой
            может зарабатывать деньги на том, что у него есть.
        </p>
    </section>
    <section>
        <div class="ml-auto w-fit text-3xl font-bold text-gray-600 mt-32 mb-8">
            Как начать выполнять задания?
        </div>
        <div class="justify-end flex gap-6 mb-5">
            <div class="my-auto">
                Зарегистрируйся на сайте под профилем заказчика
            </div>
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                1
            </div>
        </div>
        <div class="justify-end flex gap-6 mb-5">
            <div class="my-auto">
                Перейди в раздел "Заказчикам"
            </div>
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                2
            </div>
        </div>
        <div class="justify-end flex gap-6 mb-5">
            <div class="my-auto">
                Создай заявку на услугу, заполнив заголовок, описание, цену товара
            </div>
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                3
            </div>
        </div>
        <div class="justify-end flex gap-6 mb-5">
            <div class="my-auto">
                Опубликуй заявку
            </div>
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                4
            </div>
        </div>
        <div class="justify-end flex gap-6">
            <div class="my-auto">
                Жди, пока заинтересованный заказчик не откликнется на твою заявку
            </div>
            <div class="text-white bg-gray-600 font-bold h-fit px-4 py-2 rounded-3xl">
                5
            </div>
        </div>
    </section>
</template>

<style>
.gradient {
    background-image: url("https://pcvector.net/uploads/posts/2018-02/1517572511_bg-svg-gradient-min.png");
    background-size: 100%;
}
</style>
