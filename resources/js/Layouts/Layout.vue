<script setup>
</script>
<template>
    <Head>
        <title>Laravel Vue & Inertia</title>
    </Head>
    <div>
        <header class="bg-gray-800 text-white p-4">
            <nav class="container mx-auto flex justify-between items-center">
                <div class="text-2xl font-bold space-x-4">
                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>
                    <Link href="/contact">Contact</Link>
                </div>
            </nav>
        </header>

        <main class="container mx-auto p-4">
            <slot />
        </main>
    </div>
</template>
