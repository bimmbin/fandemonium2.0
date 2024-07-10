<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const emit = defineEmits(["close"]);

const form = useForm({
    event_name: "",
    event_description: "",
    location: "",
    venue: "",
    event_date: "",
    start_time: "",
    end_time: "",
    ticket_link: "",
});

const submit = () => {
    form.post(route("artist.events.store"), {
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
        <!-- event name -->
        <div>
            <InputLabel for="event_name" value="Event Name" />

            <TextInput
                id="event_name"
                type="text"
                class="block w-full"
                v-model="form.event_name"
                autocomplete="event_name"
            />

            <InputError class="mt-2" :message="form.errors.event_name" />
        </div>

        <!-- Event Description -->
        <div>
            <InputLabel for="event_description" value="Event Description" />

            <textarea
                v-model="form.event_description"
                id="event_description"
                cols="30"
                rows="6"
                class="w-full px-4 py-3 rounded-lg bg-dark-secondary border-dark-border"
            ></textarea>

            <InputError class="mt-2" :message="form.errors.event_description" />
        </div>

        <!-- location -->
        <div>
            <InputLabel for="location" value="Location" />

            <TextInput
                id="location"
                type="text"
                class="block w-full"
                v-model="form.location"
                autocomplete="location"
            />

            <InputError class="mt-2" :message="form.errors.location" />
        </div>

        <!-- Venue -->
        <div>
            <InputLabel for="venue" value="Venue" />

            <TextInput
                id="venue"
                type="text"
                class="block w-full"
                v-model="form.venue"
                autocomplete="venue"
            />

            <InputError class="mt-2" :message="form.errors.venue" />
        </div>

        <!-- Date -->
        <div>
            <InputLabel for="event_date" value="Date" />

            <TextInput
                id="event_date"
                type="date"
                class="block w-full"
                v-model="form.event_date"
                autocomplete="event_date"
            />

            <InputError class="mt-2" :message="form.errors.event_date" />
        </div>

        <!-- Start/End time -->
        <div class="flex justify-between gap-2">
            <!-- Start time -->
            <div class="flex-1">
                <InputLabel for="start_time" value="Start time" />

                <TextInput
                    id="start_time"
                    type="time"
                    class="block w-full"
                    v-model="form.start_time"
                    autocomplete="start_time"
                />

                <InputError class="mt-2" :message="form.errors.start_time" />
            </div>
            <!-- End time -->
            <div class="flex-1">
                <InputLabel for="end_time" value="End time" />

                <TextInput
                    id="end_time"
                    type="time"
                    class="block w-full"
                    v-model="form.end_time"
                    autocomplete="end_time"
                />

                <InputError class="mt-2" :message="form.errors.end_time" />
            </div>
        </div>
        <!-- Ticket Link -->
        <div>
            <InputLabel for="ticket_link" value="Ticket Link" />

            <TextInput
                id="ticket_link"
                type="text"
                class="block w-full"
                v-model="form.ticket_link"
                autocomplete="ticket_link"
            />

            <InputError class="mt-2" :message="form.errors.ticket_link" />
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
