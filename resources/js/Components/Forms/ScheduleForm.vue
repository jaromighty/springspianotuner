<script setup>
import { ref } from 'vue';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid';
import { useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    tunings: Array
});

const selected = ref({ scheduled_at: "Select a day and time" });

const form = useForm({
    _method: 'PUT',
    first_name: "",
    last_name: "",
    email: "",
    street: "",
    city: "",
    state: "",
    zip: "",
    tuning_id: 0
});

const success = () => {
    form.reset();
    selected.value = { scheduled_at: "Select a day and time" };
}

const submit = () => {
    form.tuning_id = selected.value.id;
    form.post(route('tunings.update', [form.tuning_id]), {
        preserveState: true,
        onSuccess: () => success()
    });
}
</script>

<template>
    <form id="schedule" class="mt-8 relative max-w-lg mx-auto px-4 scroll-mt-8 sm:px-6 lg:hidden" @submit.prevent="submit">
        <div>
            <div class="text-center">
                <h3 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Schedule Tuning</h3>
                <div class="mt-8 text-left grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-12">
                    <div class="sm:col-span-6">
                        <InputLabel for="first-name" value="First Name" />
                        <TextInput id="first-name" type="text" class="mt-1 block w-full" v-model="form.first_name" required autofocus />
                        <InputError class="mt-2" :message="form.errors.first_name" />
                    </div>
                    <div class="sm:col-span-6">
                        <InputLabel for="last-name" value="Last Name" />
                        <TextInput id="last-name" type="text" class="mt-1 block w-full" v-model="form.last_name" required />
                        <InputError class="mt-2" :message="form.errors.last_name" />
                    </div>
                    <div class="sm:col-span-12">
                        <InputLabel for="email" value="Email Address" />
                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                    <div class="sm:col-span-12 relative">
                        <Listbox as="div" v-model="selected">
                            <ListboxLabel class="block text-sm font-medium text-gray-700">Date and Time</ListboxLabel>
                            <div class="relative mt-1">
                                <ListboxButton class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                                    <span class="block truncate">{{ selected.scheduled_at }}</span>
                                    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                    </span>
                                </ListboxButton>

                                <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <ListboxOptions class="absolute z-30 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                        <ListboxOption as="template" v-for="tuning in tunings" :key="tuning.id" :value="tuning" v-slot="{ active, selected }">
                                            <li :class="[active ? 'text-white bg-blue-600' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                                <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">{{ tuning.scheduled_at }}</span>

                                                <span v-if="selected" :class="[active ? 'text-white' : 'text-blue-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                                </span>
                                            </li>
                                        </ListboxOption>
                                    </ListboxOptions>
                                </transition>
                            </div>
                        </Listbox>
                    </div>
                    <div class="sm:col-span-12">
                        <InputLabel for="street" value="Street Address" />
                        <TextInput id="street" type="text" class="mt-1 block w-full" v-model="form.street" required />
                        <InputError class="mt-2" :message="form.errors.street" />
                    </div>
                    <div class="sm:col-span-5">
                        <InputLabel for="city" value="City" />
                        <TextInput id="city" type="text" class="mt-1 block w-full" v-model="form.city" required />
                        <InputError class="mt-2" :message="form.errors.city" />
                    </div>
                    <div class="sm:col-span-4">
                        <InputLabel for="state" value="State" />
                        <TextInput id="state" type="text" class="mt-1 block w-full" v-model="form.state" required />
                        <InputError class="mt-2" :message="form.errors.state" />
                    </div>
                    <div class="sm:col-span-3">
                        <InputLabel for="zip" value="Postal Code" />
                        <TextInput id="zip" type="text" class="mt-1 block w-full" v-model="form.zip" required />
                        <InputError class="mt-2" :message="form.errors.zip" />
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-6">
            <PrimaryButton class="w-full justify-center">
                Schedule
            </PrimaryButton>
        </div>
    </form>
</template>