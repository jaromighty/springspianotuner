<script setup>
import { inject, ref } from 'vue';
import { Head } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Calendar from '@/Components/Calendar/Calendar.vue';
import NewTuningModal from '@/Components/Modals/NewTuningModal.vue';
import TuningListItem from '@/Components/TuningListItem.vue';

defineProps({
    tunings: Array,
});

const dayjs = inject('dayjs');

const open = ref(false);
const today = ref(dayjs().format("YYYY-MM-DD"));
</script>

<template>
    <Head title="Schedule" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Schedule
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Upcoming tunings</h2>
                    <div class="lg:grid lg:grid-cols-12 lg:gap-x-16">
                        <div class="mt-10 text-center lg:col-start-8 lg:col-end-13 lg:row-start-1 lg:mt-9 xl:col-start-9">
                            <Calendar :today="today" />
                            <button type="button" @click="open = true" class="mt-8 w-full rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-40">Add tuning</button>
                        </div>
                        <ol class="mt-4 divide-y divide-gray-100 text-sm leading-6 lg:col-span-7 xl:col-span-8">
                            <TuningListItem v-for="tuning in tunings" :key="tuning.id" :tuning="tuning" />
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <Teleport to="body">
            <NewTuningModal :open="open" @close="open = false" />
        </Teleport>
    </AuthenticatedLayout>
</template>