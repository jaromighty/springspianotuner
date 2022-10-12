<script setup>
const weekdays = ['M','T','W','T','F','S','S'];
</script>

<template>
    <div class="mt-6 grid grid-cols-7 text-xs leading-6 text-gray-500">
        <div v-for="(day, idx) in weekdays" :key="idx">{{ day }}</div>
    </div>
</template>