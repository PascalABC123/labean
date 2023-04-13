<script setup>
import SecondaryButton from "@/Shared/Buttons/SecondaryButton.vue";
import {router} from "@inertiajs/vue3";
import {ref} from "vue";

let props = defineProps({
    chats: Array,
    chat: Object,
})

const message = ref('')

let sendMessage = () => {
    router.post(route('chat.send.message', {id: props.chat.data[0].id}), {message: message})
}
</script>

<template>
    <section class="min-h-screen p-28">
        <h1 class="text-3xl font-bold mb-5">Чаты</h1>
        <div class="w-full h-96 rounded shadow bg-gray-100 relative">
            <div v-if="chats.data.length == null" class="">У вас пока нет начатых чатов.</div>
            <div v-else class="flex">
                <div class="h-96 px-2 py-5 bg-gray-200">
                    <div class="flex shadow gap-3 bg-gray-300 rounded" v-for="chat in chats.data">
                        <img class="h-16 rounded"
                            :src="chat.person.avatar? chat.person.avatar: 'https://avatars.mds.yandex.net/i?id=c071b869a097dc08c30888218ef0be9234e78ad5-9095316-images-thumbs&n=13'">
                        <div class="my-auto mr-5">
                            {{ chat.person.name }}
                        </div>
                    </div>
                </div>
                <div class="p-2 overflow-auto w-full">
                    <div v-for="message in chat.data[0].messages" class="pb-2 w-full flex">
                        <div v-if="message.user_id === $page.props.auth.user.id" class="ml-auto bg-gray-900 text-white rounded-xl p-2 px-3">{{message.message}}</div>
                        <div v-else class="bg-gray-300 text-gray-900 rounded-xl p-2 px-3">{{message.message}}</div>
                    </div>
                </div>
            </div>
            <div class="flex absolute bottom-3 right-32 gap-2">
                <input v-model="message" type="text" class="w-72 h-10 p-3 rounded-xl shadow bg-gray-600 text-white focus:outline-none" placeholder="Введите сообщение">
                <SecondaryButton @click="sendMessage">Отправить</SecondaryButton>
            </div>
        </div>
    </section>
</template>
