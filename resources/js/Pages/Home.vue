<script setup>
</script>

<template>
    <Head>
        <title>{{ $page.component }}</title>
    </Head>
    <div class="container mx-auto p-4">
        <h1 class="">{{ $page.component }}</h1>
    </div>

    <!-- preserve the scroll position -->
    <Link class="mt-[1400px] text-2xl block" :href="route('home')" preserve-scroll>Refresh</Link>
</template>
