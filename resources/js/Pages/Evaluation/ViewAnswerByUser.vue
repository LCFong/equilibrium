<template>
<AdminLayout title="Dashboard">
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            结果
        </div>
    </template>

    <div class="p-12">
        
            
            <button class="flex justify-center items-center gap-1 rounded-lg  p-2" @click="scrollToTop" style="position: fixed; bottom: 20px; right: 20px;">
            返回顶部
                <svg width="24px"  viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none">
                <g fill="#000000">

                <path d="M2.5 2.5a.75.75 0 010-1.5H13a.75.75 0 010 1.5H2.5zM2.985 9.795a.75.75 0 001.06-.03L7 6.636v7.614a.75.75 0 001.5 0V6.636l2.955 3.129a.75.75 0 001.09-1.03l-4.25-4.5a.75.75 0 00-1.09 0l-4.25 4.5a.75.75 0 00.03 1.06z"/>

                </g>

                </svg>
            </button>
        

        <!-- <a-button :href="route('admin.evaluations.export')" class="ant-btn">汇出数据</a-button> -->
        <!-- <br> -->
        <div class="overflow-x-auto bg-white rounded-lg shadow my-4 " v-if="selectedUser">
            <table class="w-full">
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">名字</td>
                        <td class="px-6 py-4 text-gray-600">{{ selectedUser.name }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">电邮</td>
                        <td class="px-6 py-4 text-gray-600">{{ selectedUser.email }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">性别</td>
                        <td class="px-6 py-4 text-gray-600">
                            <span v-if="selectedUser.gender == 'M'">男</span>
                            <span v-if="selectedUser.gender == 'F'">女</span>
                            <span v-if="selectedUser.gender == 'LGBT'">LGBT</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">学历</td>
                        <td class="px-6 py-4 text-gray-600">{{ findLabel( selectedUser.education ) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="p-1 text-base font-semibold">选择用户</div>
        <div class="flex gap-1 mb-4">
            <a-select
                show-search
                placeholder="Select a user"
                style="width: 500px"
                :options="users.map( x => ( { label: x.name, value: x.id } ) ) "
                @change="scrollToUser"
            ></a-select>
        </div>

        <div v-for="user in users" class="mb-4 w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-green-500">
            <!-- <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-blue-500">
                <vue-echarts class="w-full" :option="consultationChat" style="height: 800px" ref="chart" />
            </div> -->
            <div class="grid grid-cols-2 " :id="user.id">
                <!-- {{ user.evaluations[0] }}
                {{ user.evaluations[user.evaluations.length-1] }} -->
                <!-- {{ getFirstEvaluation(user.id) }} -->
                <div class="">
                    <div >
                        <span class="text-base font-bold">{{ user.name }}</span>&nbsp;
                        <span class="">{{ user.email }}</span>&nbsp;
                        <span class="text-slate-400">@{{ displayDate(getFirstEvaluation(user.id).created_at) }}</span>
                    </div>
                    <!-- {{ user.id }}
                    {{ getLastEvaluation(user_id)  }} -->
                    <div v-for="item in getFirstEvaluation(user.id).items" class="flex text-base">
                        
                        <div v-if="item.question?.category =='pss'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ pssOptions[item.value]? pssOptions[item.value].label:'' }}</span>
                        </div>
                        <div v-if="item.question?.category =='wellbeing'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ wellbeingOptions[item.value]? wellbeingOptions[item.value].label:'' }}</span>
                        </div>
                        <div v-if="item.question?.category =='learning'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ learningOptions[item.value]? learningOptions[item.value].label:'' }}</span>
                        </div>
                    </div>
                </div>
                <div class="">

                    <div >
                        <span class="text-base font-bold">{{ user.name }}</span>&nbsp;
                        <span class="">{{ user.email }}</span>&nbsp;
                        <span class="text-slate-400">@{{ displayDate(getLastEvaluation(user.id).created_at) }}</span>
                    </div>
                    <div v-for="item in getLastEvaluation(user.id).items" class="flex text-base">
                        
                        <div v-if="item.question?.category =='pss'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ pssOptions[item.value]? pssOptions[item.value].label:'' }}</span>
                        </div>
                        <div v-if="item.question?.category =='wellbeing'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ wellbeingOptions[item.value]? wellbeingOptions[item.value].label:'' }}</span>
                        </div>
                        <div v-if="item.question?.category =='learning'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ learningOptions[item.value]? learningOptions[item.value].label:'' }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-green-500"
                v-for="eva in evaluations">
                <div class="">

                    <div >
                        <span class="text-base font-bold">{{ eva.user.name }}</span>&nbsp;
                        <span class="">{{ eva.user.email }}</span>&nbsp;
                        <span class="text-slate-400">@{{ displayDate(eva.created_at) }}</span>
                    </div>
                    <div v-for="item in eva.items" class="flex text-base">
                        
                        <div v-if="item.question?.category =='pss'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ pssOptions[item.value]? pssOptions[item.value].label:'' }}</span>
                        </div>
                        <div v-if="item.question?.category =='wellbeing'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ wellbeingOptions[item.value]? wellbeingOptions[item.value].label:'' }}</span>
                        </div>
                        <div v-if="item.question?.category =='learning'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ learningOptions[item.value]? learningOptions[item.value].label:'' }}</span>
                        </div>
                    </div>
                    <a-divider class="m-3" />
                </div>
            </div> -->
        </div>
    </div>
</AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';
import dayjs, {
    Dayjs
} from 'dayjs';
import {
    VueEcharts
} from 'vue3-echarts';

export default {
    components: {
        AdminLayout,
        VueEcharts,
        ...AntdIcons,
    },
    props: ["evaluations", "classify", "users", "selectedUser" , "user_id", "pssOptions", "wellbeingOptions", "learningOptions"],
    data() {
        return {
            consultation_classify: [],
            chat_source: [],
            educationOptions: [
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
            ]
        };
    },
    created() {
        console.log( this.selectedUser )
        this.selectedUserId = this.user_id?parseInt(this.user_id):''

    },
    methods: {

        scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' }); // 平滑滚动到顶部
        },

        scrollToUser(user_id){
            this.$nextTick(() => {
                const element = document.getElementById(user_id);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth' }); // 平滑滚动到指定用户部分
                }
            });
        },
        getLastEvaluation(user_id){
            let last = this.evaluations.filter( x => x.user_id == user_id).length - 1
            return this.evaluations.filter( x => x.user_id == user_id)[last]
        },
        getFirstEvaluation(user_id){
            return this.evaluations.filter( x => x.user_id == user_id)[0]
        },
        handleSelectChange(value){
            window.location.href = route('admin.evaluations.view_answer', value)
        }, 
        displayDate(date) {
            return dayjs(date).format('YYYY-MM-DD HH:mm')
        },
        findLabel(value) {
        
            for (const category of this.educationOptions) {
                if (category.options) {
                    const found = category.options.find(option => option.value === value);
                if (found) {
                    return found.label;
                }
                } else if (category.value === value) {
                    return category.label;
                }
            }
        },
    },
    computed: {

    }
}
</script>
