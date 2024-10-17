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

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <!-- 學習 -->
    <div class="bg-white p-4 rounded-lg shadow-md flex">
        <img src="https://picsum.photos/100/150?random=1" alt="學習" class="w-24 rounded mr-4">
        <div>
            <h2 class="text-xl font-bold mb-2">學習</h2>
            <p class="mb-4">學習是一個持續的過程，涉及知識的獲取、技能的發展和思維方式的改變。本部分將分享有效的學習方法，包括時間管理、記憶技巧及資源的利用，幫助你在學習過程中事半功倍，達到更好的效果。</p>
            <button class="bg-blue-500 text-white py-2 px-4 rounded">進入</button>
        </div>
    </div>

    <!-- 人際 -->
    <div class="bg-white p-4 rounded-lg shadow-md flex">
        <img src="https://picsum.photos/100/150?random=2" alt="人際" class="w-24 rounded mr-4">
        <div>
            <h2 class="text-xl font-bold mb-2">人際</h2>
            <p class="mb-4">人際關係是生活中不可或缺的一部分，良好的人際關係可以增強社會支持，提升生活滿意度。本部分將探討如何建立和維持健康的人際關係，分享溝通技巧、情感管理以及如何處理衝突的策略，助你在人際交往中游刃有餘。</p>
            <button class="bg-blue-500 text-white py-2 px-4 rounded">進入</button>
        </div>
    </div>

    <!-- 同伴 -->
    <div class="bg-white p-4 rounded-lg shadow-md flex">
        <img src="https://picsum.photos/100/150?random=3" alt="同伴" class="w-24 rounded mr-4">
        <div>
            <h2 class="text-xl font-bold mb-2">同伴</h2>
            <p class="mb-4">找到合適的同伴能夠促進共同學習和成長。本部分將提供有關如何尋找志同道合的夥伴的建議，分享建立支持性學習環境的方法，以及如何在團隊合作中發揮個人優勢，達成共同目標。</p>
            <button class="bg-blue-500 text-white py-2 px-4 rounded">進入</button>
        </div>
    </div>

    <!-- 睡眠 -->
    <div class="bg-white p-4 rounded-lg shadow-md flex">
        <img src="https://picsum.photos/100/150?random=4" alt="睡眠" class="w-24 rounded mr-4">
        <div>
            <h2 class="text-xl font-bold mb-2">睡眠</h2>
            <p class="mb-4">良好的睡眠對於身心健康至關重要。本部分將深入探討睡眠的重要性，提供改善睡眠質量的實用技巧，包括睡前習慣、環境調整和壓力管理等，幫助你獲得更好的休息，提升生活品質。</p>
            <button class="bg-blue-500 text-white py-2 px-4 rounded">進入</button>
        </div>
    </div>
</div>


                </div>
            </div>
            <div class="bg-white p-4 gap-4 my-2 rounded-lg shadow-md">
                <a-button :href="route('meditation.show',1)">Start</a-button>
            </div>
        </div>
    </div>
</AdminLayout>
</template>
