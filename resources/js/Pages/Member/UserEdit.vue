<template>
<MemberLayout title="Dashboard" :showMenu="false">
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            编辑个人资料
        </div>
    </template>
    <div class="p-12">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-2 bg-white rounded shadow p-4 my-4 border-t-2 border-blue-500">
            
            <a-form :model="formState" @finish="handleSubmit">
                <!-- 性别选择 -->
                <a-form-item label="性别" name="gender" :rules="[{ required: true }]">
                    <a-radio-group v-model:value="formState.gender">
                        <a-radio value="M">男</a-radio>
                        <a-radio value="F">女</a-radio>
                        <a-radio value="LGBT">LGBT</a-radio>
                    </a-radio-group>
                </a-form-item>

                <!-- 学历选择 -->
                <a-form-item label="学历" name="education" :rules="[{ required: true }]">
                    <a-select 
                        class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full "
                        id="education" v-model:value="formState.education" :options="educationOptions"></a-select>
                </a-form-item>

                <a-form-item>
                    <a-button type="primary" html-type="submit">保存更改</a-button>
                </a-form-item>
            </a-form>
        </div>
    </div>
</MemberLayout>
</template>

  
<script setup>
import MemberLayout from "@/Layouts/MemberLayout.vue";
import {
    ref,
    reactive,
    onMounted
} from 'vue';
import {
    message
} from 'ant-design-vue';
import axios from 'axios';


const educationOptions = ref([
    { label: '初中',  options: [
            { value: 'F1', label: '初一 F1', },
            { value: 'F2', label: '初二 F2', },
            { value: 'F3', label: '初三 F3', },
        ],
    },
    { label: '高中',  options: [
            { value: 'F4', label: '高一 F4', },
            { value: 'F5', label: '高二 F5', },
            { value: 'F6', label: '高三 F6', },
        ],
    },
    { label: '大學',  options: [
            { value: 'Y1', label: '大一 Year1', },
            { value: 'Y2', label: '大二 Year2', },
            { value: 'Y3', label: '大三 Year3', },
            { value: 'Y4', label: '大四 Year4', },
            { value: 'Y5', label: '大五 Year5', },
        ],
    },
    { value: 'other', label: '其他 Other' },
]);

const formState = reactive({
    gender: '',
    education: ''
});

// 提交更新
const handleSubmit = async () => {
    try {
        await axios.post(route('member.users.update'), formState);
        message.success('资料更新成功');
        window.location.href = route('dashboard')
    } catch (error) {
        message.error(error.response ?.data ?.message || '更新失败');
    }
};
</script>
