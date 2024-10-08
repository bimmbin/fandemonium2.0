<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import Swal from "sweetalert2";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Wizard from "@/Components/wizard/Wizard.vue";
import AddItems from "@/Components/AddItems.vue";
import AddSocialLinks from "@/Components/AddSocialLinks.vue";
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

// Add social links
const showAddLinks = ref(false);
const addLinks = (social, link) => {
    if (social.value.trim() !== "" && link.value.trim() !== "") {
        form.social_links.push({
            social_name: social.value,
            link: link.value,
        });
    }
};
const removeLinks = (index) => {
    form.social_links.splice(index, 1);
};

// upload picture
const url = ref();

const previewImage = (e) => {
    const file = e.target.files;
    url.value = URL.createObjectURL(file[0]);
    console.log(URL.createObjectURL(file[0]));
};

const resetImage = () => {
    form.image = null;
    url.value = null;
};

const form = useForm({
    artist_name: "",
    image: "",
    genres: [],
    members: [],
    about: "",
    social_links: [],
    username: "",
    password: "",
    password_confirmation: "",
});
const submit = () => {
    form.post(route("artist.store"), {
        onSuccess: () => form.reset(),
        onError: () => {
            if (!form.errors.password) {
                Swal.fire({
                    title: "Error!",
                    text: "Please fill all the required fields!",
                    color: "#fff",
                    background: "#1A1A1A",
                    icon: "error",
                    confirmButtonColor: "#772DC3",
                });
            }
        },
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

    <AddSocialLinks
        v-if="showAddLinks"
        @close_dialog="showAddLinks = !showAddLinks"
        @data="addLinks"
    />

    <MainLayout>
        <Wizard :stepCounts="3" @submit="submit()">
            <template #all>
                <div v-if="url" class="relative">
                    <img
                        :src="url"
                        alt=""
                        class="object-cover w-full rounded-lg h-60"
                    />
                    <div
                        class="absolute top-0 right-0 flex items-center gap-2 px-3 py-2 mt-5 mr-5 border cursor-pointer select-none opacity-80 border-dark-text-secondary rounded-xl bg-dark-secondary hover:bg-dark-tertiary"
                        @click="resetImage()"
                    >
                        <img src="/assets/exit.svg" alt="" />
                        <span>reset</span>
                    </div>
                </div>
                <label
                    v-else
                    for="file"
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
                <!-- Input File -->
                <input
                    type="file"
                    id="file"
                    class="w-full px-3 py-2 bg-input_bg rounded-t-md"
                    @input="form.image = $event.target.files[0]"
                    @change="previewImage"
                    hidden
                    accept="image/*"
                />
            </template>

            <!-- Step 1 -->
            <template #title1>Profile Information</template>
            <template #step1>
                <div class="flex flex-col gap-5">
                    <!-- Artist Name -->
                    <div class="flex flex-col gap-2">
                        <InputLabel
                            for="artist_name"
                            value="Artist Name"
                            required
                        />

                        <input
                            type="text"
                            class="w-full px-5 py-3 text-sm border-none rounded-lg bg-dark-secondary"
                            placeholder="The beatles"
                            id="artist_name"
                            v-model="form.artist_name"
                        />
                        <InputError
                            v-show="!form.artist_name"
                            :message="form.errors.artist_name"
                        />
                    </div>

                    <!-- Genre -->
                    <div class="flex flex-col gap-2">
                        <InputLabel for="genre" value="Genre" required />
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
                        <InputError
                            v-show="form.genres.length === 0"
                            :message="form.errors.genres"
                        />
                    </div>

                    <!-- Members -->
                    <div class="flex flex-col gap-2">
                        <InputLabel for="members" value="Members" required />
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
                        <InputError
                            v-show="form.members.length === 0"
                            :message="form.errors.members"
                        />
                    </div>

                    <!-- About -->
                    <div class="flex flex-col gap-2">
                        <InputLabel for="about" value="About" />
                        <textarea
                            name=""
                            id="about"
                            rows="5"
                            class="w-full px-5 py-3 text-sm border-none rounded-lg bg-dark-secondary"
                        ></textarea>
                    </div>
                </div>
            </template>

            <template #title2>Social Links</template>
            <template #step2>
                <div class="flex flex-col gap-5">
                    <!-- Social Links -->
                    <div class="flex flex-col gap-2">
                        <label for="genre" class="text-xs font-medium"
                            >Social Links</label
                        >
                        <div
                            class="flex flex-wrap w-full gap-2 px-5 py-3 border-none rounded-lg bg-dark-secondary"
                        >
                            <div
                                v-for="(link, index) in form.social_links"
                                :key="index"
                                class="flex items-center gap-2 px-3 py-1 text-sm capitalize border rounded-full border-dark-border w-fit"
                            >
                                <span
                                    >{{ link.social_name }} :
                                    {{ link.link }}</span
                                >
                                <div
                                    @click="removeLinks(index)"
                                    class="p-1 bg-gray-500 rounded-full"
                                >
                                    <img src="/assets/exit.svg" class="h-2" />
                                </div>
                            </div>
                            <div
                                class="flex items-center gap-1 px-3 py-1 text-sm border rounded-full border-dark-accent bg-dark-accent w-fit"
                                @click="showAddLinks = !showAddLinks"
                            >
                                <img src="/assets/add.svg" alt="" />
                                <span>Add</span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template #title3> Account Details </template>
            <template #step3>
                <div class="flex flex-col gap-5">
                    <!-- Username -->
                    <div class="flex flex-col gap-2">
                        <InputLabel for="username" value="Username" required />
                        <input
                            type="text"
                            class="w-full px-5 py-3 text-sm border-none rounded-lg bg-dark-secondary"
                            placeholder="JohnDoe22"
                            id="username"
                            v-model="form.username"
                        />
                        <InputError
                            v-show="!form.username"
                            :message="form.errors.username"
                        />
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col gap-2">
                        <InputLabel for="password" value="Password" required />
                        <input
                            type="password"
                            class="w-full px-5 py-3 text-sm border-none rounded-lg bg-dark-secondary"
                            id="password"
                            v-model="form.password"
                        />
                        <InputError :message="form.errors.password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="flex flex-col gap-2">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirm Password"
                            required
                        />

                        <input
                            type="password"
                            class="w-full px-5 py-3 text-sm border-none rounded-lg bg-dark-secondary"
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                        />
                        <InputError
                            :message="form.errors.password_confirmation"
                        />
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            class="p-2 text-sm border rounded-sm border-dark-border bg-dark-secondary"
                            placeholder="**********"
                            id="tnc"
                        />
                        <label for="tnc" class="text-xs font-medium select-none"
                            >I agree with the
                            <span class="underline text-dark-brand"
                                >Terms & Conditions</span
                            ></label
                        >
                    </div>
                </div>
            </template>
        </Wizard>
    </MainLayout>
</template>
