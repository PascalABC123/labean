<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import TextInput from "@/Shared/Form/TextInput.vue";
import HeaderInput from "@/Shared/Form/HeaderInput.vue";
import BodyInput from "@/Shared/Form/BodyInput.vue";
import InputLabel from "@/Shared/Form/InputLabel.vue";
import DatePickerInput from "@/Shared/Form/DatePickerInput.vue";
import PrimaryButton from "@/Shared/Buttons/PrimaryButton.vue";
import InputError from "@/Shared/Form/InputError.vue";

let props = defineProps({
    service: Object,
    specializations: Array,
});

const form = useForm({
    specialization_id: props.service.id,
    header: props.service.header,
    body: props.service.body,
    min_price: props.service.min_price,
    max_price: props.service.max_price,
    deadline: props.service.deadline,
    city: props.service.city,
    terms: false,
});

const submit = () => {
    form.post(route('service.update', {id: props.service.id}));
};
</script>

<template>
    <Head title="Создание заказа"/>

    <section class="mt-20 grid place-content-center">
        <h1 class="text-2xl text-gray-600 pb-10">создание заказа</h1>
        <form @submit.prevent="submit" class="w-fit">
            <div class="pb-10">
                <HeaderInput
                    id="header"
                    type="text"
                    v-model="form.header"
                    required
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.header"/>
            </div>
            <div class="mb-5">
                <div class="flex gap-6">
                    <span class="text-gray-600 text-sm my-auto">Категория</span>
                    <select id="specialization" v-model="form.specialization_id" class="shadow rounded text-sm p-1 focus:outline-none">
                        <option v-for="spec in props.specializations" :value="spec.id" :key="spec.id">{{spec.name}}</option>
                    </select>
                </div>
            </div>
            <div class="mb-5">
                <BodyInput
                    id="body"
                    type="text"
                    v-model="form.body"
                    required
                />
                <InputError class="mt-2" :message="form.errors.body"/>
            </div>
            <div class="flex gap-2 mb-3">
                <InputLabel for="minPrice" value="Мин. цена ₽"/>
                <TextInput
                    id="minPrice"
                    type="text"
                    v-model="form.min_price"
                    required
                />
                <InputError class="mt-2" :message="form.errors.min_price"/>
            </div>
            <div class="flex gap-2 mb-3">
                <InputLabel for="maxPrice" value="Макс. цена ₽"/>
                <TextInput
                    id="maxPrice"
                    type="text"
                    v-model="form.max_price"
                    required
                />
                <InputError class="mt-2" :message="form.errors.max_price"/>
            </div>
            <div class="flex gap-2">
                <InputLabel for="maxPrice" value="Город"/>
                <TextInput
                    id="city"
                    type="text"
                    v-model="form.city"
                    required
                />
                <InputError class="mt-2" :message="form.errors.city"/>
            </div>
            <div class="mt-5 mb-10">
                <DatePickerInput
                    id="deadline"
                    v-model="form.deadline"
                    required
                />
            </div>
            <PrimaryButton @click="submit" class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Сохранить
            </PrimaryButton>
        </form>
    </section>
</template>
