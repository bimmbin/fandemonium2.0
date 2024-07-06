<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const emit = defineEmits(["close_dialog", "item"]);

const exit = ref("/assets/exit.svg");
const addItem = ref("");

const { item } = defineProps({
    item: String,
});

const submit = () => {
    emit("item", addItem);
    emit("close_dialog");
};
</script>

<template>
    <div
        class="absolute top-0 left-0 z-50 flex items-center justify-center w-full h-screen px-10 py-5 bg-black cursor-default max-md:px-5 bg-opacity-70"
    >
        <div
            class="w-[400px] mx-auto max-md:w-screen max-md:px-5 py-5 max-sm:py-5 text-dark-text-primary max-xl:px-10 bg-dark-secondary rounded-xl px-5"
        >
            <!-- Dialog Content -->
            <!-- Edit header -->
            <div
                class="flex flex-col items-center justify-between w-full gap-5"
            >
                <div class="flex items-center justify-between w-full">
                    <h1 class="text-xl font-semibold capitalize">
                        Add {{ item }}
                    </h1>
                    <img
                        :src="exit"
                        @click="$emit('close_dialog')"
                        class="h-5 cursor-pointer"
                    />
                </div>
            </div>
            <form
                @submit.prevent="submit"
                class="flex flex-col gap-3 pb-5 mt-3"
            >
                <div class="flex flex-col gap-3">
                    <div class="flex-1">
                        <InputLabel
                            for="item"
                            :value="item + ' Name'"
                            class="capitalize"
                        />

                        <TextInput
                            id="item"
                            type="text"
                            class="block w-full mt-1"
                            v-model="addItem"
                            required
                            autofocus
                            autocomplete="item"
                        />
                    </div>
                </div>
                <PrimaryButton class="flex items-center justify-center w-full"
                    >Submit</PrimaryButton
                >
            </form>
        </div>
    </div>
</template>
