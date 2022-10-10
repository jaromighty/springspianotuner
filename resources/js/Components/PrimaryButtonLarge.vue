<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-8 py-3 text-base uppercase text-white shadow-sm hover:bg-blue-700 md:py-4 md:px-10 md:text-lg focus:ring focus:ring-blue-500 focus:ring-opacity-40">
        <slot />
    </button>
</template>