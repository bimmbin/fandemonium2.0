<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import ArtistProfileLayout from "@/Layouts/ArtistProfileLayout.vue";

export default {
    layout: [MainLayout, ArtistProfileLayout],
};
</script>

<script setup>
import { Head, Link } from "@inertiajs/vue3";

const { user } = defineProps({
    user: Object,
});
</script>

<template>
    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Fans</h2>

            <span class="text-xs cursor-pointer text-dark-text-secondary"
                >View All</span
            >
        </div>

        <!-- Content -->
    </div>
</template>
