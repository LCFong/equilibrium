<script>
import MemberLayout from "@/Layouts/MemberLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';

export default {
    components: {
        MemberLayout,
        ...AntdIcons,
    },
    props: ['logged'],
    data() {
        return {
            
        };
    },
    created(){
    },
    methods:{
        redirectUrl(url){
            window.location.href = url;
        }
    }
}
</script>

<template>
<MemberLayout title="Dashboard" >
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            压力感知
        </div>
    </template>

    <div class="py-12">
        
        <div class=" mx-auto px-6 py-2 md:px-1 lg:px-8 grid grid-cols-1 md:grid-cols-2 md:w-[70vw] gap-10 ">

            <div class="flex flex-col shadow-md rounded-lg hover:scale-105 transition-transform cursor-pointer" @click="redirectUrl( route('member.consultations.answer', 'peer'))">
                <div class="flex justify-between items-center rounded-t-lg bg-violet-300 sm:px-8 lg:px-12 px-6 min-h-36 relative overflow-hidden">
                    <div class=" text-4xl  font-extrabold z-20">
                        同伴影响
                    </div>
                    <div class="icon  ">
                        <svg fill="#000000" class="w-24 " viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#475569" fill-opacity="0.5" d="M746 835.28L544.529 723.678c74.88-58.912 95.216-174.688 95.216-239.601v-135.12c0-89.472-118.88-189.12-238.288-189.12-119.376 0-241.408 99.664-241.408 189.12v135.12c0 59.024 24.975 178.433 100.624 239.089L54 835.278S0 859.342 0 889.342v81.088c0 29.84 24.223 54.064 54 54.064h692c29.807 0 54.031-24.224 54.031-54.064v-81.087c0-31.808-54.032-54.064-54.032-54.064zm-9.967 125.215H64.002V903.28c4.592-3.343 11.008-7.216 16.064-9.536 1.503-.688 3.007-1.408 4.431-2.224l206.688-112.096c18.848-10.224 31.344-29.184 33.248-50.528s-7.008-42.256-23.712-55.664c-53.664-43.024-76.656-138.32-76.656-189.152V348.96c0-45.968 86.656-125.12 177.408-125.12 92.432 0 174.288 78.065 174.288 125.12v135.12c0 50.128-15.568 145.84-70.784 189.28a64.098 64.098 0 0 0-24.224 55.664 64.104 64.104 0 0 0 33.12 50.849l201.472 111.6c1.777.975 4.033 2.031 5.905 2.848 4.72 2 10.527 5.343 14.783 8.288v57.887zM969.97 675.936L765.505 564.335c74.88-58.912 98.224-174.688 98.224-239.601v-135.12c0-89.472-121.872-190.128-241.28-190.128-77.6 0-156.943 42.192-203.12 96.225 26.337 1.631 55.377 1.664 80.465 9.664 33.711-26.256 76.368-41.872 122.656-41.872 92.431 0 177.278 79.055 177.278 126.128v135.12c0 50.127-18.56 145.84-73.775 189.28a64.098 64.098 0 0 0-24.224 55.664 64.104 64.104 0 0 0 33.12 50.848l204.465 111.6c1.776.976 4.032 2.032 5.904 2.848 4.72 2 10.527 5.344 14.783 8.288v56.912H830.817c19.504 14.72 25.408 35.776 32.977 64h106.192c29.807 0 54.03-24.224 54.03-54.064V730.03c-.015-31.84-54.047-54.096-54.047-54.096z" /></svg>
                    </div>
                    <div class="bg-violet-500/20 h-60 w-60 rounded-full absolute -top-40 -left-36 z-0">&nbsp;</div>
                    <div class="bg-violet-500/20 h-60 w-60 rounded-full absolute right-36 top-16 z-0">&nbsp;</div>
                </div>
                <div class="flex  bg-violet-400 min-h-10 items-center text-base px-12 rounded-b-lg ">
                    点击进入 <a :href="route('member.consultations.answer', 'peer')" class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-yellow-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ------------------------- -->
            <div class="flex flex-col shadow-md rounded-lg hover:scale-105 transition-transform cursor-pointer" @click="redirectUrl( route('member.consultations.answer', 'study'))">
                <div class="flex justify-between items-center rounded-t-lg bg-indigo-500 sm:px-8 lg:px-12 px-6 min-h-36 relative overflow-hidden">
                    <div class=" text-4xl text-slate-200 font-extrabold z-20">
                        学业压力
                    </div>
                    <div class="icon  ">
                        <svg version="1.1" class="w-24 " fill-opacity="0.6" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" sodipodi:docname="book.svg" inkscape:version="0.48.4 r9939" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve">
                            <path fill="#475569" inkscape:connector-curvature="0" d="M454.771,10.997c-76.209-40.113-226.406,37.395-269.553,105.63c-19.222,30.534-17.862,52.538-17.862,65.022v667.874L730.602,1200l105.917-57.833V491.739L258.215,159.706c31.033-39.057,100.827-86.683,153.16-67.555l515.104,275.498l0.001,724.58l106.184-57.936V309.728L454.771,10.997z" />
                        </svg>
                    </div>
                    <div class="bg-indigo-700/40 h-60 w-60 rounded-full absolute -top-40 left-[25%] z-0">&nbsp;</div>
                    <div class="bg-indigo-700/50 h-60 w-60 rounded-full absolute right-[40%] top-16 z-0">&nbsp;</div>
                </div>
                <div class="flex  bg-indigo-700 min-h-10 items-center text-base px-12 rounded-b-lg text-white">
                    点击进入
                    <a class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-indigo-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ------------------------- -->
            <div class="flex flex-col shadow-md rounded-lg hover:scale-105 transition-transform cursor-pointer" @click="redirectUrl( route('member.consultations.answer', 'interpersonal'))">
                <div class="flex justify-between items-center rounded-t-lg bg-green-300 sm:px-8 lg:px-12 px-6 min-h-36 relative overflow-hidden">
                    <div class=" text-4xl  font-extrabold z-20">
                        人际关系
                    </div>
                    <div class="icon py-2 ">
                        <svg version="1.1" fill-opacity="0.4" class="w-24 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 263.976 263.976" style="enable-background:new 0 0 263.976 263.976;" xml:space="preserve">
                            <g><path fill="#475569" d="M149.763,36.21c3.01-3.811,4.871-8.616,4.871-13.837C154.634,10.036,144.628,0,132.291,0s-22.358,10.036-22.358,22.373
		c0,5.222,1.597,10.026,4.605,13.837c-9.211,5.839-15.55,16.117-15.55,27.807v27.22c0,4.143,3.785,7.739,7.928,7.739h50.811
		c4.143,0,7.262-3.597,7.262-7.739v-27.22C164.988,52.327,158.976,42.048,149.763,36.21z"/><path fill="#475569" d="M81.988,124.539v-27.22c0-11.689-5.754-21.969-14.967-27.807c3.01-3.811,5-8.616,5-13.837
		c0-12.337-9.942-22.373-22.279-22.373S27.416,43.339,27.416,55.676c0,5.222,1.855,10.026,4.863,13.837
		c-9.212,5.839-15.292,16.117-15.292,27.807v27.22c0,4.143,3.301,7.437,7.443,7.437h50.811
		C79.384,131.976,81.988,128.682,81.988,124.539z"/><path  fill="#475569" d="M232.034,69.513c3.008-3.811,5.006-8.616,5.006-13.837c0-12.337-9.939-22.373-22.276-22.373
		c-12.337,0-22.325,10.036-22.325,22.373c0,5.222,1.843,10.026,4.852,13.837c-9.212,5.839-15.304,16.117-15.304,27.807v27.22
		c0,4.143,3.326,7.437,7.469,7.437h50.811c4.143,0,6.721-3.294,6.721-7.437v-27.22C246.988,85.63,241.245,75.351,232.034,69.513z"/><path fill="#64748b" d="M149.763,201.464c3.01-3.811,4.871-8.615,4.871-13.836c0-12.337-10.006-22.373-22.343-22.373s-22.358,10.036-22.358,22.373
		c0,5.221,1.597,10.026,4.605,13.837c-9.211,5.839-15.55,16.117-15.55,27.807v27.22c0,4.143,3.785,7.484,7.928,7.484h50.811
		c4.143,0,7.262-3.342,7.262-7.484v-27.22C164.988,217.581,158.976,207.304,149.763,201.464z M132.321,180.255
		c4.065,0,7.373,3.308,7.373,7.373c0,4.066-3.308,7.373-7.373,7.373s-7.373-3.308-7.373-7.373
		C124.948,183.563,128.255,180.255,132.321,180.255z M149.988,248.976h-36v-19.704c0-9.874,8.127-17.906,18.001-17.906
		c9.872,0,17.999,8.032,17.999,17.906V248.976z"/><path fill="#94a3b8" d="M138.988,138.555v-24.854c0-4.143-3.357-7.5-7.5-7.5c-4.143,0-7.5,3.357-7.5,7.5v24.854c0,4.143,3.357,7.5,7.5,7.5
		C135.63,146.055,138.988,142.697,138.988,138.555z"/><path fill="#94a3b8" d="M59.331,140.177c-3.009-2.847-7.753-2.718-10.604,0.289c-2.848,3.008-2.718,7.755,0.289,10.604l37.709,35.707
		c1.451,1.373,3.305,2.054,5.156,2.054c1.987,0,3.972-0.786,5.447-2.343c2.848-3.008,2.718-7.755-0.289-10.604L59.331,140.177z"/><path fill="#94a3b8" d="M205.241,140.071l-37.606,35.789c-3.001,2.855-3.118,7.603-0.263,10.603c1.474,1.55,3.452,2.33,5.434,2.33
		c1.857,0,3.718-0.686,5.169-2.067l37.606-35.789c3.001-2.855,3.118-7.602,0.263-10.602
		C212.989,137.332,208.241,137.217,205.241,140.071z"/></g></svg>
                    </div>
                    <div class="bg-green-500/30 h-60 w-60 rounded-full absolute top-24 -left-10 z-0">&nbsp;</div>
                    <div class="bg-green-500/30 h-60 w-60 rounded-full absolute right-[25%] -top-32 z-0">&nbsp;</div>
                </div>
                <div class="flex  bg-green-400 min-h-10 items-center text-base px-12 rounded-b-lg ">
                    点击进入
                    <a class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-green-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ------------------------- -->
            <div class="flex flex-col shadow-md rounded-lg  hover:scale-105 transition-transform cursor-pointer" @click="redirectUrl( route('member.consultations.answer', 'sleep'))">
                <div class="flex justify-between items-center rounded-t-lg bg-pink-200 sm:px-8 lg:px-12 px-6 min-h-36 relative overflow-hidden">
                    <div class=" text-4xl  font-extrabold z-20">
                        睡眠
                    </div>
                    <div class="icon py-2 ">
                        <svg class="w-24 " fill-opacity="0.4" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.8657 7.46922C16.3036 9.21179 16 11.0704 16 13C16 22.9411 24.0589 31 34 31C36.5346 31 38.9468 30.4761 41.1343 29.5308C38.8006 36.766 32.0116 42 24 42C14.0589 42 6 33.9411 6 24C6 16.5935 10.4734 10.2317 16.8657 7.46922Z" fill="#475569" stroke="#94a3b8" stroke-opacity="0.3" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M31.6605 10H41L31 18H41" stroke="#475569" stroke-width="2" stroke-opacity="0.3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="bg-pink-400/30 h-60 w-60 rounded-full absolute -top-40 left-10 z-0">&nbsp;</div>
                    <div class="bg-pink-400/30 h-60 w-60 rounded-full absolute top-24 right-10 z-0">&nbsp;</div>
                    <div class="bg-pink-400/30 h-60 w-60 rounded-full absolute top-10 right-48 z-0">&nbsp;</div>
                </div>
                <div class="flex  bg-pink-400/70 min-h-10 items-center text-base px-12 rounded-b-lg ">
                    点击进入
                    <a class=" mx-1 rounded-full p-1 w-6 text-center h-auto text-green-600 font-extrabold text-base bg-white ">
                        <svg fill="#000000" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" id="arrow">
                            <path d="M8.29289 2.29289C8.68342 1.90237 9.31658 1.90237 9.70711 2.29289L14.2071 6.79289C14.5976 7.18342 14.5976 7.81658 14.2071 8.20711L9.70711 12.7071C9.31658 13.0976 8.68342 13.0976 8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L11 8.5H1.5C0.947715 8.5 0.5 8.05228 0.5 7.5C0.5 6.94772 0.947715 6.5 1.5 6.5H11L8.29289 3.70711C7.90237 3.31658 7.90237 2.68342 8.29289 2.29289Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div v-if="$page.props.mediate" class="col-span-full flex  justify-center">
                <a-button class="w-[60vw] md:w-[40vw] h-10 shadow rounded-lg  hover:scale-110 hover:bg-slate-100" @click="redirectUrl( route('member.consultations.toMediate'))">下一步 <ArrowRightOutlined /> </a-button>
            </div>
        </div>
    </div>
</MemberLayout>
</template>

<style>
.checkedOption{
    @apply transition-transform duration-300 scale-105 bg-gradient-to-r from-sky-100 to-blue-200/60
}
.uncheckedOption{
    @apply transition-transform duration-300 scale-100
}

</style>