<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Welcome from '@/Components/Welcome.vue';

const props = defineProps({
    user: {
    },
});
</script>

<template>
<AdminLayout title="Dashboard">
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            {{$t('dashboard')}}
        </div>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-48">
                <div class="p-5">
                    
                        
                </div>
            </div>
        </div>
    </div>
</AdminLayout>
</template>
