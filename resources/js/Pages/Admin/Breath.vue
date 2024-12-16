<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import * as AntdIcons from '@ant-design/icons-vue';

export default {
    components: {
        AdminLayout,
        ...AntdIcons,
    },
    data() {
        return {
            message: "Breath In"
        };
    },
    mounted() {
        setTimeout(() => {
            this.message = "Breath Out";
        }, 5000); // 5000毫秒即5秒
    }
}
</script>

<template>
<AdminLayout title="Dashboard">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Breath
        </h2>
    </template>

    <div class="py-12">
        <div class="circle_all">
            <div class="circle_A flex justify-center ">
                
                <div class="font-bold text-xl text-white" style="align-content: center;">
                    {{ message }}
                </div>
            </div>
            <div class="circle_B"></div>
            <div class="circle_B2"></div>
            <div class="circle_C"></div>
            <div class="circle_C2"></div>
            <div class="circle_D"></div>
            <div class="circle_D2"></div>
            <div class="circle_E">
            </div>
        </div>
    </div>
</AdminLayout>
</template>

<style scoped>
.circle_all {
    position: relative;
    height: 70vh;
    margin-left: auto;
    margin-right: auto;
}

.circle_A {
    @apply absolute left-1/2 bottom-1/2 translate-x-[-50%] translate-y-[50%] w-[200px] h-[200px] rounded-full z-20 bg-[#FF6B3D];
}

.circle_B {
    @apply absolute left-1/2 bottom-1/2 translate-x-[-50%] translate-y-[50%] rounded-full z-[10] bg-[#EB3B00] opacity-70 animate-[fadeOut-B_10s_ease-in-out];
}
.circle_B2 {
    @apply absolute left-1/2 bottom-1/2 translate-x-[-50%] translate-y-[50%] rounded-full z-[9] bg-[#EB3B00] opacity-60 animate-[fadeOut-B2_10s_ease-in-out];
}
.circle_C {
    @apply absolute left-1/2 bottom-1/2 translate-x-[-50%] translate-y-[50%] rounded-full z-[8] bg-[#EB3B00] opacity-50 animate-[fadeOut-C_10s_ease-in-out];
}
.circle_C2 {
    @apply absolute left-1/2 bottom-1/2 translate-x-[-50%] translate-y-[50%] rounded-full z-[7] bg-[#EB3B00] opacity-40 animate-[fadeOut-C2_10s_ease-in-out];
}
.circle_D {
    @apply absolute left-1/2 bottom-1/2 translate-x-[-50%] translate-y-[50%] rounded-full z-[6] bg-[#EB3B00] opacity-30 animate-[fadeOut-D_10s_ease-in-out];
}
.circle_D2 {
    @apply absolute left-1/2 bottom-1/2 translate-x-[-50%] translate-y-[50%] rounded-full z-[5] bg-[#EB3B00] opacity-20 animate-[fadeOut-D2_10s_ease-in-out];
}
.circle_E {
    @apply absolute shadow-xl shadow-gray-500 left-1/2 bottom-1/2 translate-x-[-50%] translate-y-[50%] rounded-full z-[4] bg-[#EB3B00] opacity-10 animate-[fadeOut-E_10s_ease-in-out];
}

@keyframes fadeOut-B {
    0% {
        opacity: 0;
    }

    50% {
        opacity: .7;
        width: 400px;
        height: 400px;
    }

    100% {
        opacity: 0;
    }
}
@keyframes fadeOut-B2 {
    0% {
        opacity: 0;
    }

    50% {
        opacity: .6;
        width: 450px;
        height: 450px;
    }

    100% {
        opacity: 0;
    }
}


@keyframes fadeOut-C {
    0% {
        opacity: 0;
    }

    50% {
        opacity: .5;
        width: 500px;
        height: 500px;
    }

    100% {
        opacity: 0;
    }
}
@keyframes fadeOut-C2 {
    0% {
        opacity: 0;
    }

    50% {
        opacity: .4;
        width: 550px;
        height: 550px;
    }

    100% {
        opacity: 0;
    }
}


@keyframes fadeOut-D {
    0% {
        opacity: 0;
    }

    50% {
        opacity: .3;
        width: 600px;
        height: 600px;
    }

    100% {
        opacity: 0;
    }
}
@keyframes fadeOut-D2 {
    0% {
        opacity: 0;
    }

    50% {
        opacity: .2;
        width: 650px;
        height: 650px;
    }

    100% {
        opacity: 0;
    }
}

@keyframes fadeOut-E {
    0% {
        opacity: 0;
    }

    50% {
        opacity: .1;
        width: 750px;
        height: 750px;
    }

    100% {
        opacity: 0;
    }
}
</style>
