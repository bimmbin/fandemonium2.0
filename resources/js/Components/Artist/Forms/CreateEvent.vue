<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const emit = defineEmits(["close_dialog"]);

const exit = ref("/assets/exit.svg");

const { student } = defineProps({
    student: Object,
});

const form = useForm({
    student_number: student.student_number,
    first_name: student.first_name,
    last_name: student.last_name,
    middle_name: student.middle_name,
});

const submit = () => {
    form.post(route("students.update", student.id), {
        onSuccess: () => emit("close_dialog"),
    });
};
</script>

<template>
    <div
        class="absolute top-0 left-0 flex items-center justify-center w-full h-screen px-10 py-5 bg-black cursor-default max-md:px-5 bg-opacity-70"
    >
        <div
            class="w-[400px] mx-auto max-md:w-screen max-md:px-5 py-5 max-sm:py-5 text-black max-xl:px-10 bg-blue-100 rounded-xl px-5"
        >
            <!-- Dialog Content -->
            <!-- Edit header -->
            <div
                class="flex flex-col items-center justify-between w-full gap-5"
            >
                <div class="flex items-center justify-between w-full">
                    <h1 class="text-xl font-semibold text-blue-800">
                        Edit Student
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
                class="flex flex-col gap-3 pb-5 mt-3 border-b border-blue-300"
            >
                <div class="flex flex-col gap-3">
                    <div class="flex-1">
                        <InputLabel for="student_number" value="Student ID" />

                        <TextInput
                            id="student_number"
                            type="text"
                            class="block w-full mt-1"
                            v-model="form.student_number"
                            required
                            autofocus
                            autocomplete="student_number"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.student_number"
                        />
                    </div>
                    <div class="flex-1">
                        <InputLabel for="first_name" value="First Name" />

                        <TextInput
                            id="first_name"
                            type="text"
                            class="block w-full mt-1"
                            v-model="form.first_name"
                            required
                            autofocus
                            autocomplete="first_name"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.first_name"
                        />
                    </div>
                </div>

                <!-- second row  -->
                <div class="flex flex-col gap-3">
                    <div class="flex-1">
                        <InputLabel for="last_name" value="Last Name" />

                        <TextInput
                            id="last_name"
                            type="text"
                            class="block w-full mt-1"
                            v-model="form.last_name"
                            required
                            autofocus
                            autocomplete="last_name"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.last_name"
                        />
                    </div>
                    <div class="flex-1">
                        <InputLabel for="middle_name" value="Middle Name" />

                        <TextInput
                            id="middle_name"
                            type="text"
                            class="block w-full mt-1"
                            v-model="form.middle_name"
                            required
                            autofocus
                            autocomplete="middle_name"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.middle_name"
                        />
                    </div>
                </div>
                <PrimaryButton class="w-full">Update</PrimaryButton>
            </form>
        </div>
    </div>
</template>
