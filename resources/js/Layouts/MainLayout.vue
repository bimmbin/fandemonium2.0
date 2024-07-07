<script setup>
import { ref } from "vue";
import "typeface-poppins";

import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div
        class="w-full min-h-screen px-5 bg-dark-primary text-dark-text-primary font-pop"
    >
        <div class="flex items-center justify-between py-5">
            <img src="/assets/logo.png" class="h-12" />

            <Dropdown v-if="!$page.props.auth.user" align="right" width="48">
                <template #trigger>
                    <img
                        src="/assets/burger.svg"
                        class="h-5 cursor-pointer select-none"
                    />
                </template>

                <template #content>
                    <DropdownLink :href="route('login')" img="user.svg">
                        Log in
                    </DropdownLink>
                </template>
            </Dropdown>

            <Dropdown v-if="$page.props.auth.user" align="right" width="48">
                <template #trigger>
                    <div
                        class="flex items-center gap-2 px-3 py-2 rounded-md cursor-pointer select-none bg-dark-secondary"
                    >
                        <div class="w-6 h-6 bg-gray-500 rounded-full"></div>
                        <img src="/assets/down.svg" class="h-2" />
                    </div>
                </template>

                <template #content>
                    <DropdownLink :href="route('profile.edit')" img="user.svg">
                        Profile
                    </DropdownLink>
                    <DropdownLink
                        :href="route('logout')"
                        img="back.svg"
                        method="post"
                        as="button"
                    >
                        Log Out
                    </DropdownLink>
                </template>
            </Dropdown>
        </div>
        <div class="">
            <slot></slot>
        </div>
    </div>
</template>
