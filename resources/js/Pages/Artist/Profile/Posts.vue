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

const { user, is_owner } = defineProps({
    user: Object,
    is_owner: Boolean,
});
</script>

<template>
    <div class="flex flex-col gap-3">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">
                <span class="capitalize"> {{ user.profile.name }}</span> Posts
            </h2>
            <div
                v-if="$page.props.is_owner"
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
