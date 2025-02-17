<script setup>
import { defineProps } from 'vue';

defineProps({
    paginator: {
        type: Object,
        required: true
    }
});

const makeLabel = (label) => {
    if (label.includes('Previous')) {
        return '<<';
    } else if (label.includes('Next')) {
        return '>>';
    } else {
        return label;
    }
}
</script>

<template>
    <div class="flex justify-between items-start mt-6">
        <div class="flex items-center rounded-lg overflow-hidden shadow-lg">
            <div v-for="link in paginator.links" :key="link.url">
                <component
                    :is="link.url ? 'Link' : 'span'"
                    :href="link.url"
                    v-html="makeLabel(link.label)"
                    class="border-x border-slate-50 w-20 h-14 grid place-items-center bg-white"
                    :class="{
                        'hover:bg-slate-300' : link.active,
                        'text-zinc-400' : !link.url,
                        'font-bold text-blue-500' : link.active,
                    }"
                />
            </div>
        </div>

        <p class="mt-6 text-gray-600">Showing {{ paginator.from }} - {{ paginator.to }} of {{ paginator.total }} results</p>
    </div>
</template>
