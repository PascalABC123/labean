<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import InputLabel from "@/Shared/Form/InputLabel.vue";
import TextInput from "@/Shared/Form/TextInput.vue";
import InputError from "@/Shared/Form/InputError.vue";
import PrimaryButton from "@/Shared/Buttons/PrimaryButton.vue";
import Checkbox from "@/Shared/Buttons/Checkbox.vue";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('user.login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Авторизация"/>

    <section class="grid place-content-center w-full mt-40">
        <h1 class="text-4xl font-bold pb-10">Войти</h1>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email"/>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Пароль"/>

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password"/>
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember"/>
                    <span class="ml-2 text-sm text-gray-600">Запомнить меня</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('user.password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Забыли пароль?
                </Link>

                <PrimaryButton @click="submit" class="ml-10" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Автризоваться
                </PrimaryButton>
            </div>
        </form>
    </section>
</template>
