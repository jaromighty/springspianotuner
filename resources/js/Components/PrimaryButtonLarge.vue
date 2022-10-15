<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    as: String,
    href: String,
    type: {
        type: String,
        default: 'submit',
    }
});

const classes = "inline-flex items-center rounded-md border border-transparent bg-blue-600 px-8 py-3 text-base uppercase text-white shadow-sm hover:bg-blue-700 md:py-4 md:px-10 md:text-lg focus:ring focus:ring-blue-500 focus:ring-opacity-40";
</script>

<template>
    <Link :href="href" :class="classes" v-if="as === 'link'">
        <slot />
    </Link>
    <button :type="type" :class="classes" v-else>
        <slot />
    </button>
</template>