<script setup>
defineProps({
    post: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="flex flex-col w-full gap-5 p-5 bg-dark-secondary rounded-xl">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gray-500 rounded-full"></div>
                <div class="flex flex-col">
                    <h2>The Beatles</h2>
                    <span class="text-xs text-dark-text-secondary"
                        >5 minutes ago</span
                    >
                </div>
            </div>
            <img src="assets/settings.svg" class="h-6 opacity-60" />
        </div>
        <!-- Content -->
        <!-- <pre></pre> -->
        <div class="w-full rounded-lg h-60 bg-dark-tertiary"></div>
    </div>
</template>
