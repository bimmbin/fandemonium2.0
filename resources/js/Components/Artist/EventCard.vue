<script setup>
import { ref } from "vue";
import { Collapse } from "vue-collapsed";

const showEvent = ref(false);

const emit = defineEmits(["close"]);

defineProps({
    event: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div
        id="event container"
        class="flex flex-col px-6 py-5 rounded-lg bg-dark-secondary"
    >
        <div
            class="flex items-center justify-between cursor-pointer select-none"
        >
            <div
                @click="showEvent = !showEvent"
                class="flex items-center justify-between flex-1"
                :class="{ '!px-0': is_owner }"
            >
                <div class="flex flex-col justify-around gap-1 pr-5">
                    <h1 class="text-base font-semibold">
                        {{ event.event_name }}
                    </h1>
                    <span class="text-sm text-dark-text-secondary">{{
                        event.event_date
                    }}</span>
                </div>
                <img
                    src="/assets/down.svg"
                    class="w-4 h-4 transition-transform duration-300 select-none"
                    :class="{
                        '-rotate-180': showEvent,
                    }"
                    alt=""
                />
            </div>
        </div>

        <!-- Event details -->
        <Collapse
            :when="showEvent"
            class="flex flex-col w-full gap-2 overflow-hidden"
        >
            <p class="pt-5 pb-3 text-sm leading-5 text-dark-text-secondary">
                {{ event.description }}
            </p>
            <div
                class="flex flex-col px-4 py-3 text-sm border rounded-md border-dark-border"
            >
                <h2 class="font-semibold">{{ event.coords }}</h2>
                <span class="text-xs font-medium text-dark-text-secondary"
                    >Location</span
                >
            </div>
            <div
                class="flex flex-col px-4 py-3 text-sm border rounded-md border-dark-border"
            >
                <h2 class="font-semibold">{{ event.venue }}</h2>
                <span class="text-xs font-medium text-dark-text-secondary"
                    >Venue</span
                >
            </div>
            <div
                class="flex items-center justify-between gap-2 text-sm whitespace-nowrap"
            >
                <div
                    class="flex flex-col flex-1 px-4 py-3 text-sm border rounded-md border-dark-border"
                >
                    <h2 class="font-semibold">{{ event.start_time }}</h2>
                    <span class="text-xs font-medium text-dark-text-secondary"
                        >Start Time</span
                    >
                </div>
                <div
                    class="flex flex-col flex-1 px-4 py-3 text-sm border rounded-md border-dark-border"
                >
                    <h2 class="font-semibold">{{ event.end_time }}</h2>
                    <span class="text-xs font-medium text-dark-text-secondary"
                        >End Time</span
                    >
                </div>
            </div>

            <div class="flex gap-1 px-4 mb-3 text-center">
                <a
                    href="
                    "
                    target="_blank"
                    class="flex-1 py-1 text-sm font-semibold bg-white border-2 border-btn text-btn"
                    >See location</a
                >
                <a
                    href=""
                    class="flex-1 py-1 text-sm text-white border-2 border-btn bg-btn"
                    >But ticket now</a
                >
            </div>
        </Collapse>
    </div>
</template>
