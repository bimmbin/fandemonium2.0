<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    href: {
        type: String,
        required: true,
        default: false,
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
        v-if="href"
        :href="href"
        class="flex items-center w-full gap-2 px-5 py-3 text-sm leading-5 transition duration-150 ease-in-out select-none text-start hover:bg-dark-tertiary focus:outline-none focus:bg-dark-tertiary text-dark-text-primary"
        :class="{ 'text-red-500': red }"
    >
        <img :src="'/assets/' + img" alt="" />
        <slot />
    </Link>

    <div
        v-else
        :href="href"
        class="flex items-center w-full gap-2 px-5 py-3 text-sm leading-5 transition duration-150 ease-in-out select-none text-start hover:bg-dark-tertiary focus:outline-none focus:bg-dark-tertiary text-dark-text-primary cursor-pointer"
        :class="{ 'text-red-500': red }"
    >
        <img :src="'/assets/' + img" alt="" />
        <slot />
    </div>
</template>
