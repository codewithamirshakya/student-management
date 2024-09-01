<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import DangerButton from "@/Components/DangerButton.vue";
import moment from "moment-js";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";

defineProps({
    grades: {
        type: Array,
    },
});

const form = useForm({});

const formatDate = (date) => {
    return moment(date).format("MM/DD/YYYY hh:mm");
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="relative overflow-x-auto">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th v-for="header in headers" :key="header" class="px-6 py-3">
                        {{ header }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="grade in grades" :key="grade.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ grade.title }}
                    </th>

                </tr>

                </tbody>
            </table>
        </div>

    </AuthenticatedLayout>
</template>

