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

const { user, events, is_owner } = defineProps({
    user: Object,
    is_owner: Boolean,
    events: Object,
});

const confirmAddEvent = ref(false);

const closeModal = () => {
    confirmAddEvent.value = false;
};
</script>

<template>
    <div class="flex flex-col gap-3">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Upcoming Events</h2>
            <div
                @click="confirmAddEvent = true"
                v-if="$page.props.is_owner"
                class="flex gap-2 px-4 py-2 text-sm rounded-full cursor-pointer bg-dark-accent itemcenter"
            >
                <img src="/assets/add.svg" alt="" />
                <span>Add Event</span>
            </div>
        </div>
        <!-- Content -->
        <div class="flex flex-col gap-2">
            <EventCard v-for="event in events" :event="event" />
        </div>
    </div>

    <!-- Modals -->
    <Modal :show="confirmAddEvent" @close="closeModal" modalTitle="Add Event">
        <CreateEvent @close="closeModal" />
    </Modal>
</template>
