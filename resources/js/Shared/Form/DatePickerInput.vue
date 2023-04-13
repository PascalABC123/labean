<script setup>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import {ref} from "vue";

const date = ref(null);
</script>

<template>
    <VueDatePicker v-model="date" class="shadow"/>
</template>
