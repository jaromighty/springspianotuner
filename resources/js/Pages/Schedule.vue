<script setup>
import { inject, ref } from 'vue';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { CalendarIcon, EllipsisHorizontalIcon, MapPinIcon } from '@heroicons/vue/20/solid';
import { Head } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Calendar from '@/Components/Calendar/Calendar.vue';
import NewTuningModal from '@/Components/Modals/NewTuningModal.vue';

const dayjs = inject('dayjs');

const open = ref(false);
const today = ref(dayjs().format("YYYY-MM-DD"));

const meetings = [
  {
    id: 1,
    date: 'January 10th, 2022',
    time: '5:00 PM',
    datetime: '2022-01-10T17:00',
    name: 'Leslie Alexander',
    imageUrl:
      'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    location: 'Starbucks',
  },
]
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
                        <li v-for="meeting in meetings" :key="meeting.id" class="relative flex space-x-6 py-6 xl:static">
                        <img :src="meeting.imageUrl" alt="" class="h-14 w-14 flex-none rounded-full" />
                        <div class="flex-auto">
                            <h3 class="pr-10 font-semibold text-gray-900 xl:pr-0">{{ meeting.name }}</h3>
                            <dl class="mt-2 flex flex-col text-gray-500 xl:flex-row">
                            <div class="flex items-start space-x-3">
                                <dt class="mt-0.5">
                                <span class="sr-only">Date</span>
                                <CalendarIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </dt>
                                <dd>
                                <time :datetime="meeting.datetime">{{ meeting.date }} at {{ meeting.time }}</time>
                                </dd>
                            </div>
                            <div class="mt-2 flex items-start space-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400 xl:border-opacity-50 xl:pl-3.5">
                                <dt class="mt-0.5">
                                <span class="sr-only">Location</span>
                                <MapPinIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </dt>
                                <dd>{{ meeting.location }}</dd>
                            </div>
                            </dl>
                        </div>
                        <Menu as="div" class="absolute top-6 right-0 xl:relative xl:top-auto xl:right-auto xl:self-center">
                            <div>
                            <MenuButton class="-m-2 flex items-center rounded-full p-2 text-gray-500 hover:text-gray-600">
                                <span class="sr-only">Open options</span>
                                <EllipsisHorizontalIcon class="h-5 w-5" aria-hidden="true" />
                            </MenuButton>
                            </div>

                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                            <MenuItems class="absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Edit</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Cancel</a>
                                </MenuItem>
                                </div>
                            </MenuItems>
                            </transition>
                        </Menu>
                        </li>
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