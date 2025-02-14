<script setup>
    import { defineProps } from 'vue';
    const props = defineProps();
</script>
<template>
    <div>
        <header class="bg-gray-800 text-white p-4">
            <nav class="container mx-auto flex justify-between items-center">
                <div class="text-2xl font-bold space-x-4">
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                    <a href="/contact">Contact</a>
                </div>
            </nav>
        </header>

        <main class="container mx-auto p-4">
            <slot />
        </main>
    </div>
</template>
