<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

const props = defineProps({
    user: {
    },
});
</script>

<template>
<AdminLayout title="Dashboard">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$t('dashboard')}}
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-48">
                <div class="p-5">
                    <p>Get Ready!</p>
                </div>
            </div>
            <div class="bg-white p-4 gap-4 my-2 rounded-lg shadow-md">
                <a-button :href="route('meditation.show',1)">Start</a-button>
            </div>
        </div>
    </div>
</AdminLayout>
</template>
