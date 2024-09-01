<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import DangerButton from "@/Components/DangerButton.vue";
import moment from "moment-js";

defineProps({
    events: {
        type: Array,
    },
});

const form = useForm({});

const deleteEvent = (id) => {
    if (confirm("Are you sure you want to move this to trash")) {
        form.delete(route("event.delete", { id: id }), {
            preserveScroll: true,
        });
    }
};

const formatDate = (date) => {
    return moment(date).format("MM/DD/YYYY hh:mm");
};
</script>

<template>
    <div>
        <h1>My Inertia CRUD</h1>
        <table>
            <thead>
            <tr>
                <th v-for="header in headers" :key="header">
                    {{ header }}
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="event in events" :key="event.id">
                <td>{{ event.name }}</td>
                <td>{{ event.from }} to {{ event.to }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

