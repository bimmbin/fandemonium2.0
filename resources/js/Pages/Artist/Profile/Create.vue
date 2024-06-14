<script setup>
import Wizard from "@/Components/wizard/Wizard.vue";
</script>

<template>
    <Wizard :stepCounts="3">
        <template #title1> Profile Information </template>
        <template #step1>asdfsdsdfsdf</template>

        <template #title2> Social Links </template>
        <template #step2>asdfsdsdfsdf2</template>

        <template #title3> Account Details </template>
        <template #step3>asdfsdsdfsdf3</template>
    </Wizard>
</template>
