<script>
import MemberLayout from "@/Layouts/MemberLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';
import { contentQuotesLinter } from "ant-design-vue/es/_util/cssinjs/linters";

export default {
    components: {
        MemberLayout,
        ...AntdIcons,
    },
    props: ["questions"],
    data() {
        return {
            
            // 
            formItems: [],
            formInput:[],

            sevenOptions:[
                { label: '好', value: 1 },
                { label: '尚好', value: 2 },
                { label: '還好', value: 3 },
                { label: '一般', value: 4 },
                { label: '較差', value: 5 },
                { label: '差', value: 6 },
                { label: '非常差', value: 7 },
            ],

            fiveOptions:[
                { label: '好', value: 1 },
                { label: '還好', value: 2 },
                { label: '一般', value: 3 },
                { label: '差', value: 4 },
                { label: '非常差', value: 5 },
            ]
        };
    },
    created(){
    },
    methods:{
        checkOption(row){
            let index = this.formItems.indexOf(row.code);
            if (index !== -1) {
                // 如果存在，移除該項
                this.formItems.splice(index, 1);
            } else {
                // 如果不存在，加入該項
                this.formItems.push(row.code);
            }
        },
        submitForm(){
            this.$inertia.post(route("member.evaluation_items.store"), this.questions, {
                onSuccess: (page) => { location.reload() },
            });
        }
    }
}
</script>

<template>
<MemberLayout title="Dashboard" :showMenu="false">
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            问卷
        </div>
    </template>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-10">
            <div class="flex" v-if="questions.length > 0">
                <a-form class="w-full bg-white rounded-lg shadow-md p-4" :model="questions" autocomplete="off"  enctype="multipart/form-data" layout="vertical">
                    
                    <a-page-header title="问卷" class="py-2" />
                    <div v-for="(q,index) in questions.filter( x => x.category == 'pss')">
                        <div class="flex px-4 gap-2 text-base flex-1" >
                            <a-form-item :label="q.title">
                                <a-radio-group v-model:value="q.value">
                                    <a-radio-button value="1">Never</a-radio-button>
                                    <a-radio-button value="2">Almost Never</a-radio-button>
                                    <a-radio-button value="3">Sometime</a-radio-button>
                                    <a-radio-button value="4">Fairly Often</a-radio-button>
                                    <a-radio-button value="5">Very Often</a-radio-button>
                                </a-radio-group>
                            </a-form-item>
                        </div>
                    </div>

                    <a-page-header title="The Warwick-Edinburgh Mental Well-being Scale" class="py-2" />
                    <div v-for="(q,index) in questions.filter( x => x.category == 'wellbeing')">
                        <div class="flex px-4 gap-2 text-base flex-1" >
                            <a-form-item :label="q.title">
                                <a-radio-group v-model:value="q.value">
                                    <a-radio-button value="1">从来没有</a-radio-button>
                                    <a-radio-button value="2">很少有</a-radio-button>
                                    <a-radio-button value="3">有</a-radio-button>
                                    <a-radio-button value="4">很多时有</a-radio-button>
                                    <a-radio-button value="5">不停有</a-radio-button>
                                </a-radio-group>
                            </a-form-item>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a-button key="Update" type="primary" @click="submitForm()">提交</a-button>
                    </div>
                </a-form>
            </div>
        </div>
    </div>
</MemberLayout>
</template>

<style>
.checkedOption{
    @apply transition-transform duration-300 scale-105 bg-gradient-to-r from-sky-100 to-blue-200/60
}
.uncheckedOption{
    @apply transition-transform duration-300 scale-100
}

</style>