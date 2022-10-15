<script setup>
import { provide, ref } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Header from '@/Components/Header.vue';
import Hero from '@/Components/Hero.vue';
import MeetJarom from '@/Components/MeetJarom.vue';
import ScheduleTuningCTA from '@/Components/ScheduleTuningCTA.vue';
import ScheduleModal from '@/Components/ScheduleModal.vue';
import FAQs from '@/Components/FAQs.vue';
import ScheduleForm from '@/Components/Forms/ScheduleForm.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    tunings: Array
});

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
    <main class="relative mb-8 overflow-x-hidden">
        <Hero :open="open" @open="openModal" />
        <MeetJarom />
        <ScheduleTuningCTA :open="open" @open="openModal" />
        <FAQs />
        <ScheduleForm :tunings="tunings" />
        <Footer />
    </main>

    <ScheduleModal :open="open" :tunings="tunings" @close="closeModal" />
</template>
