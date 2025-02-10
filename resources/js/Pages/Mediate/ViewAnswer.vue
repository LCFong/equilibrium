<template>
    <AdminLayout title="Dashboard">
        <template #header>
            <div class="font-semibold text-xl text-gray-800 ">
                结果
            </div>
        </template>
    
        <div class="p-12">
            
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
                <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-blue-500">
    
                    <vue-echarts class="w-full" :option="consultationChat" style="height: 800px" ref="chart" />
    
                </div>
                <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-green-500">
                    <div v-for="med in mediates" class="">
                        <div>
                            <span class="text-base font-bold">{{ med.user.name }}</span>&nbsp;
                            <span class="">{{ med.user.email }}</span>&nbsp;
                            <span class="text-slate-400">@{{ displayDate(med.created_at) }}</span>
                        </div>
                        <div v-for="item in med.items" class="flex text-base">
                            
                            <div v-if="item.option.type =='options'" class="my-1">
                                <span class="text-blue-500 px-1">✓</span>{{ item.option.title }}
                            </div>
                            <div v-if="item.option.type =='input'" class="my-1">
                                <span class="text-slate-600">{{ item.option.title}}</span> <br>
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
        props: ["mediates", "classify", "users", "user_id"],
        data() {
            return {
                consultation_classify: [],
                chat_source: []
    
            };
        },
        created() {       
            this.selectedUserId = this.user_id?parseInt(this.user_id):''

            
            this.mediates.forEach(con => {
    
                con.items.forEach(item => {
                    this.consultation_classify.push(item.option.classify)
                })
            });
    
            let countClassify = this.consultation_classify.reduce((acc, key) => {
                acc[key] = (acc[key] || 0) + 1;
                return acc;
            }, {});
    
            this.chat_source = Object.keys( this.classify ).map(key => {
                let count = countClassify[this.classify[key]] || 0; // 如果計數不存在，則為0
                return [count, this.classify[key]];
            });
    
            this.chat_source.unshift(['amount', 'type']);
            
        },
        methods: {
    
            handleSelectChange(value){
                window.location.href = route('admin.mediates.view_answer', value)
            }, 
            displayDate(date) {
                return dayjs(date).format('YYYY-MM-DD HH:mm')
            },
        },
        computed: {
    
            consultationChat() {
                return {
                    dataset: {
                        source: this.chat_source
                    },
                    xAxis: {
                        name: '次數',
                        minInterval: 1,
                        axisLine:{
                            show:true,
                        },
                    },
                    yAxis: {
                        type: 'category'
                    },
                    grid: {
                        left: "15%"
                    },
                    series: [{
                        type: 'bar',
                        encode: {
                            // Map the "amount" column to X axis.
                            x: 'amount',
                            // Map the "product" column to Y axis
                            y: 'type'
                        }
                    }]
                };
            },
        }
    }
    </script>
    