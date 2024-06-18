<script setup>
defineProps({
    value: {
        type: String,
    },
    required: {
        type: Boolean,
    },
});
</script>

<template>
    <div class="flex items-center gap-1">
        <label class="block text-xs font-medium">
            <span v-if="value">{{ value }}</span>
            <span v-else><slot /></span>
        </label>
        <span v-if="required" class="text-xs text-red-500">*</span>
    </div>
</template>
