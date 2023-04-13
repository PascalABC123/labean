<script setup>
import AppLogo from "@/Shared/AppLogo.vue";
import LoginButton from "@/Shared/Buttons/UserButton.vue";
</script>

<template>
    <div class="mx-auto w-4/5 py-2">
        <div class="flex justify-between">
            <AppLogo/>
            <div class="flex gap-6">
                <LoginButton/>
            </div>
        </div>
        <slot/>
    </div>
</template>

