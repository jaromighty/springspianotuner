<script setup>
import { inject } from 'vue';
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue';
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    open: Boolean
});
defineEmits(['open']);

const navigation = [
    { name: 'About', href: '#about' },
    { name: 'FAQs', href: '#faqs' },
];
</script>

<template>
    <Popover class="relative bg-gray-50">
        <div class="mx-auto max-w-7xl md:max-w-none">
            <div class="flex items-center justify-between border-b border-gray-200 py-4 px-4 sm:px-6 md:justify-start md:py-8">
                <div class="flex justify-start lg:w-0 lg:flex-1 lg:justify-center">
                    <Link href="#">
                        <span class="sr-only">Springs Piano Tuner</span>
                        <span href="/" class="text-xl tracking-wide uppercase md:text-3xl hover:text-blue-900">Springs Piano Tuner</span>
                    </Link>
                </div>
                <div class="-my-2 -mr-2 md:hidden">
                    <PopoverButton class="inline-flex items-center justify-center rounded-md bg-gray-50 p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <span class="sr-only">Open menu</span>
                        <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                </div>
            </div>
            <nav class="hidden md:flex items-center justify-between border-b border-gray-200 py-4 px-4 sm:px-6 md:justify-start md:space-x-6">
                <Link v-for="(item, idx) in navigation" :key="idx" :href="item.href" class="flex items-center h-full px-4 leading-10 font-medium text-gray-800 hover:text-blue-900">{{ item.name }}</Link>
            </nav>
        </div>
        <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute z-20 inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden">
                <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="px-5 pt-5 pb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <span href="/" class="text-xl tracking-wide uppercase md:text-3xl hover:text-blue-900">Springs Piano Tuner</span>
                            </div>
                            <div class="-mr-2">
                                <PopoverButton class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                </PopoverButton>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-6 py-6 px-5">
                        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                            <Link href="#about" class="text-base font-medium text-gray-900 hover:text-gray-700">About</Link>

                            <Link href="#faqs" class="text-base font-medium text-gray-900 hover:text-gray-700">FAQs</Link>
                        </div>
                        <PrimaryButton as="link" href="#schedule" class="w-full justify-center">Schedule Tuning</PrimaryButton>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>