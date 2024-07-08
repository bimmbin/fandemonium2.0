<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import ArtistProfileLayout from "@/Layouts/ArtistProfileLayout.vue";

export default {
    layout: [MainLayout, ArtistProfileLayout],
};
</script>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import PostCard from "@/Components/PostCard.vue";

const { user } = defineProps({
    user: Object,
});
</script>

<template>
    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">
                <span class="capitalize"> {{ user.profile.name }}</span> Posts
            </h2>
            <div
                class="flex gap-2 px-4 py-2 text-sm rounded-full cursor-pointer bg-dark-accent itemcenter"
            >
                <img src="/assets/add.svg" alt="" />
                <span>Add Post</span>
            </div>
        </div>

        <!-- Content -->
        <PostCard />
    </div>
</template>
