<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import Wizard from "@/Components/wizard/Wizard.vue";
import AddItems from "@/Components/AddItems.vue";
import MainLayout from "@/Layouts/MainLayout.vue";

// Add genre
const showAddGenre = ref(false);
const addGenre = (item) => {
    if (item.value.trim() !== "") {
        form.genres.push(item.value);
    }
};
const removeGenre = (index) => {
    form.genres.splice(index, 1);
};

// Add members
const showAddMembers = ref(false);
const addMembers = (item) => {
    if (item.value.trim() !== "") {
        form.members.push(item.value);
    }
};
const removeMember = (index) => {
    form.members.splice(index, 1);
};

const form = useForm({
    artist_name: "",
    genres: [],
    members: [],
    about: "",
});
const submit = () => {
    form.post(route("web-development.store"), {
        onSuccess: () => emit("close_emit"),
    });
};
</script>

<template>
    <!-- Hidden Dialogs -->
    <AddItems
        v-if="showAddGenre"
        item="genre"
        @close_dialog="showAddGenre = !showAddGenre"
        @item="addGenre"
    />
    <AddItems
        v-if="showAddMembers"
        item="member"
        @close_dialog="showAddMembers = !showAddMembers"
        @item="addMembers"
    />

    <MainLayout>
        <Wizard :stepCounts="3">
            <template #title1> Profile Information </template>
            <template #step1>
                <div class="flex flex-col gap-5 mt-5">
                    <label
                        for="img"
                        class="flex flex-col items-center justify-center w-full gap-3 border-2 border-dashed rounded-lg h-60 border-dark-brand bg-dark-secondary"
                    >
                        <img src="/assets/image.svg" class="h-16" />
                        <div class="font-semibold">Upload Profile</div>
                        <div
                            class="flex items-center gap-2 px-5 py-2 rounded-full bg-dark-accent"
                        >
                            <img src="/assets/add.svg" class="h-3" />
                            <span>Choose</span>
                        </div>
                    </label>
                    <input type="file" hidden id="img" />

                    <!-- Artist Name -->
                    <div class="flex flex-col gap-2">
                        <label for="artist_name" class="text-xs font-medium"
                            >Artist Name</label
                        >
                        <input
                            type="text"
                            class="w-full px-5 py-3 text-sm border-none rounded-lg bg-dark-secondary"
                            placeholder="The beatles"
                            id="artist_name"
                        />
                    </div>

                    <!-- Genre -->
                    <div class="flex flex-col gap-2">
                        <label for="genre" class="text-xs font-medium"
                            >Genre</label
                        >
                        <div
                            class="flex flex-wrap w-full gap-2 px-5 py-3 border-none rounded-lg bg-dark-secondary"
                        >
                            <div
                                v-for="(genre, index) in form.genres"
                                :key="index"
                                class="flex items-center gap-2 px-3 py-1 text-sm capitalize border rounded-full border-dark-border w-fit"
                            >
                                <span>{{ genre }}</span>
                                <div
                                    @click="removeGenre(index)"
                                    class="p-1 bg-gray-500 rounded-full"
                                >
                                    <img src="/assets/exit.svg" class="h-2" />
                                </div>
                            </div>
                            <div
                                class="flex items-center gap-1 px-3 py-1 text-sm border rounded-full border-dark-accent bg-dark-accent w-fit"
                                @click="showAddGenre = !showAddGenre"
                            >
                                <img src="/assets/add.svg" alt="" />
                                <span>Add</span>
                            </div>
                        </div>
                    </div>

                    <!-- Members -->
                    <div class="flex flex-col gap-2">
                        <label for="genre" class="text-xs font-medium"
                            >Members</label
                        >
                        <div
                            class="flex flex-wrap w-full gap-2 px-5 py-3 border-none rounded-lg bg-dark-secondary"
                        >
                            <div
                                v-for="(member, index) in form.members"
                                :key="index"
                                class="flex items-center gap-2 px-3 py-1 text-sm capitalize border rounded-full border-dark-border w-fit"
                            >
                                <span>{{ member }}</span>
                                <div
                                    @click="removeMember(index)"
                                    class="p-1 bg-gray-500 rounded-full"
                                >
                                    <img src="/assets/exit.svg" class="h-2" />
                                </div>
                            </div>
                            <div
                                @click="showAddMembers = !showAddMembers"
                                class="flex items-center gap-1 px-3 py-1 text-sm border rounded-full border-dark-accent bg-dark-accent w-fit"
                            >
                                <img src="/assets/add.svg" alt="" />
                                <span>Add</span>
                            </div>
                        </div>
                    </div>

                    <!-- About -->
                    <div class="flex flex-col gap-2">
                        <label for="artist_name" class="text-xs font-medium"
                            >About</label
                        >
                        <textarea
                            name=""
                            id=""
                            rows="5"
                            class="w-full px-5 py-3 text-sm border-none rounded-lg bg-dark-secondary"
                        ></textarea>
                    </div>
                </div>
            </template>

            <template #title2> Social Links </template>
            <template #step2>asdfsdsdfsdf2</template>

            <template #title3> Account Details </template>
            <template #step3>asdfsdsdfsdf3</template>
        </Wizard>
    </MainLayout>
</template>
