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
        <div class="flex flex-col gap-2">
            <h2 class="text-lg font-semibold">
                About <span class="capitalize"> {{ user.profile.name }}</span>
            </h2>
            <p class="text-sm leading-6 text-dark-text-secondary">
                {{ user.profile.background }}
            </p>
        </div>
        <div class="flex flex-col gap-2 font-medium text-dark-text-secondary">
            <h3>Members</h3>
            <div class="flex flex-wrap gap-1">
                <span
                    class="px-3 py-1 text-sm border rounded-full bg-dark-secondary border-dark-border w-fit"
                    >Jogn Lennon</span
                >
                <span
                    class="px-3 py-1 text-sm border rounded-full bg-dark-secondary border-dark-border w-fit"
                    >Jogn Lennon</span
                >
                <span
                    class="px-3 py-1 text-sm border rounded-full bg-dark-secondary border-dark-border w-fit"
                    >Jogn Lennon</span
                >
            </div>
        </div>
    </div>
</template>
