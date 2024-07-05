<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <MainLayout>
        <div class="flex flex-col gap-5">
            <!-- Search Input -->
            <input
                type="text"
                class="w-full px-5 py-3 text-sm border rounded-full border-dark-border bg-dark-secondary"
                placeholder="Search artist"
            />

            <!-- Map Section -->
            <div class="flex flex-col gap-3">
                <h2 class="text-lg font-semibold">Find Artist Events</h2>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2">
                        <img src="/assets/arrow_down.svg" class="w-4 h-4" />
                        <img src="/assets/location_mark.svg" class="w-5 h-5" />
                        <span class="text-dark-text-secondary"
                            >Tarlac, Philippines</span
                        >
                    </div>
                    <div class="underline text-dark-brand">Change</div>
                </div>
                <div
                    class="w-full border bg-dark-tertiary rounded-xl h-60 border-dark-border"
                ></div>
            </div>

            <!-- Post Card Section -->
        </div>
    </MainLayout>
</template>
