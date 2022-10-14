<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { CalendarIcon, EllipsisHorizontalIcon, MapPinIcon } from '@heroicons/vue/20/solid';

defineProps({
    tuning: Object
});
</script>

<template>
    <li class="relative flex space-x-6 py-6 xl:static">
        <span class="inline-flex h-14 w-14 items-center justify-center rounded-full bg-blue-500">
            <span class="text-xl font-medium leading-none text-white">{{ tuning.client ? tuning.client.initials : "A" }}</span>
        </span>
        <div class="flex-auto">
            <h3 class="pr-10 font-semibold text-gray-900 xl:pr-0">{{ tuning.client ? tuning.client.full_name : "Available" }}</h3>
            <dl class="mt-2 flex flex-col text-gray-500 xl:flex-row">
                <div class="flex items-start space-x-3">
                    <dt class="mt-0.5">
                        <span class="sr-only">Date</span>
                        <CalendarIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd>
                        <time :datetime="tuning.scheduled_at">{{ tuning.scheduled_at }}</time>
                    </dd>
                </div>
                <div class="mt-2 flex items-start space-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400 xl:border-opacity-50 xl:pl-3.5">
                    <dt class="mt-0.5">
                        <span class="sr-only">Location</span>
                        <MapPinIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </dt>
                    <dd>{{ tuning.address ? tuning.address.full_address : "No Location" }}</dd>
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
</template>