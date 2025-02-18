<script setup>
</script>

<template>
    <div v-if="$page.props.flash.success" class="bg-green-500 text-white p-4 text-center mb-4 w-2/4 mx-auto">
        {{ $page.props.flash.success }}
    </div>
    <div>
        <h1 class="w-2/4 mx-auto text-3xl text-center text-gray-800 font-bold mt-8 mb-4">Welcome back {{ $page.props.auth.user.name }}</h1>
    </div>
</template>
