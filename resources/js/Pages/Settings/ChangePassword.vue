<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>

<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const { user, is_owner } = defineProps({
    user: Object,
    is_owner: Boolean,
});

const form = useForm({
    old_password: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <div class="flex flex-col gap-3 mt-5">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Change Password</h2>
        </div>

        <!-- Content -->
        <div class="flex flex-col w-full gap-5">
            <!-- Profile Header -->
            <div
                class="rounded-md bg-gradient-to-r from-[#9747FF] to-[#99602B] p-1px"
            >
                <div
                    class="flex items-center justify-between w-full h-full p-5 rounded-md bg-dark-secondary"
                >
                    <div class="flex items-center gap-4">
                        <img
                            class="w-16 h-16 bg-gray-500 rounded-full"
                            :src="$page.props.auth.profile_img_path"
                        />

                        <div class="flex flex-col">
                            <h1 class="font-medium">John Doe</h1>
                            <span class="text-xs text-dark-text-secondary"
                                >johndoe@gmail.com</span
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form @submit.prevent="submit" class="flex flex-col gap-5">
                <div>
                    <InputLabel for="old_password" value="Old password" />

                    <TextInput
                        id="old_password"
                        type="text"
                        class="block w-full mt-1"
                        v-model="form.old_password"
                        required
                        autofocus
                        autocomplete="old_password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.old_password"
                    />
                </div>

                <div class="flex flex-col gap-3">
                    <div class="">
                        <InputLabel for="password" value="New Password" />

                        <TextInput
                            id="password"
                            type="password"
                            class="block w-full mt-1"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirm Password"
                        />

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="block w-full mt-1"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <div class="flex items-center">
                        <button
                            class="flex items-center justify-center w-full text-sm py-4 px-3 bg-dark-accent rounded-full active:bg-dark-gradient-primary hover:bg-dark-gradient-primary font-medium select-none"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update Password
                        </button>
                        <button></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
