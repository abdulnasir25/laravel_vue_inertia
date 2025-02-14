<script setup>
import { capitalize } from 'vue';

const model = defineModel({
    type: null,
    required: true
});

defineProps({
    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    message: String,
});
</script>

<template>
    <div class="mb-4 flex flex-col">
        <!-- split name by underscore, capitalize each word, and join them with a space -->
        <label class="mb-2" :for="name">{{ name.split('_').map(word => capitalize(word)).join(' ') }}</label>
        <input v-model="model" :type="type" name="{{ name }}" id="{{ name }}" class="p-2 border rounded w-full" :class="{ '!border-red-500': message }" />
        <p v-if="message" class="text-red-500 text-xs mt-1">{{ message }}</p>
    </div>
</template>
