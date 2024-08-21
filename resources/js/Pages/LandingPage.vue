<script setup>
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";

import MainLayout from "@/Layouts/MainLayout.vue";
import PostCard from "@/Components/PostCard.vue";
import FinishProfile from "@/Components/Fan/Forms/FinishProfile.vue";
import Modal from "@/Components/Modal.vue";

defineProps({
    no_profile: {
        type: Boolean,
        default: false,
    },
});

const finishProfile = ref(true);
const showSearchSection = ref(false);
const search = ref();

const closeModal = () => {
    finishProfile.value = false;
};
</script>

<template>
    <!-- Modals -->
    <Modal
        :show="no_profile && finishProfile"
        modalTitle="Finish Profile"
        :closable="false"
    >
        <FinishProfile @close="closeModal" />
    </Modal>

    <MainLayout>
        <div class="flex flex-col gap-5">
            <!-- Search Input -->
            <div class="flex items-stretch h-11 gap-1">
                <div
                    v-if="showSearchSection"
                    class="w-12 h-full border border-dark-border bg-dark-secondary flex items-center justify-center rounded-l-full active:bg-dark-tertiary select-none cursor-pointer hover:bg-dark-tertiary"
                    @click="showSearchSection = false"
                >
                    <img
                        src="/assets/exit.svg"
                        alt=""
                        class="translate-x-[2.5px]"
                    />
                </div>
                <input
                    type="text"
                    class="w-full h-full py-3 text-sm border border-dark-border bg-dark-secondary"
                    :class="
                        showSearchSection
                            ? '!rounded-r-full px-3'
                            : 'rounded-full px-5'
                    "
                    v-model="search"
                    placeholder="Search artist"
                    @focus="showSearchSection = true"
                />
            </div>

            <!-- Main Section -->
            <div v-if="!showSearchSection" class="flex flex-col gap-5">
                <!-- Find Artist Map Section -->
                <div class="flex flex-col gap-3">
                    <h2 class="text-lg font-semibold">Find Artist Events</h2>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <img src="/assets/arrow_down.svg" class="w-4 h-4" />
                            <img
                                src="/assets/location_mark.svg"
                                class="w-5 h-5"
                            />
                            <span class="text-dark-text-secondary"
                                >Tarlac, Philippines</span
                            >
                        </div>
                        <div class="underline text-dark-brand">Change</div>
                    </div>
                    <div
                        class="w-full h-40 border bg-dark-tertiary rounded-xl border-dark-border"
                    ></div>
                </div>

                <!-- Post Card Section -->
                <PostCard />
            </div>

            <!-- Search Section -->
            <div v-if="showSearchSection" class="flex flex-col gap-5">
                <!-- Results -->
                <div v-if="search" class="flex flex-col gap-3">
                    <h2 class="text-sm text-dark-text-secondary">Results</h2>

                    <div class="flex flex-col select-none">
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trending -->
                <div class="flex flex-col gap-3">
                    <h2 class="text-lg font-semibold">Trending Now</h2>
                    <div
                        class="flex gap-3 overflow-x-auto select-none whitespace-nowrap"
                    >
                        <div
                            class="flex flex-col items-center gap-2 p-5 rounded-xl bg-dark-secondary"
                        >
                            <div
                                class="w-20 h-20 bg-gray-500 rounded-full"
                            ></div>
                            <h2 class="text-sm font-medium">The Beatles</h2>
                            <span class="text-xs text-dark-text-secondary"
                                >125 fans</span
                            >
                        </div>
                        <div
                            class="flex flex-col items-center gap-2 p-5 rounded-xl bg-dark-secondary"
                        >
                            <div
                                class="w-20 h-20 bg-gray-500 rounded-full"
                            ></div>
                            <h2 class="text-sm font-medium">The Beatles</h2>
                            <span class="text-xs text-dark-text-secondary"
                                >125 fans</span
                            >
                        </div>
                        <div
                            class="flex flex-col items-center gap-2 p-5 rounded-xl bg-dark-secondary"
                        >
                            <div
                                class="w-20 h-20 bg-gray-500 rounded-full"
                            ></div>
                            <h2 class="text-sm font-medium">The Beatles</h2>
                            <span class="text-xs text-dark-text-secondary"
                                >125 fans</span
                            >
                        </div>
                        <div
                            class="flex flex-col items-center gap-2 p-5 rounded-xl bg-dark-secondary"
                        >
                            <div
                                class="w-20 h-20 bg-gray-500 rounded-full"
                            ></div>
                            <h2 class="text-sm font-medium">The Beatles</h2>
                            <span class="text-xs text-dark-text-secondary"
                                >125 fans</span
                            >
                        </div>
                    </div>
                </div>

                <!-- Suggestions -->
                <div v-if="!search" class="flex flex-col gap-3">
                    <h2 class="text-sm text-dark-text-secondary">
                        Suggestions
                    </h2>

                    <div class="flex flex-col select-none">
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 px-5 py-3 cursor-pointer hover:bg-dark-secondary active:bg-dark-tertiary"
                        >
                            <div
                                class="w-10 h-10 bg-gray-500 rounded-full"
                            ></div>
                            <div class="flex flex-col">
                                <h1 class="text-sm">John Doe</h1>
                                <span class="text-xs text-dark-text-secondary"
                                    >since Jan 25, 2023</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
