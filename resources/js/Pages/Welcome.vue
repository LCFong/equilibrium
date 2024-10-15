<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import { LoginOutlined , UserAddOutlined } from '@ant-design/icons-vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center background">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:end-0 p-6 text-end z-10 bg-white rounded-lg shadow-md px-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    <LoginOutlined /> 登入
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    <UserAddOutlined /> 註冊
                </Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <a-typography-title class="!text-blue-500 ">認知情緒調節</a-typography-title>
            </div>
            <div class="flex justify-center">
                <ApplicationMark />
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">                        <div>
                            <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="100px" viewBox="0 0 248 256" enable-background="new 0 0 248 256" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M118,31v194l128,29V2L118,31z M130,40.59l104-23.57v221.96l-104-23.57V40.59z M2,30v224h39v-30h12 c18.085,0,31.965-15.162,31.965-33.346v-19.666h14.033c3.755,0,6.72-2.965,6.72-6.621c0-0.889-0.099-1.779-0.494-2.569 l-19.468-47.435c0,0-1.779-18.085-3.36-25.002C75.181,58.132,40.751,30,3,30C2.704,30,2.988,30,2,30z M54.824,116.635 c0-4.941,3.953-8.894,8.894-8.894s8.894,3.953,8.894,8.894c0,4.941-3.953,8.894-8.894,8.894S54.824,121.576,54.824,116.635z M177.925,83.037c-5.814,0.501-10.49,5.945-10.49,12.207c0,6.209,4.627,11.107,10.49,10.856c5.995-0.256,10.921-5.716,10.921-12.235 S183.868,82.526,177.925,83.037z M216.909,160.854c-2.191-0.123-4.079-1.267-5.275-2.944c-0.114-0.121-0.227-0.184-0.284-0.302 l-14.11-14.07c-0.485-0.517-0.969-1.202-1.238-1.824l-4.316-9.765l0.212,17.114l19.51,11.943c3.714,2.238,5.444,6.875,4.116,10.784 c-1.321,3.949-5.306,6.147-9.458,5.215l-28.191-9.947l-25.49,5.334c-3.302,0.228-6.429-2.232-7.492-5.925 c-1.014-3.624,0.31-7.446,3.203-9.06l16.459-9.356l0.191-16.255l-3.842,9.097c-0.235,0.675-0.658,1.188-1.08,1.648l-11.683,11.853 c-0.09,0.098-0.179,0.144-0.224,0.244c-0.938,1.329-2.404,2.215-4.082,2.121c-2.801-0.157-5.053-2.841-5.053-6.101 c0-1.755,0.691-3.284,1.774-4.351c0.13-0.197,0.261-0.343,0.391-0.54l10.71-11.163l7.137-17.403c2.016-4.5,4.855-7.434,9.318-7.598 l19.742-0.727c4.839-0.178,8.095,2.668,10.414,7.429l8.523,18.927l13.788,13.314c0.176,0.182,0.352,0.422,0.528,0.662 c1.472,1.284,2.418,3.142,2.418,5.258C223.642,158.174,220.637,161.063,216.909,160.854z"></path> </g></svg>

                            </div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 ">自我認知</h2>
                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                用戶透過活動提升對自身情緒狀態的認知，幫助他們識別情緒問題的根源，從而更好地理解自己的感受。
                            </p>
                        </div>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg> -->
                    </div>

                    <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="100px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#231F20" d="M60,0H16c-2.211,0-4,1.789-4,4v6H4c-2.211,0-4,1.789-4,4v30c0,2.211,1.789,4,4,4h7c0.553,0,1,0.447,1,1v11 c0,1.617,0.973,3.078,2.469,3.695C14.965,63.902,15.484,64,16,64c1.039,0,2.062-0.406,2.828-1.172l14.156-14.156 c0,0,0.516-0.672,1.672-0.672S50,48,50,48c2.211,0,4-1.789,4-4v-8h6c2.211,0,4-1.789,4-4V4C64,1.789,62.211,0,60,0z M52,44 c0,1.105-0.895,2-2,2c0,0-14.687,0-15.344,0C32.709,46,32,47,32,47S20,59,18,61c-2.141,2.141-4,0.391-4-1c0-1,0-12,0-12 c0-1.105-0.895-2-2-2H4c-1.105,0-2-0.895-2-2V14c0-1.105,0.895-2,2-2h46c1.105,0,2,0.895,2,2V44z M62,32c0,1.105-0.895,2-2,2h-6V14 c0-2.211-1.789-4-4-4H14V4c0-1.105,0.895-2,2-2h44c1.105,0,2,0.895,2,2V32z"></path> <path fill="#231F20" d="M13,24h13c0.553,0,1-0.447,1-1s-0.447-1-1-1H13c-0.553,0-1,0.447-1,1S12.447,24,13,24z"></path> <path fill="#231F20" d="M41,28H13c-0.553,0-1,0.447-1,1s0.447,1,1,1h28c0.553,0,1-0.447,1-1S41.553,28,41,28z"></path> <path fill="#231F20" d="M34,34H13c-0.553,0-1,0.447-1,1s0.447,1,1,1h21c0.553,0,1-0.447,1-1S34.553,34,34,34z"></path> </g> </g></svg>

                            </div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900">實時反饋</h2>
                            <p class="mt-4 text-gray-500  text-sm leading-relaxed">
                                系統提供即時的反饋和建議，幫助用戶在情緒波動時進行調節，促使他們做出更健康的情緒反應。
                            </p>
                           
                        </div>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg> -->
                    </div>

                    <div class="scale-100 p-6 bg-white  from-gray-700/50 via-transparent  rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="h-16 w-16 bg-red-50  flex items-center justify-center rounded-full">
                                <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17 21H7C3 21 2 20 2 16V8C2 4 3 3 7 3H17C21 3 22 4 22 8V16C22 20 21 21 17 21Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 8H19" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15 12H19" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17 16H19" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.49994 11.2899C9.49958 11.2899 10.3099 10.4796 10.3099 9.47992C10.3099 8.48029 9.49958 7.66992 8.49994 7.66992C7.50031 7.66992 6.68994 8.48029 6.68994 9.47992C6.68994 10.4796 7.50031 11.2899 8.49994 11.2899Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.33C11.86 14.88 10.71 13.74 9.26 13.61C8.76 13.56 8.25 13.56 7.74 13.61C6.29 13.75 5.14 14.88 5 16.33" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 ">個性化指引</h2>
                            <p class="mt-4 text-gray-500  text-sm leading-relaxed">
                                根據用戶的情緒狀況，系統提供量身定制的指引和提示，幫助他們找到適合自己的情緒調節方法。
                            </p>
                        </div>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg> -->
                    </div>

                    <div class="scale-100 p-6 bg-white  from-gray-700/50 via-transparent  rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="h-16 w-16 bg-red-50  flex items-center justify-center rounded-full">
                                <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9922 8.07411C18.7683 8.30212 18.5423 8.50328 18.3375 8.67188C18.1401 8.50899 17.9227 8.31226 17.7078 8.08774C16.9853 7.333 16.5 6.48786 16.5 5.6875C16.5 4.59138 17.3653 3.75 18.375 3.75C19.3847 3.75 20.25 4.59138 20.25 5.6875C20.25 6.46225 19.7514 7.30076 18.9922 8.07411ZM21.75 5.6875C21.75 8.4375 18.375 10.5 18.375 10.5C18.2063 10.5 15 8.4375 15 5.6875C15 3.78902 16.511 2.25 18.375 2.25C20.239 2.25 21.75 3.78902 21.75 5.6875ZM3.75 9C3.75 10.2426 4.75736 11.25 6 11.25H18C20.0711 11.25 21.75 12.9289 21.75 15C21.75 17.0711 20.0711 18.75 18 18.75H9.75V17.25H18C19.2426 17.25 20.25 16.2426 20.25 15C20.25 13.7574 19.2426 12.75 18 12.75H6C3.92893 12.75 2.25 11.0711 2.25 9C2.25 6.92893 3.92893 5.25 6 5.25L14.25 5.25V6.75L6 6.75C4.75736 6.75 3.75 7.75736 3.75 9ZM6.24215 19.3241C6.01829 19.5521 5.79234 19.7533 5.58752 19.9219C5.39011 19.759 5.1727 19.5623 4.95777 19.3377C4.23528 18.583 3.75 17.7379 3.75 16.9375C3.75 15.8414 4.61529 15 5.625 15C6.63471 15 7.5 15.8414 7.5 16.9375C7.5 17.7123 7.00145 18.5508 6.24215 19.3241ZM9 16.9375C9 19.6875 5.625 21.75 5.625 21.75C5.45625 21.75 2.25 19.6875 2.25 16.9375C2.25 15.039 3.76104 13.5 5.625 13.5C7.48896 13.5 9 15.039 9 16.9375ZM6.75 16.875C6.75 17.4963 6.24632 18 5.625 18C5.00368 18 4.5 17.4963 4.5 16.875C4.5 16.2537 5.00368 15.75 5.625 15.75C6.24632 15.75 6.75 16.2537 6.75 16.875ZM18.375 6.75C18.9963 6.75 19.5 6.24632 19.5 5.625C19.5 5.00368 18.9963 4.5 18.375 4.5C17.7537 4.5 17.25 5.00368 17.25 5.625C17.25 6.24632 17.7537 6.75 18.375 6.75Z" fill="#080341"></path> </g></svg>

                            </div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 ">持續追蹤</h2>
                            <p class="mt-4 text-gray-500  text-sm leading-relaxed">
                                系統持續追蹤用戶的情緒變化，提供長期的支持與建議，幫助他們建立健康的情緒管理習慣。
                            </p>
                        </div>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg> -->
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm sm:text-start">
                    &nbsp;
                </div>

                <div class="text-center text-sm text-gray-500  sm:text-end sm:ms-0">
                    <a href="https://hubis.ltd">Hubis</a>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}

.background{
    background: rgb(184,240,206);
    background: linear-gradient(225deg, rgba(184,240,206,0.5746673669467788) 0%, rgba(220,252,240,0.4766281512605042) 25%, rgba(235,246,245,0.40940126050420167) 60%, rgba(208,250,250,0.4682247899159664) 100%);
}
</style>
