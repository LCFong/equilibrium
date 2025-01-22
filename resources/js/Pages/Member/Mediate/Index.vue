<script>
import MemberLayout from "@/Layouts/MemberLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';

export default {
    components: {
        MemberLayout,
        ...AntdIcons,
    },
    props: [],
    data() {
        return {

        };
    },
    created() {},
    methods: {}
}
</script>

<template>
<MemberLayout title="Dashboard">
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            情绪调解
        </div>
    </template>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4 ">

            <a-page-header class="m-0 p-0 " title="情绪调节" sub-title="请选择任意一个情绪调节情境。" />

            <audio controls>
                <!-- <source src="山的冥想.m4a" > -->
                <source :src="route('download', { 'path': 'music.mp3' })" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <img :src=" route('download', { 'path': 'login-background.jpg' }) "/>

            <div class="flex flex-col shadow-lg shadow-gray-200 rounded-2xl">
                <div class=" p-4 min-h-30 flex items-center justify-start  rounded-t-2xl bg-white ">
                    <div class="flex gap-4 items-center">
                        <div class="inline-flex justify-center items-center w-16 h-16 text-white bg-gradient-to-br from-pink-500 to-violet-300 rounded-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">情境选择</span>
                            <h3 class="text-base font-normal text-gray-500">通过选择环境避免或引发特定情绪</h3>
                        </div>
                    </div>
                </div>
                <div class="flex min-h-8 items-center bg-slate-100 text-base rounded-b-2xl justify-center">
                    進入 <a :href="route('member.mediates.answer', 'selection')" class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-yellow-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ------ -->

            <!-- 情境修正 -->
            <div class="flex flex-col shadow-lg shadow-gray-200 rounded-2xl">
                <div class=" p-4 min-h-30 flex items-center justify-start  rounded-t-2xl bg-white ">
                    <div class="flex gap-4 items-center">
                        <div class="inline-flex justify-center items-center w-16 h-16 text-white bg-gradient-to-br from-blue-500 to-cyan-300 rounded-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">情境修正</span>
                            <h3 class="text-base font-normal text-gray-500">通过改变情境特征来影响情绪。</h3>
                        </div>
                    </div>
                </div>
                <div class="flex min-h-8 items-center bg-slate-100 text-base rounded-b-2xl justify-center">
                    進入 <a :href="route('member.mediates.answer', 'revision')" class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-yellow-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ------ -->

            <!-- 注意部署 -->
            <div class="flex flex-col shadow-lg shadow-gray-200 rounded-2xl">
                <div class=" p-4 min-h-30 flex items-center justify-start  rounded-t-2xl bg-white ">
                    <div class="flex gap-4 items-center">
                        <div class="inline-flex justify-center items-center w-16 h-16 text-white bg-gradient-to-br from-teal-500 to-sky-300 rounded-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">注意部署</span>
                            <h3 class="text-base font-normal text-gray-500">改变注意力的方向（如分心或集中注意）来调节情绪。</h3>
                        </div>
                    </div>
                </div>
                <div class="flex min-h-8 items-center bg-slate-100 text-base rounded-b-2xl justify-center">
                    進入 <a :href="route('member.mediates.answer', 'attention')" class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-yellow-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ------ -->

            <!-- 认知重评/认知改变 -->
            <div class="flex flex-col shadow-lg shadow-gray-200 rounded-2xl">
                <div class=" p-4 min-h-30 flex items-center justify-start  rounded-t-2xl bg-white ">
                    <div class="flex gap-4 items-center">
                        <div class="inline-flex justify-center items-center w-16 h-16 text-white bg-gradient-to-br from-indigo-500 to-fuchsia-400 rounded-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">认知重评/认知改变</span>
                            <h3 class="text-base font-normal text-gray-500">重新评价情境的意义以改变情绪反应。</h3>
                        </div>
                    </div>
                </div>
                <div class="flex min-h-8 items-center bg-slate-100 text-base rounded-b-2xl justify-center">
                    進入 <a :href="route('member.mediates.answer', 'cognition')" class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-yellow-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ------ -->

            <!-- 反应调节 -->
            <div class="flex flex-col shadow-lg shadow-gray-200 rounded-2xl">
                <div class=" p-4 min-h-30 flex items-center justify-start  rounded-t-2xl bg-white ">
                    <div class="flex gap-4 items-center">
                        <div class="inline-flex justify-center items-center w-16 h-16 text-white bg-gradient-to-br from-red-500 to-amber-300 rounded-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">反应调节</span>
                            <h3 class="text-base font-normal text-gray-500">通过抑制或增强情绪表现（如控制面部表情）来调节情绪。</h3>
                        </div>
                    </div>
                </div>
                <div class="flex min-h-8 items-center bg-slate-100 text-base rounded-b-2xl justify-center">
                    進入 <a :href="route('member.mediates.answer', 'reaction')" class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-yellow-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ------ -->

        </div>
    </div>
</MemberLayout>
</template>

<style>
.checkedOption {
    @apply transition-transform duration-300 scale-105 bg-gradient-to-r from-sky-100 to-blue-200/60
}

.uncheckedOption {
    @apply transition-transform duration-300 scale-100
}
</style>
