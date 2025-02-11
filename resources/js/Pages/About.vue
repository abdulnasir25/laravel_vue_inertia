<script setup>
    defineProps({
        name: String
    });
</script>

<template>
    <div>
        <h1 class="bg-red-500">About Page - {{ name }}</h1>
    </div>
</template>
