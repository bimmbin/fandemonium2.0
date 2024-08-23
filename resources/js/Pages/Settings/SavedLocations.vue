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
            <h2 class="text-lg font-semibold">Saved Locations</h2>
            <div
                class="flex items-center justify-center gap-2 bg-dark-accent px-3 py-2 text-xs rounded-full active:bg-dark-brand cursor-pointer select-none"
            >
                <img src="/assets/add.svg" alt="" />
                <span>Add Location</span>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col w-full mt-3 gap-2 select-none">
            <!-- Used location -->
            <div
                class="flex items-center justify-between py-4 px-5 border-2 border-dark-brand w-full rounded-lg"
            >
                <div class="flex gap-2 items-center">
                    <img src="/assets/location_mark.svg" alt="" />
                    <span class="text-sm text-dark-text-secondary"
                        >Tarlac, Philippines</span
                    >
                </div>
                <span class="text-sm text-dark-text-secondary">In Use</span>
            </div>

            <!-- Options location -->
            <div
                class="flex items-center justify-between bg-dark-secondary py-4 px-5 border-2 border-dark-secondary hover:border-dark-brand w-full rounded-lg hover:bg-dark-secondary active:bg-dark-secondary cursor-pointer"
            >
                <div class="flex gap-2 items-center">
                    <img src="/assets/location_mark.svg" alt="" />
                    <span class="text-sm text-dark-text-secondary"
                        >Nueva Ecija, Philippines</span
                    >
                </div>
                <span class="text-sm text-dark-brand underline"
                    >Use Location</span
                >
            </div>
            <div
                class="flex items-center justify-between bg-dark-secondary py-4 px-5 border-2 border-dark-secondary hover:border-dark-brand w-full rounded-lg hover:bg-dark-secondary active:bg-dark-secondary cursor-pointer"
            >
                <div class="flex gap-2 items-center">
                    <img src="/assets/location_mark.svg" alt="" />
                    <span class="text-sm text-dark-text-secondary"
                        >Nueva Ecija, Philippines</span
                    >
                </div>
                <span class="text-sm text-dark-brand underline"
                    >Use Location</span
                >
            </div>

            <!-- Note -->
            <span class="text-center text-xs text-dark-text-secondary mt-5"
                >Changing location will show different content based on your
                location in used.</span
            >
        </div>
    </div>
</template>
