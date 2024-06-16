<script setup>
import { ref } from "vue";

defineProps({
    stepCounts: {
        type: Number,
        default: 3,
    },
});

const step = ref(1);
const user = ref({
    name: "",
    email: "",
});

const nextStep = () => {
    step.value++;
};

const previousStep = () => {
    step.value--;
};

const reset = () => {
    step.value = 1;
    user.value = {
        name: "",
        email: "",
    };
};
</script>

<template>
    <div class="flex items-center justify-between gap-2 mt-2">
        <div v-for="stepCount in stepCounts" class="flex flex-col w-full gap-2">
            <div
                class="flex items-center gap-1 text-xs whitespace-nowrap opacity-20"
                :class="{
                    '!opacity-100': step >= stepCount,
                }"
            >
                <div
                    class="flex items-center justify-center w-5 h-5 p-2 border rounded-full bg-dark-secondary text-dark-text-primary border-dark-border"
                >
                    {{ stepCount }}
                </div>
                <slot :name="'title' + stepCount"></slot>
            </div>
            <div
                class="flex items-center justify-center h-3 rounded-full bg-gradient-to-r from-[#211C25] to-[#211C25]"
                :class="{
                    'from-dark-gradient-primary to-dark-gradient-secondary':
                        step >= stepCount,
                }"
            ></div>
        </div>
    </div>

    <div class="flex flex-col w-full">
        <div v-for="stepCount in stepCounts">
            <div :class="{ hidden: step != stepCount }">
                <slot :name="'step' + stepCount"></slot>
            </div>
        </div>

        <div class="flex items-center justify-between gap-2 mt-5">
            <div v-if="step == 1" class="w-full"></div>
            <button
                v-if="step !== 1"
                @click="previousStep"
                class="w-full py-3 text-center border rounded-full border-dark-text-primary"
            >
                Back
            </button>
            <button
                v-if="step !== stepCounts"
                @click="nextStep"
                class="w-full py-3 text-center border rounded-full border-dark-accent bg-dark-accent"
            >
                Next
            </button>
            {{ step.length }}
            <button v-if="step === stepCounts" @click="reset">
                Start Over
            </button>
        </div>
    </div>
</template>
