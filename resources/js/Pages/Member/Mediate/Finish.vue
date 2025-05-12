<template>
    <MemberLayout title="Dashboard">
        <template #header>
            <div class="font-semibold text-xl text-gray-800 ">
                情绪调解
            </div>
        </template>
        <div class="min-h-screen -ml-10 flex items-center justify-center ">
            <div class="text-center max-w-md">
                <!-- 勾选图标动画 -->
                <div class="mx-auto mb-8 w-24 h-24 text-green-500">
                    <svg class="w-full h-full animate-check" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
        
                <!-- 主内容 -->
                <h1 class="text-3xl font-bold text-gray-900 mb-4">
                    情绪调解已完成！
                </h1>
        
                <!-- 操作按钮 -->
                <button @click="handleReturn" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors" >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h-3"></path>
                    </svg>
                    返回首页
                </button>
            </div>
        </div>
    </MemberLayout>
</template>

<script>
import MemberLayout from "@/Layouts/MemberLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';

export default {
    components: {
        MemberLayout,
        ...AntdIcons,
    },
    props: ["options", "category"],
    data() {
        return {
            
            // 
            formitems: [],
            formInput:[],
        };
    },
    methods:{
        handleReturn(){
            this.$inertia.post( route('logout') )
        }
    }
}
</script>
  