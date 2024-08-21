<script setup>
import DropdownLink from "@/Components/DropdownLink.vue";
</script>

<template>
    <DropdownLink
        :href="route('artist.posts.index', $page.props.auth.user.username)"
        img="user.svg"
    >
        Profile
    </DropdownLink>
</template>
