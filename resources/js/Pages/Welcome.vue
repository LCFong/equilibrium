<script setup>
import { ref, onMounted } from 'vue';
import {
    Head,
    Link
} from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import {
    LoginOutlined,
    UserAddOutlined
} from '@ant-design/icons-vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const message = ref("吸气")
const show = ref(true)

onMounted(()=>{
  setTimeout(() => {
      message.value = "呼气";
  }, 6500); 

  setTimeout(() => {
    show.value = false;
  }, 12000); // 9000 毫秒 = 9 秒
})

</script>

<template>

<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center background">
    
    <!-- <div v-if="canLogin" class="sm:fixed sm:top-0 sm:end-0 p-6 text-end z-10 bg-white rounded-b-lg shadow-md px-10 w-full " >
        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>
        <template v-else>
            <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            <LoginOutlined /> 登入
            </Link>

            <Link v-if="canRegister" :href="route('register')" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            <UserAddOutlined /> 註冊
            </Link>
        </template>
    </div> -->
    <div class="w-full mx-auto">
      <div class="overflow-y-hidden h-screen" v-if="show">
        <div class="circle_all ">
            <div class="circle_Q ">
                <div class="circle_message">
                    {{ message }}
                </div>
            </div>
            <div class="circle_A "></div>
            <div class="circle_B "></div>
        </div>
      </div>
      <div v-if="!show" class="max-w-4xl mx-auto">
        <p class="font-bold text-2xl text-center">学生心理健康养护平台</p>
        <p class="font-bold text-xl">这个平台是为大学生压力感知及情绪调节所设计，目标是为了在日常生活中感知和觉察压力来源，有效的预防心理问题的产生。</p>
        <a-divider />
        <p class="font-bold text-base">情绪失调，尤其是长期处于压力、焦虑、抑郁或情绪不稳定的状态时，可能会表现出一些躯体化症状。躯体化是指情绪或心理问题通过身体症状表现出来。以下是一些常见的躯体化症状：疲劳感、头痛、胃肠道问题、胸痛或胸闷、肌肉紧张和疼痛、睡眠问题、心跳加速或心悸、呼吸急促、出汗、免疫系统问题、皮肤问题，这些躯体化症状有时可能被误认为是身体健康问题，实际上它们往往是情绪或心理问题的表现。如果情绪失调症状严重或持续，建议寻求专业帮助，及时进行情绪调节或心理治疗，以防止症状进一步加重。</p>
        <a-divider />
        <div class="text-center">
          <a class="py-2 px-6 rounded-lg shadow border-1 bg-white hover:bg-slate-50" :href="route('login')">开始</a>
        </div>
      </div>
    </div>
</div>
</template>


<style scoped>

.circle_all {
    position: relative;
    margin-left: auto;
    margin-right: auto;
    @apply h-[70vh];
}
.circle_A {
    @apply absolute left-1/2  w-[800px] h-[800px] -bottom-[45vh] translate-x-[-50%] translate-y-[50%] rounded-full z-[7] bg-cyan-400 opacity-30 ;
    animation: scaleCircle_A 9s linear forwards ;
    animation-delay: 2s;
}
@keyframes scaleCircle_A {
  0% {
    @apply  w-[800px] h-[800px] -bottom-[45vh] opacity-15;
    
    /* height: 70vw; */
  }
  35% {
    @apply  w-[1400px] h-[1400px] -bottom-[45vh] opacity-20;
    /* width: 100vw; 
    height: 90vw;  */
  }
  50% {
    @apply w-[1400px] h-[1400px] -bottom-[45vh] opacity-20;
    /* width: 100vw;
    height: 90vw;  */
  }
  100% {
    @apply w-[750px] h-[750px] -bottom-[45vh] opacity-15;
  }
}
.circle_B {
    @apply absolute left-1/2  w-[750px] h-[750px] -bottom-[45vh] translate-x-[-50%] translate-y-[50%] rounded-full z-[8] bg-cyan-400 opacity-40 ;
    animation: scaleCircle_B 9s linear forwards;
    animation-delay: 2s;
}
@keyframes scaleCircle_B {
  0% {
    @apply   w-[750px] h-[750px] -bottom-[45vh] opacity-20;
    
    /* height: 70vw; */
  }
  35% {
    @apply  w-[1300px] h-[1300px] -bottom-[45vh] opacity-25;
    /* width: 100vw; 
    height: 90vw;  */
  }
  50% {
    @apply w-[1300px] h-[1300px] -bottom-[45vh] opacity-25;
    /* width: 100vw;
    height: 90vw;  */
  }
  100% {
    @apply w-[750px] h-[750px] -bottom-[45vh] opacity-20;
  }
}
.circle_Q {
    @apply absolute left-1/2  w-[700px] h-[700px] -bottom-[45vh] translate-x-[-50%] translate-y-[50%] rounded-full z-[10] bg-cyan-400 ;
    animation: scaleCircle_Q 9s linear forwards ;
    animation-delay: 2s;
}
.circle_message{
    @apply absolute left-1/2 -top-32 translate-x-[-50%] translate-y-[50%] font-bold text-3xl text-black text-center 
}
@keyframes scaleCircle_Q {
  0% {
    @apply   w-[700px] h-[700px] -bottom-[45vh] bg-cyan-400 ;
    
    /* height: 70vw; */
  }
  35% {
    @apply  w-[1400px] h-[1400px] -bottom-[45vh] bg-cyan-600;
    /* width: 100vw; 
    height: 90vw;  */
  }
  50% {
    @apply w-[1400px] h-[1400px] -bottom-[45vh] bg-cyan-600 ;
    /* width: 100vw;
    height: 90vw;  */
  }
  100% {
    @apply w-[750px] h-[750px] -bottom-[45vh] bg-cyan-400;
  }
}


.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
.background {
    background: rgb(184, 240, 206);
    background: linear-gradient(225deg, rgba(184, 240, 206, 0.5746673669467788) 0%, rgba(220, 252, 240, 0.4766281512605042) 25%, rgba(235, 246, 245, 0.40940126050420167) 60%, rgba(208, 250, 250, 0.4682247899159664) 100%);
}
</style>