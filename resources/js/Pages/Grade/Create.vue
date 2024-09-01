<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
});

const save = () => {
    form.post(route("grades.store"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Event Management" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Grade
            </h2>
        </template>

        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="save">
                        <div class="space-y-12 p-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2
                                    class="text-base font-semibold leading-7 text-gray-900"
                                >
                                    Grade
                                </h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">
                                    Add grade details here
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
                                <button
                                    type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                >
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
