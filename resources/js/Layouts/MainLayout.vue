<script setup>
import { ref } from "vue";
import "typeface-poppins";

import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import Notification from "@/Components/Notification/Notification.vue";
import { Link } from "@inertiajs/vue3";
import ArtistNav from "@/Components/Navigations/ArtistNav.vue";
import FanNav from "@/Components/Navigations/FanNav.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div
        class="w-full min-h-screen px-5 bg-dark-primary text-dark-text-primary font-pop"
    >
        <div class="flex items-center justify-between py-5">
            <Link :href="route('landingpage.index')">
                <img src="/assets/logo.png" class="h-12 cursor-pointer" />
            </Link>

            <div class="flex gap-4 items-center">
                <!-- Notification -->
                <Notification
                    v-if="$page.props.auth.user"
                    align="right"
                    width="48"
                >
                    <template #trigger>
                        <img src="/assets/notification.svg" alt="" />
                    </template>

                    <template #content>
                        <div class="flex flex-col">
                            <div
                                class="flex items-center justify-between whitespace-nowrap py-5 px-5"
                            >
                                <h2 class="font-medium text-lg">
                                    Notifications
                                </h2>
                                <span
                                    class="text-dark-brand text-xs cursor-pointer"
                                    >Mark all as read</span
                                >
                            </div>
                            <div class="flex flex-col">
                                <div
                                    class="flex items-center gap-2 py-3 w-full hover:bg-dark-tertiary px-5 border-t border-b border-[#343434]"
                                >
                                    <img
                                        class="w-10 h-10 bg-gray-500 rounded-full"
                                        :src="$page.props.auth.profile_img_path"
                                    />
                                    <div class="flex flex-col w-full">
                                        <div
                                            class="flex items-center justify-between w-full"
                                        >
                                            <h1 class="text-sm">John Doe</h1>
                                            <span
                                                class="text-dark-text-secondary text-xs"
                                                >2mins ago</span
                                            >
                                        </div>
                                        <span
                                            class="text-xs text-dark-text-secondary"
                                            >since Jan 25, 2023</span
                                        >
                                    </div>
                                </div>
                                <div
                                    class="flex items-center gap-2 py-3 w-full hover:bg-dark-tertiary px-5 border-t border-b border-[#343434]"
                                >
                                    <img
                                        class="w-10 h-10 bg-gray-500 rounded-full"
                                        :src="$page.props.auth.profile_img_path"
                                    />
                                    <div class="flex flex-col w-full">
                                        <div
                                            class="flex items-center justify-between w-full"
                                        >
                                            <h1 class="text-sm">John Doe</h1>
                                            <span
                                                class="text-dark-text-secondary text-xs"
                                                >2mins ago</span
                                            >
                                        </div>
                                        <span
                                            class="text-xs text-dark-text-secondary"
                                            >since Jan 25, 2023</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-center py-3 cursor-pointer hover:bg-dark-tertiary border-b border-dark-brand rounded-b-lg"
                            >
                                <span
                                    class="text-dark-brand text-xs font-medium"
                                    >Show all notifications</span
                                >
                            </div>
                        </div>
                    </template>
                </Notification>

                <!-- Burger -->
                <!-- Guest -->
                <Dropdown
                    v-if="!$page.props.auth.user"
                    align="right"
                    width="48"
                >
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

                <!-- Authenticated -->
                <Dropdown v-if="$page.props.auth.user" align="right" width="48">
                    <template #trigger>
                        <div
                            class="flex items-center gap-2 px-3 py-2 rounded-md cursor-pointer select-none bg-dark-secondary"
                        >
                            <img
                                class="w-6 h-6 bg-gray-500 rounded-full"
                                :src="$page.props.auth.profile_img_path"
                            />
                            <img src="/assets/down.svg" class="h-2" />
                        </div>
                    </template>

                    <template #content>
                        <ArtistNav v-if="$page.props.auth.role == 'artist'" />
                        <FanNav v-if="$page.props.auth.role == 'fan'" />

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
        </div>
        <div class="">
            <slot></slot>
        </div>
    </div>
</template>
