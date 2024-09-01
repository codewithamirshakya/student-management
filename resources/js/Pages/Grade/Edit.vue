<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["grade"]);

const form = useForm({
    id: props.grade.id,
    title: props.grade.title,
});

const update = () => {
    form.put(route("grades.update", props.grade.id));
};
</script>

<template>
    <Head title="Event Management" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Grade
            </h2>
        </template>

        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="update">
                        <div class="space-y-12 p-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2
                                    class="text-base font-semibold leading-7 text-gray-900"
                                >
                                    Event
                                </h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">
                                    Update the event details here
                                </p>

                                <div
                                    class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                                >
                                    <div class="sm:col-span-3">
                                        <label
                                            for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                        >Grade</label
                                        >
                                        <div class="mt-2">
                                            <input
                                                type="text"
                                                v-model="form.title"
                                                id="title"
                                                autocomplete="grade"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div
                                class="mt-6 flex items-center justify-end gap-x-6"
                            >
                                <button
                                    type="button"
                                    class="text-sm font-semibold leading-6 text-gray-900"
                                >
                                    Cancel
                                </button>
                                <PrimaryButton
                                    class="bg-indigo-800 hover:bg-blue-500"
                                >Save</PrimaryButton
                                >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
