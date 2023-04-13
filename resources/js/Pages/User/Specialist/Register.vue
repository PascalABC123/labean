<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import InputLabel from "@/Shared/Form/InputLabel.vue";
import InputError from "@/Shared/Form/InputError.vue";
import TextInput from "@/Shared/Form/TextInput.vue";
import PrimaryButton from "@/Shared/Buttons/PrimaryButton.vue";

const form = useForm({
    name: '',
    surname: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('user.register.specialist'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<script>
import SecondaryLayout from "@/Layouts/SecondaryLayout.vue";

export default {
    layout: SecondaryLayout,
}
</script>

<template>
    <Head title="Регистрация"/>

    <section class="grid place-content-center w-full mt-40">
        <h1 class="text-4xl font-bold pb-10">Специалист</h1>
        <form @submit.prevent="submit" class="w-fit">
            <div>
                <InputLabel for="name" value="Имя"/>

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name"/>
            </div>

            <div class="mt-4">
                <InputLabel for="surname" value="Фамилия"/>

                <TextInput
                    id="surname"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.surname"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name"/>
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email"/>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <div class="mt-4">
                <InputLabel for="phone" value="Телефон"/>

                <TextInput
                    id="phone"
                    type="tel"
                    class="mt-1 block w-full"
                    v-model="form.phone"
                    required
                    autocomplete="telephone"
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
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password"/>
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Подтвердите пароль"/>

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('user.login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Уже зарегистрированы?
                </Link>

                <PrimaryButton @click="submit" class="ml-10" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Зарегистрироваться
                </PrimaryButton>
            </div>
        </form>
    </section>
</template>
