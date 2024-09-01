<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import DangerButton from "@/Components/DangerButton.vue";
import moment from "moment-js";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";

defineProps({
    students: {
        type: Array,
    },
});

const form = useForm({});

</script>

<template>

    <AuthenticatedLayout>

    <div>


        <div class="relative overflow-x-auto">
            <NavLink :href="route('students.create')" class="bg-[#FF2D20]/10" >Add Student</NavLink>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th v-for="header in headers" :key="header" class="px-6 py-3">
                        {{ header }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="student in students" :key="student.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ student.name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ student.email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ student.address }}
                    </td>
                    <td class="px-6 py-4">
                        {{ student.phone}}
                    </td>
                    <td>
                        <Link :href="route('students.edit', student.id)">
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

