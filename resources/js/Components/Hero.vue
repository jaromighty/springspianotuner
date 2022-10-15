<script setup>
import PrimaryButtonLarge from '@/Components/PrimaryButtonLarge.vue';

defineProps({
    open: Boolean
});
defineEmits(['open']);
</script>

<template>
    <div class="mx-auto max-w-7xl">
        <div class="hidden lg:absolute lg:inset-0 lg:block" aria-hidden="true">
            <svg class="absolute top-0 left-1/2 translate-x-64 translate-y-24 transform" width="640" height="782" fill="none" viewBox="0 0 640 784">
                <defs>
                    <pattern id="9ebea6f4-a1f5-4d96-8c4e-4c2abf658047" x="118" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect y="72" width="640" height="640" class="text-gray-50" fill="currentColor" />
                <rect x="118" width="404" height="584" fill="url(#9ebea6f4-a1f5-4d96-8c4e-4c2abf658047)" />
            </svg>
        </div>
        
        <div class="relative lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="px-4 my-16 sm:my-24 sm:px-6 sm:text-center md:mx-auto md:max-w-2xl lg:col-span-6 lg:flex lg:items-center lg:text-left">
                <div>
                    <h1 class="text-4xl font-bold tracking-tight text-black sm:text-5xl md:text-6xl">Springs Piano Tuner</h1>
                    <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua ad ad non deserunt sunt.</p>
                    <div class="mt-8">
                        <PrimaryButtonLarge @click="$emit('open')" class="hidden lg:inline-flex">
                            Schedule Tuning
                        </PrimaryButtonLarge>
                        <PrimaryButtonLarge as="link" href="#schedule" class="lg:hidden">
                            Schedule Tuning
                        </PrimaryButtonLarge>
                    </div>
                </div>
            </div>

            <div class="relative px-4 mt-12 sm:mx-auto sm:max-w-lg lg:col-span-6 lg:mx-0 lg:mt-8 lg:flex lg:max-w-none lg:items-center">
                <svg class="absolute top-0 left-1/2 origin-top -translate-x-1/2 -translate-y-8 scale-75 transform sm:scale-100 lg:hidden" width="640" height="404" fill="none" viewBox="0 0 640 404" aria-hidden="true">
                    <defs>
                        <pattern id="4f4f415c-a0e9-44c2-9601-6ded5a34a13e" x="118" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect y="72" width="640" height="640" class="text-gray-50" fill="currentColor" />
                    <rect x="118" width="404" height="404" fill="url(#4f4f415c-a0e9-44c2-9601-6ded5a34a13e)" />
                </svg>
                <div class="relative md:px-0 mx-auto w-full rounded-lg shadow-lg lg:max-w-2xl">
                    <img class="w-full object-cover rounded-lg" src="https://images.unsplash.com/photo-1607817359832-19a6a93c5f23?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&h=960&q=80" alt="" />
                </div>
            </div>
        </div>
    </div>
</template>