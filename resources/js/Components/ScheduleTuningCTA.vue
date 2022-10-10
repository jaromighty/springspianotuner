<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    open: Boolean
});
defineEmits(['open']);
</script>

<template>
    <div class="relative bg-gray-50">
        <div class="mx-auto max-w-7xl py-12 px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Ready to hear the difference?</span>
                <span class="block">Schedule your piano tuning today.</span>
            </h2>
            <div class="mt-8 flex justify-center">
                <div class="inline-flex rounded-md shadow">
                    <PrimaryButton @click="$emit('open')">
                        Schedule Tuning
                    </PrimaryButton>
                </div>
            </div>
        </div>
    </div>
</template>