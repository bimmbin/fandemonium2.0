<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active ? "border-b-2 border-dark-brand" : ""
);
</script>

<template>
    <Link :href="href" :class="classes" class="px-3 py-2 text-sm">
        <slot />
    </Link>
</template>
