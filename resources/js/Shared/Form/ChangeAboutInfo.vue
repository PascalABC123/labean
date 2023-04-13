<script setup>
import InputLabel from "@/Shared/Form/InputLabel.vue";
import {Link, useForm} from "@inertiajs/vue3";

let props = defineProps({
   about: '',
});

const form = useForm({
    about: props.about,
});

const submit = () => {
    form.post(route('profile.about.request'));
};
</script>

<template>
    <form @submit.prevent="submit">
        <div class="flex justify-between">
            <InputLabel for="about" value="О себе:"/>
            <Link class="text-sm hover:text-blue-600" as="button" @click="submit">Сохранить</Link>
        </div>

        <textarea
            rows="5"
            id="about"
            v-model="form.about"
            placeholder="Введите информацию о себе..."
            class="w-full h-32 resize-none shadow rounded-xl p-3 mt-3 focus:outline-none">
        </textarea>
    </form>
</template>
