<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    username: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <AuthLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <div class="flex flex-col gap-2 mb-5">
            <h1 class="text-xl font-semibold">Welcome to Fandemonium</h1>
            <span class="text-xs text-dark-text-secondary"
                >Connect with your favorite artists and join a vibrant community
                of music lovers.</span
            >
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-5">
            <div>
                <InputLabel for="username" value="Username" />

                <TextInput
                    id="username"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.username"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.username" />
            </div>

            <div class="flex flex-col gap-3">
                <div class="">
                    <InputLabel for="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        class="block w-full mt-1"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                <div class="flex justify-between w-full">
                    <label class="flex items-center">
                        <Checkbox
                            name="remember"
                            v-model:checked="form.remember"
                        />
                        <span
                            class="text-xs text-gray-600 ms-2 dark:text-gray-400"
                            >Remember me</span
                        >
                    </label>
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-xs underline text-dark-text-secondary"
                    >
                        Forgot your password?
                    </Link>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <div class="flex items-center">
                    <PrimaryButton
                        class="flex items-center justify-center w-full text-xs"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>

                <div class="flex items-center justify-between w-full">
                    <span class="text-xs text-gray-600 dark:text-gray-400"
                        >Dont have an account?</span
                    >
                    <Link :href="route('register')" class="text-sm">
                        Create an account
                    </Link>
                </div>
            </div>
        </form>
    </AuthLayout>
</template>
