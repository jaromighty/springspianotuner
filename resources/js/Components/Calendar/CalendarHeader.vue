<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid';

defineProps({
    currentMonth: String,
});
defineEmits(['next','previous']);
</script>

<template>
    <div class="flex items-center text-gray-900">
        <button type="button" @click="$emit('previous')" class="-m-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
            <span class="sr-only">Previous month</span>
            <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
        </button>
        <div class="flex-auto font-semibold">{{ currentMonth }}</div>
        <button type="button" @click="$emit('next')" class="-m-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
            <span class="sr-only">Next month</span>
            <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
        </button>
    </div>
</template>