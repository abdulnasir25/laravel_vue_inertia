<script setup>
    import Layout from '../Layouts/Layout.vue';

    defineProps({
        name: String
    });
</script>

<template>
    <Layout>
        <h1 class="bg-red-500">About Page - {{ name }}</h1>
    </Layout>
</template>
