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
            <!-- <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-blue-500">
                <vue-echarts class="w-full" :option="quizStackLine" style="height: 800px" ref="chart" />
            </div> -->
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-blue-500">
                <vue-echarts class="w-full" :option="quizBarChat" style="height: 800px" ref="chart" />
            </div>
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col bg-white rounded shadow p-4 border-t-2 border-green-500">
                
                <div v-for="con in quizs" class="">
                    <div >
                        <span class="text-base font-bold">{{ con.user.name }}</span>&nbsp;
                        <span class="">{{ con.user.email }}</span>&nbsp;
                        <span class="text-slate-400">@{{ displayDateTime(con.created_at) }}</span>
                    </div>
                    <div v-for="item in con.items" class="flex text-base">
                        
                        <div v-if="item.option.type =='options'" class="my-1">
                            <span v-if="item.value == 1" class="text-blue-800 px-1">是</span>
                            <span v-else class="px-1">否</span>
                            {{ item.option.title }}
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
    props: ["quizs", "users", "user_id"],
    data() {
        return {
            selectedUserId: "",
            quiz_classify: [],
            barchat_source: [],

            classify: {
                'positive': '正面',
                'negative': '反面',
            },
            
            linechat_source:[
                {property:'positive', name: '正面', type: 'line', stack: 'Total', data:[] }
            ],
            stackLineDateSet: this.removeDuplicates( this.quizs.map( x => this.displayDate(x.created_at) ) ),
            
        };
    },
    created() {
        this.selectedUserId = this.user_id?parseInt(this.user_id):''

        this.setBarChatData()
    },
    methods: {
        handleSelectChange(value){
            window.location.href = route('admin.quizs.view_answer', value)
        },  
        removeDuplicates(array) {
            return [...new Set(array)];
        },
        displayDateTime(date) {
            return dayjs(date).format('YYYY-MM-DD HH:mm')
        },
        setBarChatData(){
            this.quizs.forEach(con => {

                con.items.forEach(item => {
                    this.quiz_classify.push(item.option.property)
                })
            });

            let countClassify = this.quiz_classify.reduce((acc, key) => {
                acc[key] = (acc[key] || 0) + 1;
                return acc;
            }, {});

            this.barchat_source = Object.keys(this.classify).map(key => {
                const count = countClassify[key] || 0; // 如果計數不存在，則為0
                return [count, this.classify[key]];
            });

            this.barchat_source.unshift(['amount', 'type']);
        },
        displayDate(date) {
            return dayjs(date).format('YYYY-MM-DD')
        },
    },
    computed: {
        stackLineResult(){
            let result = {
                positive: [],
                negative: [],
            }
            result.positive = Array(this.stackLineDateSet.length).fill(0);
            result.negative = Array(this.stackLineDateSet.length).fill(0);

            let items = []
            this.stackLineDateSet.forEach( (date)=>{
                items.push( this.quizs.find( y => this.displayDate(y.created_at) == date).items )
            })

            for (const group of items) {
                for (const item of group) {
                    // 將更新日期轉換為 YYYY-MM-DD 格式
                    const updatedDate = this.displayDate(item.created_at);

                    // 獲取該更新日期在 dates 中的索引
                    const dateIndex = this.stackLineDateSet.indexOf(updatedDate);

                    // 如果該日期在有效日期範圍內，則進行計數
                    if (dateIndex !== -1) {
                        if (item.option.property === "positive") {
                            result.positive[dateIndex]++;
                        } else if (item.option.property === "negative") {
                            result.negative[dateIndex]++;
                        }
                    }
                }
            }

            return result;
        },
        quizBarChat() {
            return {
                title: { text: '正反面条形图(总计)' },
                dataset: { source: this.barchat_source },
                xAxis: {
                    name: '次數',
                    minInterval: 1,
                    axisLine: {
                        show: true,
                    },
                },
                yAxis: { type: 'category' },
                grid: { left: "15%" },
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
        quizStackLine() {
            return  {
                title: { text: '正反面线性分布图(按日)' },
                tooltip: { trigger: 'axis' },
                legend: { data: ['正面', '反面'] },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                toolbox: {
                    feature: { saveAsImage: {} }
                },
                xAxis: {
                    // 分開每個 quiz 的日期
                    data: this.stackLineDateSet
                },
                yAxis: {
                    minInterval: 1,
                    type: 'value'
                },
                series: [
                    {property:'positive', name: '正面', type: 'line', stack: 'Total', data: this.stackLineResult.positive },
                    {property:'negative', name: '反面', type: 'line', stack: 'Total', data: this.stackLineResult.negative },
                ]
            };
        }
    }
}
</script>
