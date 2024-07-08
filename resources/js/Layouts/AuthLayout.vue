<script setup>
import { ref } from "vue";
import "typeface-poppins";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div
        class="relative w-full min-h-screen text-dark-text-primary font-pop bg-dark-primary"
    >
        <!-- background image -->
        <div
            class="absolute opacity-10 w-full h-full bg-[url('/assets/main_bg.png')] bg-no-repeat bg-cover bg-opacity-70 bg-left-bottom"
        ></div>
        <!-- Main -->
        <div
            class="absolute z-10 flex flex-col justify-center w-full h-full px-5"
        >
            <div class="">
                <img src="/assets/logo_short.png" class="h-12" />
                <div class="mt-5">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>
