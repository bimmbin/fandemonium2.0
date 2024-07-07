<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    href: {
        type: String,
        required: true,
    },
    img: {
        type: String,
        required: true,
    },
    red: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <Link
        :href="href"
        class="flex items-center w-full gap-2 px-5 py-3 text-sm leading-5 transition duration-150 ease-in-out text-start hover:bg-dark-tertiary focus:outline-none focus:bg-dark-tertiary text-dark-text-primary"
        :class="{ 'text-red-500': red }"
    >
        <img :src="'/assets/' + img" alt="" />
        <slot />
    </Link>
</template>
