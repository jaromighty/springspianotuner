<script setup>
import { inject } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    open: Boolean
});
defineEmits(['open']);

const navigation = [
  { name: 'About', href: '#about' },
  { name: 'FAQs', href: '#faqs' },
  { name: 'Docs', href: '#' },
  { name: 'Company', href: '#' },
];
</script>

<template>
    <header class="relative">
        <div class="flex items-center h-24 border-b border-gray-200">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-center">
                    <div class="inline-flex items-center py-4">
                        <Link href="/" class="text-3xl tracking-wide uppercase hover:text-blue-900">Springs Piano Tuner</Link>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center h-24 border-b border-gray-200">
            <div class="max-w-7xl mx-auto w-full">
                <div class="grid content-center">
                    <div class="inline-flex items-center space-x-5">
                        <nav class="flex items-center flex-1">
                            <div class="min-h-0 h-full">
                                <ul class="inline-flex">
                                    <li v-for="(item, idx) in navigation" :key="idx" class="flex flex-col justify-center">
                                        <Link :href="item.href" class="flex items-center h-full px-4 leading-10 text-gray-800 hover:text-blue-900">{{ item.name }}</Link>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                        <div class="flex items-center justify-end">
                            <PrimaryButton @click="$emit('open')">
                                Schedule Tuning
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>