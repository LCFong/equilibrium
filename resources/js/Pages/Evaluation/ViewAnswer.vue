<template>
<AdminLayout title="Dashboard">
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            结果
        </div>
    </template>

    <div class="p-12">
        
        <a-button :href="route('admin.evaluations.export')" class="ant-btn">汇出数据</a-button>
        <br>

        <div class="w-full sm:px-6 lg:px-8 flex flex-col gap-2 bg-white rounded shadow p-4 my-4 border-t-2 border-blue-500">
            <div class="p-1 text-base font-semibold">选择用户</div>
            <div class="flex gap-1">
                <a-select
                    v-model:value="selectedUserId"
                    show-search
                    placeholder="Select a person"
                    style="width: 500px"
                    :options="users.map( x => ( { label: x.name, value: x.id } ) ) "
                    @change="handleSelectChange"
                ></a-select>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <!-- <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-blue-500">
                <vue-echarts class="w-full" :option="consultationChat" style="height: 800px" ref="chart" />
            </div> -->
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-green-500">
                <div v-if="evaluations.length > 0">
                    <span class="text-base font-bold">{{ evaluations[0].user.name }}</span>&nbsp;
                    <span class="">{{ evaluations[0].user.email }}</span>&nbsp;
                    <span class="text-slate-400">@{{ displayDate(evaluations[0].created_at) }}</span>
                </div>
                <a-divider class="m-3" />
                <div v-for="eva in evaluations" class="">
                    <div v-for="item in eva.items" class="flex text-base">

                        <div v-if="item.question.type =='seven_options'" class="my-1">
                            {{ item.question.title }}
                            <span class="underline font-semibold">{{ seven_options[item.value]? seven_options[item.value].label:'' }}</span>
                        </div>
                        <div v-if="item.question.type =='input'" class="my-1">
                            <span class="text-slate-600">{{ item.question.title}}</span> <br>
                            <span class="underline font-semibold">{{ item.value }}</span>
                        </div>
                    </div>
                    <a-divider class="m-3" />
                </div>
            </div>
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
    props: ["evaluations", "classify", "users", "user_id", "seven_options"],
    data() {
        return {
            consultation_classify: [],
            chat_source: []

        };
    },
    created() {
        this.selectedUserId = this.user_id?parseInt(this.user_id):''

    },
    methods: {

        handleSelectChange(value){
            window.location.href = route('admin.evaluations.view_answer', value)
        }, 
        displayDate(date) {
            return dayjs(date).format('YYYY-MM-DD HH:mm')
        },
    },
    computed: {

    }
}
</script>
