<template>
<AdminLayout title="User">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            用戶列表
        </h2>
    </template>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a-card title="用户管理" class="user-manager shadow-md">
                <a-table :columns="columns" :data-source="users" :loading="loading" :pagination="pagination" >
                    <template #action="{ record }">
                        <a-button type="link" @click="showDetail(record)">查看</a-button>
                        <a-button type="link" @click="showPasswordModal(record)">修改密码</a-button>
                    </template>
                </a-table>

                <!-- 用户详情模态框 -->
                <a-modal v-if="selectedUser" v-model:visible="detailVisible" title="用户详情" @cancel="closeDetail">
                    <a-descriptions bordered 
                        :column="1">
                        <a-descriptions-item label="姓名">{{ selectedUser.name }}</a-descriptions-item>
                        <a-descriptions-item label="邮箱">{{ selectedUser.email }}</a-descriptions-item>
                        <a-descriptions-item label="注册时间">{{ selectedUser.created_at }}</a-descriptions-item>
                    </a-descriptions>
                </a-modal>

                <!-- 修改密码模态框 -->
                <a-modal v-model:visible="passwordVisible" title="修改密码" @ok="handleChangePassword">
                    <a-form :model="passwordForm" :rules="rules" ref="formRef">
                        <a-form-item label="新密码" name="password">
                            <a-input-password v-model:value="passwordForm.password" />
                        </a-form-item>
                        <a-form-item label="确认密码" name="password_confirmation">
                            <a-input-password v-model:value="passwordForm.password_confirmation" />
                        </a-form-item>
                    </a-form>
                </a-modal>
            </a-card>
        </div>
    </div>
</AdminLayout>
</template>

  
<script setup>
import {
    ref,
    reactive,
    onMounted
} from 'vue';
import {
    message
} from 'ant-design-vue';
import axios from 'axios';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import * as AntdIcons from '@ant-design/icons-vue';

// 表格列配置
const columns = [{
        title: 'ID',
        dataIndex: 'id'
    },
    {
        title: '姓名',
        dataIndex: 'name'
    },
    {
        title: '邮箱',
        dataIndex: 'email'
    },
    {
        title: '操作',
        slots: {
            customRender: 'action'
        }
    }
];

const props = defineProps({
    users: Array,
});

// 响应式数据
const loading = ref(false);
const pagination = reactive({
    current: 1,
    pageSize: 10,
    total: 0,
    showSizeChanger: true
});

const selectedUser = ref(null);
const detailVisible = ref(false);
const passwordVisible = ref(false);
const passwordForm = reactive({
    password: '',
    password_confirmation: ''
});
const formRef = ref(null);

// 验证规则
const rules = {
    password: [{
            required: true,
            message: '请输入密码'
        },
        {
            min: 8,
            message: '密码至少8位'
        }
    ],
    password_confirmation: [{
            required: true,
            message: '请确认密码'
        },
        ({
            getFieldValue
        }) => ({
            validator(_, value) {
                if (!value || getFieldValue('password') === value) {
                    return Promise.resolve();
                }
                return Promise.reject('两次输入的密码不一致');
            }
        })
    ]
};

// 显示详情
const showDetail = (user) => {
    selectedUser.value = user;
    detailVisible.value = true;
};

// 修改密码操作
const showPasswordModal = (user) => {
    selectedUser.value = user;
    passwordVisible.value = true;
};

// 提交密码修改
const handleChangePassword = async () => {
    try {
        await formRef.value.validate();

        await axios.post(`/users/${selectedUser.value.id}/change-password`, passwordForm);
        message.success('密码修改成功');
        passwordVisible.value = false;
        Object.assign(passwordForm, {
            password: '',
            password_confirmation: ''
        });
    } catch (error) {
        if (error.response?.status === 422) {
            message.error(error.response.data.message);
        } else {
            message.error('密码修改失敗');
        }
    }
};

</script>

  
<style scoped>
.user-manager {
    margin: 20px;
}

.ant-table {
    margin-top: 20px;
}
</style>
