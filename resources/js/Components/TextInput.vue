<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="px-4 py-3 rounded-lg bg-dark-secondary border-dark-border focus:border-dark-gradient-primary focus:ring-dark-gradient-primary"
        v-model="model"
        ref="input"
    />
</template>
