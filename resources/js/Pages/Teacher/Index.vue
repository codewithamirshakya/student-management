<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import DangerButton from "@/Components/DangerButton.vue";
import moment from "moment-js";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";

defineProps({
    teachers: {
        type: Array,
    },
});

const form = useForm({});

</script>

<template>

    <AuthenticatedLayout>

    <div>


        <div class="relative overflow-x-auto">
            <NavLink :href="route('teachers.create')" class="bg-[#FF2D20]/10" >Add Teacher</NavLink>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th v-for="header in headers" :key="header" class="px-6 py-3">
                        {{ header }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="teacher in teachers" :key="teacher.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ teacher.name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ teacher.email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ teacher.address }}
                    </td>
                    <td class="px-6 py-4">
                        {{ teacher.phone}}
                    </td>
                    <td>
                        <Link :href="route('teachers.edit', teacher.id)">
                            Edit
                        </Link>
                    </td>
                    <td></td>
                </tr>

                </tbody>
            </table>
        </div>


    </div>
        </AuthenticatedLayout>
</template>

