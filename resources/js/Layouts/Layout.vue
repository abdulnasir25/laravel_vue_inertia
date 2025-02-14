<script setup>
import { route } from '../../../vendor/tightenco/ziggy/src/js';

</script>
<template>
    <Head>
        <title>Laravel Vue & Inertia</title>
    </Head>
    <div>
        <header class="bg-gray-800 text-white p-4">
            <nav class="container mx-auto flex justify-between items-center">
                <div class="text-2xl font-bold space-x-4">
                    <Link :href="route('home')">Home</Link>
                    <Link :href="route('about')">About</Link>
                    <Link :href="route('contact')">Contact</Link>
                </div>
            </nav>
        </header>

        <main class="container mx-auto p-4">
            <slot />
        </main>
    </div>
</template>
