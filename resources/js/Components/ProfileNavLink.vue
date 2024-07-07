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
    props.active ? "border-b-2 border-dark-brand px-3 text-sm" : ""
);
</script>

<template>
    <Link :href="href" :class="classes" class="py-2">
        <slot />
    </Link>
</template>
