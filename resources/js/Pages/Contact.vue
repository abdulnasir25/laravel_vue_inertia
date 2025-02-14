<script setup>
    import Layout from '../Layouts/Layout.vue';

    defineProps({
        name: String
    });
</script>

<template>
    <Layout>
        <h1>Contact with - {{ name }}</h1>
    </Layout>
</template>
