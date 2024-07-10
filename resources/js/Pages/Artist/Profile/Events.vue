<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import ArtistProfileLayout from "@/Layouts/ArtistProfileLayout.vue";
import CreateEvent from "@/Components/Artist/Forms/CreateEvent.vue";
import EventCard from "@/Components/Artist/EventCard.vue";

export default {
    layout: [MainLayout, ArtistProfileLayout],
};
</script>

<script setup>
import { nextTick, ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";

const { user } = defineProps({
    user: Object,
});

const confirmAddEvent = ref(false);

const closeModal = () => {
    confirmAddEvent.value = false;
};
</script>

<template>
    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Upcoming Events</h2>
            <div
                @click="confirmAddEvent = true"
                class="flex gap-2 px-4 py-2 text-sm rounded-full cursor-pointer bg-dark-accent itemcenter"
            >
                <img src="/assets/add.svg" alt="" />
                <span>Add Event</span>
            </div>
        </div>
        <!-- Content -->
        <EventCard />
    </div>

    <!-- Modals -->
    <Modal :show="confirmAddEvent" @close="closeModal" modalTitle="Add Event">
        <CreateEvent @close="closeModal" />
    </Modal>
</template>
