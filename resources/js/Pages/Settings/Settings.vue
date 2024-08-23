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

<template>
    <div class="flex flex-col gap-3 mt-5">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Settings</h2>
        </div>

        <!-- Content -->
        <div class="flex flex-col w-full">
            <Link
                :href="route('saved-locations.index')"
                class="flex items-center justify-between py-4 px-3 border-b border-dark-border w-full hover:bg-dark-secondary active:bg-dark-secondary"
            >
                <span class="text-sm">Saved Locations</span>
                <img src="/assets/down.svg" class="h-2 -rotate-90" />
            </Link>
            <Link
                :href="route('change-password.index')"
                class="flex items-center justify-between py-4 px-3 border-b border-dark-border w-full hover:bg-dark-secondary active:bg-dark-secondary"
            >
                <span class="text-sm">Change Password</span>
                <img src="/assets/down.svg" class="h-2 -rotate-90" />
            </Link>
            <Link
                class="flex items-center justify-between py-4 px-3 border-b border-dark-border w-full hover:bg-dark-secondary active:bg-dark-secondary"
            >
                <span class="text-sm">Help and Support</span>
                <img src="/assets/down.svg" class="h-2 -rotate-90" />
            </Link>
        </div>
    </div>
</template>
