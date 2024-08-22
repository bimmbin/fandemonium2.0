<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>

<script setup>
import { Head, Link } from "@inertiajs/vue3";

const { user, is_owner } = defineProps({
    user: Object,
    is_owner: Boolean,
});
</script>

<template>Settings</template>
