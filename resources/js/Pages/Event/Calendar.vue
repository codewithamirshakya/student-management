<script setup>
import { usePage, Link } from '@inertiajs/vue3';
import { ScheduleXCalendar } from '@schedule-x/vue'
import {
    createCalendar,
    createViewDay,
    createViewMonthAgenda,
    createViewMonthGrid,
    createViewWeek,
} from '@schedule-x/calendar'
import '@schedule-x/theme-default/dist/index.css'
import NavLink from "@/Components/NavLink.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    events: {
        type: Array,
    },
});
// Access the `events` prop directly
const events = props.events;

// Example of using the events value
console.log('Events:', events.length);
let eventsList = [];

events.forEach(event => {
    eventsList.push({
        id: event.id,
        title: event.name,
        start: event.from,
        end: event.to,
    });
});

const calendarApp = createCalendar({
    views: [
        createViewDay(),
        createViewWeek(),
        createViewMonthGrid(),
        createViewMonthAgenda(),
    ],
    events: eventsList,
})
</script>

<template>
    <AuthenticatedLayout>
        <div>
            <NavLink class="bg-[#FF2D20]/10" :href="route('events.create')" :active="route().current('events.create')">
                Create Event
            </NavLink>
        </div>
        <div>
            <ScheduleXCalendar :calendar-app="calendarApp" />
        </div>
    </AuthenticatedLayout>
</template>

