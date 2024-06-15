<script setup>
import { ref } from "vue";
import "typeface-poppins";

import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
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
            <img src="/assets/burger.svg" class="h-5" />
        </div>
        <div class="">
            <slot></slot>
        </div>
    </div>
</template>
