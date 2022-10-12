<script setup>
import { inject, ref } from 'vue';
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import { CheckIcon } from '@heroicons/vue/24/outline';
import { useForm } from '@inertiajs/inertia-vue3';
import Calendar from '@/Components/Calendar/Calendar.vue';
import SimpleSelect from '@/Components/Forms/SimpleSelect.vue';

defineProps(['open']);
defineEmits(['close']);

const dayjs = inject('dayjs');

const today = ref(dayjs().format("YYYY-MM-DD"));

const times = [
    { label: '5:00 PM', time: '17:00:00' },
    { label: '6:00 PM', time: '18:00:00' },
];

const form = useForm({
    date: today.value,
    time: times[0]
});

const submit = () => {
    console.log(form);
}
</script>

<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="$emit('close')">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl sm:p-6">
                            <div>
                                <DialogTitle as="h3" class="text-lg font-semibold leading-6 text-gray-900">Add a new tuning</DialogTitle>
                                <div class="mt-2">
                                    <form class="space-y-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                                                <SimpleSelect class="mt-1" :items="times" v-model="form.time" />
                                            </div>
                                            <div class="text-center col-span-6 sm:col-span-3">
                                                <Calendar v-model="form.date" :today="today" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-8 sm:flex sm:flex-row-reverse">
                                <button type="button" @click="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Deactivate</button>
                                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm" @click="$emit('close')">Cancel</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>