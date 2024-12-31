<template>
    <AdminLayout title="Dashboard">
        <template #header>
            <div class="font-semibold text-xl text-gray-800 ">
                结果
            </div>
        </template>
    
        <div class="p-12">
            <div class="grid grid-cols-2 gap-4">
                <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-blue-500">
    
                    <vue-echarts class="w-full" :option="consultationChat" style="height: 800px" ref="chart" />
    
                </div>
                <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-green-500">
                    <div v-for="con in consultations" class="">
                        <div>
                            <span class="text-base font-bold">{{ con.user.name }}</span>&nbsp;
                            <span class="">{{ con.user.email }}</span>&nbsp;
                            <span class="text-slate-400">@{{ displayDate(con.created_at) }}</span>
                        </div>
                        <div v-for="item in con.items" class="flex text-base">
                            
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
        props: ["consultations", "classify"],
        data() {
            return {
                consultation_classify: [],
                chat_source: []
    
            };
        },
        created() {
            
            this.consultations.forEach(con => {
    
                con.items.forEach(item => {
                    this.consultation_classify.push(item.option.classify)
                })
            });
    
            let countClassify = this.consultation_classify.reduce((acc, key) => {
                acc[key] = (acc[key] || 0) + 1;
                return acc;
            }, {});
    
            this.chat_source = Object.keys( this.classify ).map(key => {
                const count = countClassify[key] || 0; // 如果計數不存在，則為0
                return [count, this.classify[key]];
            });
    
            this.chat_source.unshift(['amount', 'type']);
            
        },
        methods: {
    
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
    