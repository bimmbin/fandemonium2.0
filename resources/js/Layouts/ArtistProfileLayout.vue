<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import ProfileNavLink from "@/Components/ProfileNavLink.vue";
</script>

<template>
    <div class="relative w-full h-60">
        <img
            class="object-cover w-full h-full bg-dark-tertiary rounded-xl"
            :src="$page.props.user.profile.profile_img_path"
        />
        <div
            class="absolute bottom-0 left-0 z-10 w-full h-[30%] rounded-b-xl px-5 py-3 bg-dark-secondary bg-opacity-70 flex justify-between items-center"
        >
            <div class="flex flex-col">
                <h1
                    class="text-2xl font-semibold text-white capitalize drop-shadow-xl"
                >
                    {{ $page.props.user.profile.name }}
                </h1>
                <div class="flex items-center gap-2">
                    <img src="/assets/star.svg" alt="" />
                    <span class="text-sm text-dark-text-secondary">Fans</span>
                </div>
            </div>

            <!-- Follow (for fans) -->
            <div
                class="flex gap-2 px-4 py-2 text-sm rounded-full cursor-pointer bg-dark-accent itemcenter"
            >
                <img src="/assets/add.svg" alt="" />
                <span>Follow</span>
            </div>

            <!-- Edit (for artist profile owner) -->
            <div
                class="flex gap-2 px-4 py-2 text-sm border rounded-full cursor-pointer border-dark-text-primary itemcenter"
            >
                <span>Edit</span>
            </div>
        </div>
    </div>
    <div class="flex gap-2 mt-3 border-b border-dark-border">
        <ProfileNavLink
            :href="route('artist.posts.index', $page.props.user.username)"
            :active="
                route().current('artist.posts.index', $page.props.user.username)
            "
        >
            Posts
        </ProfileNavLink>
        <ProfileNavLink
            :href="route('artist.events.index', $page.props.user.username)"
            :active="
                route().current(
                    'artist.events.index',
                    $page.props.user.username
                )
            "
        >
            Events
        </ProfileNavLink>
        <ProfileNavLink
            :href="route('artist.about.index', $page.props.user.username)"
            :active="
                route().current('artist.about.index', $page.props.user.username)
            "
        >
            About
        </ProfileNavLink>
        <ProfileNavLink
            :href="route('artist.fans.index', $page.props.user.username)"
            :active="
                route().current('artist.fans.index', $page.props.user.username)
            "
        >
            Fans
        </ProfileNavLink>
    </div>

    <div class="py-5">
        <slot></slot>
    </div>
</template>
