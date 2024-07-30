<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>

<script setup>
// import { Head, Link } from "@inertiajs/vue3";

// const { user, is_owner } = defineProps({
//     user: Object,
//     is_owner: Boolean,
// });
</script>

<template>
    <div class="flex flex-col gap-5">
        <!-- Profile Header -->
        <div
            class="rounded-md bg-gradient-to-r from-[#9747FF] to-[#99602B] p-1px"
        >
            <div
                class="flex items-center justify-between w-full h-full p-4 rounded-md bg-dark-secondary"
            >
                <div class="flex items-center gap-2">
                    <img
                        class="w-12 h-12 bg-gray-500 rounded-full"
                        :src="$page.props.auth.profile_img_path"
                    />

                    <div class="flex flex-col">
                        <h1 class="font-medium">John Doe</h1>
                        <span class="text-xs text-dark-text-secondary"
                            >johndoe@gmail.com</span
                        >
                    </div>
                </div>
                <div
                    class="flex items-center justify-center p-2 rounded bg-dark-tertiary"
                >
                    <img src="/assets/edit.svg" alt="" />
                </div>
            </div>
        </div>

        <!-- Location -->
        <div class="flex flex-col gap-1">
            <div class="flex items-center justify-between">
                <h2 class="font-medium">Location</h2>
                <span class="text-xs underline text-dark-brand"
                    >Sync current location</span
                >
            </div>
            <div
                class="flex items-center gap-2 p-5 rounded-md bg-dark-secondary"
            >
                <img src="/assets/location_mark.svg" alt="" />
                <span class="text-sm text-dark-text-secondary"
                    >Tarlac, Philippines</span
                >
            </div>
        </div>

        <!-- Fandemonium -->
        <div class="flex flex-col gap-3 p-5 rounded-md bg-dark-secondary">
            <div class="flex items-center justify-between">
                <h1 class="font-semibold">My Fandemonium</h1>
                <div
                    class="flex items-center justify-center px-5 py-1 text-sm font-semibold text-white rounded-full bg-dark-accent"
                >
                    103
                </div>
            </div>
            <div class="flex flex-col gap-6">
                <div class="flex items-center gap-2">
                    <img
                        class="w-10 h-10 bg-gray-500 rounded-full"
                        :src="$page.props.auth.profile_img_path"
                    />
                    <div class="flex flex-col">
                        <h1 class="text-sm">John Doe</h1>
                        <span class="text-xs text-dark-text-secondary"
                            >since Jan 25, 2023</span
                        >
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <img
                        class="w-10 h-10 bg-gray-500 rounded-full"
                        :src="$page.props.auth.profile_img_path"
                    />
                    <div class="flex flex-col">
                        <h1 class="text-sm">John Doe</h1>
                        <span class="text-xs text-dark-text-secondary"
                            >since Jan 25, 2023</span
                        >
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <img
                        class="w-10 h-10 bg-gray-500 rounded-full"
                        :src="$page.props.auth.profile_img_path"
                    />
                    <div class="flex flex-col">
                        <h1 class="text-sm">John Doe</h1>
                        <span class="text-xs text-dark-text-secondary"
                            >since Jan 25, 2023</span
                        >
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <img
                        class="w-10 h-10 bg-gray-500 rounded-full"
                        :src="$page.props.auth.profile_img_path"
                    />
                    <div class="flex flex-col">
                        <h1 class="text-sm">John Doe</h1>
                        <span class="text-xs text-dark-text-secondary"
                            >since Jan 25, 2023</span
                        >
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <img
                        class="w-10 h-10 bg-gray-500 rounded-full"
                        :src="$page.props.auth.profile_img_path"
                    />
                    <div class="flex flex-col">
                        <h1 class="text-sm">John Doe</h1>
                        <span class="text-xs text-dark-text-secondary"
                            >since Jan 25, 2023</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
