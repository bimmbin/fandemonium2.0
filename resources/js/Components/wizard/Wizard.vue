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
    <div class="flex items-center justify-between gap-2 mt-10">
        <div v-for="stepCount in stepCounts" class="flex flex-col w-full gap-2">
            <div class="flex gap-2 whitespace-nowrap">
                <div
                    v-if="step >= stepCount"
                    class="flex items-center justify-center w-5 h-5 p-3 rounded-full bg-dark-tertiary text-dark-text-primary"
                >
                    {{ stepCount }}
                </div>
                <slot :name="'title' + stepCount"></slot>
            </div>
            <div
                class="flex items-center justify-center h-5 rounded-full bg-gradient-to-r from-[#211C25] to-[#211C25]"
                :class="{
                    'from-dark-gradient-primary to-dark-gradient-secondary':
                        step >= stepCount,
                }"
            ></div>
        </div>
    </div>

    <div class="flex flex-col w-full">
        <div v-for="stepCount in stepCounts">
            <slot v-if="step == stepCount" :name="'step' + stepCount">
                this is {{ "step" + stepCount }}
            </slot>
        </div>

        <div class="flex items-center justify-between">
            <div v-if="step == 1"></div>
            <button v-if="step !== 1" @click="previousStep">Previous</button>
            <button v-if="step !== stepCounts" @click="nextStep">Next</button>
            {{ step.length }}
            <button v-if="step === stepCounts" @click="reset">
                Start Over
            </button>
        </div>
    </div>
</template>
