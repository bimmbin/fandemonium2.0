<script setup>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    username: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <AuthLayout>
        <Head title="Register" />

        <div class="flex flex-col gap-2 mb-5">
            <h1 class="text-xl font-semibold">Create Your Account</h1>
            <span class="text-xs text-dark-text-secondary"
                >Connect with your favorite artists and join a vibrant community
                of music lovers.</span
            >
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-5">
            <div class="">
                <InputLabel for="username" value="Username" />

                <TextInput
                    id="username"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.username"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.username" />
            </div>

            <div class="">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="block w-full mt-1"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

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

            <div class="flex flex-col gap-3">
                <div class="flex items-center">
                    <PrimaryButton
                        class="flex items-center justify-center w-full text-xs"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Register
                    </PrimaryButton>
                </div>

                <div class="flex items-center justify-between w-full">
                    <span class="text-xs text-gray-600 dark:text-gray-400"
                        >Already registered?</span
                    >
                    <Link :href="route('login')" class="text-sm underline">
                        Log in
                    </Link>
                </div>
            </div>
        </form>
    </AuthLayout>
</template>
