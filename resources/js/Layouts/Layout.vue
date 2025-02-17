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
                <div class="text-2xl font-bold space-x-6">
                    <Link :href="route('home')" class="nav-link hover:underline" :class="{ 'underline' : $page.component === 'Home'}">Home</Link>
                </div>

                <div v-if="$page.props.auth.user">
                    <div class="text-2xl font-bold space-x-6">
                        <Link :href="route('dashboard')" class="nav-link hover:underline" :class="{ 'underline' : $page.component === 'Dashboard'}">Dashboard</Link>

                        <Link :href="route('logout')" method="post" as="button" type="button" class="nav-link hover:underline">Logout</Link>
                    </div>
                </div>
                <div v-else class="flex space-x-6">
                    <div class="text-2xl font-bold space-x-6">
                        <Link :href="route('login')" class="nav-link hover:underline" :class="{ 'underline' : $page.component === 'Auth/Login'}">Login</Link>
                    </div>

                    <div class="text-2xl font-bold space-x-6">
                        <Link :href="route('register')" class="nav-link hover:underline" :class="{ 'underline' : $page.component === 'Auth/Register'}">Register</Link>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container mx-auto p-4">
            <slot />
        </main>
    </div>
</template>
