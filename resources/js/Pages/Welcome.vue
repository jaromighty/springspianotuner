<script setup>
import { provide, ref } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Header from '@/Components/Header.vue';
import Hero from '@/Components/Hero.vue';
import MeetJarom from '@/Components/MeetJarom.vue';
import ScheduleTuningCTA from '@/Components/ScheduleTuningCTA.vue';
import ScheduleModal from '@/Components/ScheduleModal.vue';
import FAQs from '@/Components/FAQs.vue';
import Footer from '@/Components/Footer.vue';

const open = ref(false);
const openModal = () => {
    open.value = true;
}
const closeModal = () => {
    open.value = false;
}
</script>

<template>
    <Head title="Welcome" />
    
    <Header :open="open" @open="openModal" />
    <main class="relative mb-8">
        <Hero :open="open" @open="openModal" />
        <MeetJarom />
        <ScheduleTuningCTA :open="open" @open="openModal" />
        <FAQs />
        <Footer />
    </main>

    <ScheduleModal :open="open" @close="closeModal" />
</template>
