<script setup>
    defineProps({
        name: String
    });
</script>

<template>
    <Head>
        <title>About</title>
    </Head>
    <h1 class="bg-red-500">About Page - {{ name }}</h1>
</template>
