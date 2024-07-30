<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const emit = defineEmits(["close"]);

// upload picture
const url = ref();

const previewImage = (e) => {
    const file = e.target.files;
    url.value = URL.createObjectURL(file[0]);
    console.log(URL.createObjectURL(file[0]));
};

const resetImage = () => {
    form.image = null;
    url.value = null;
};

const form = useForm({
    name: "",
    image: "",
});

const submit = () => {
    form.post(route("fan.finish.profile.store"), {
        onSuccess: () => emit("close"),
    });
};
</script>

<template>
    <!-- inputs -->
    <form
        @submit.prevent="submit"
        class="flex flex-col gap-3 text-dark-text-primary"
    >
        <!-- Image -->
        <div v-if="url" class="relative">
            <img
                :src="url"
                alt=""
                class="object-cover w-full rounded-lg h-60"
            />
            <div
                class="absolute top-0 right-0 flex items-center gap-2 px-3 py-2 mt-5 mr-5 border cursor-pointer select-none opacity-80 border-dark-text-secondary rounded-xl bg-dark-secondary hover:bg-dark-tertiary"
                @click="resetImage()"
            >
                <img src="/assets/exit.svg" alt="" />
                <span>reset</span>
            </div>
        </div>
        <label
            v-else
            for="file"
            class="flex flex-col items-center justify-center w-full gap-3 border-2 border-dashed rounded-lg h-60 border-dark-brand bg-dark-secondary"
        >
            <img src="/assets/image.svg" class="h-16" />
            <div class="font-semibold">Upload Profile</div>
            <div
                class="flex items-center gap-2 px-5 py-2 rounded-full bg-dark-accent"
            >
                <img src="/assets/add.svg" class="h-3" />
                <span>Choose</span>
            </div>
        </label>
        <!-- Input File -->
        <input
            type="file"
            id="file"
            class="w-full px-3 py-2 bg-input_bg rounded-t-md"
            @input="form.image = $event.target.files[0]"
            @change="previewImage"
            hidden
            accept="image/*"
        />
        <!-- Name -->
        <div>
            <InputLabel for="name" value="Full Name" />

            <TextInput
                id="name"
                type="text"
                class="block w-full"
                v-model="form.name"
                autocomplete="name"
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <!-- submit button -->
        <PrimaryButton
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
        >
            Submit
        </PrimaryButton>
    </form>
</template>

<style>
input[type="time"]::-webkit-calendar-picker-indicator,
input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(100%);
}
</style>
