<script>
import MemberLayout from "@/Layouts/MemberLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';
import { contentQuotesLinter } from "ant-design-vue/es/_util/cssinjs/linters";

export default {
    components: {
        MemberLayout,
        ...AntdIcons,
    },
    props: ["questions", "do_evaluation_again"],
    data() {
        return {
            
            // 
            formInput:{},

            pssOptions:[
                { label: '从来没有', value: 1 },
                { label: '很少有', value: 2 },
                { label: '有', value: 3 },
                { label: '很多时有', value: 4 },
                { label: '不停有', value: 5 },
            ],

            wellbeingOptions:[
                { label: '从来没有', value: 1 },
                { label: '很少有', value: 2 },
                { label: '有', value: 3 },
                { label: '很多时有', value: 4 },
                { label: '不停有', value: 5 },
            ],
            
            learningOptions:[
                { label: '完全不符合', value: 1 },
                { label: '不符合', value: 2 },
                { label: '有点符合', value: 3 },
                { label: '基本符合', value: 4 },
                { label: '比较符合 ', value: 5 },
                { label: '符合 ', value: 6 },
                { label: '非常符合 ', value: 7 },
            ],
        };
    },
    created(){
        if( this.do_evaluation_again ){
            this.formInput['do_evaluation_again'] = 1
        }
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
            
            this.$refs.evaluationForm.validateFields().then(()=>{
                
                this.$inertia.post(route("member.evaluation_items.store"), this.formInput, {
                    onSuccess: (page) => { location.reload() },
                });
            }).catch(err => {
                console.log(err);
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
                <a-form :model="formInput" ref="evaluationForm" class="w-full bg-white rounded-lg shadow-md p-4" autocomplete="off"  enctype="multipart/form-data" layout="vertical">
                    
                    <a-page-header title="压力感知量表" class="py-2" />
                    <div v-for="(q,index) in questions.filter( x => x.category == 'pss')">
                        <div class="flex px-4 gap-2 text-base flex-1" >
                            <a-form-item :name="q.code" :label="q.title" :rules="[{ required: true, message: '请选择' }]">
                                <a-radio-group v-model:value="formInput[q.code]">
                                    <a-radio-button v-for="o in pssOptions" :value="o.value">{{o.label}}</a-radio-button>
                                </a-radio-group>
                            </a-form-item>
                        </div>
                    </div>
                    <a-divider />
                    <a-page-header title="The Warwick-Edinburgh Mental Well-being Scale" class="py-2" />
                    <div v-for="(q,index) in questions.filter( x => x.category == 'wellbeing')">
                        <div class="flex px-4 gap-2 text-base flex-1" >
                            <a-form-item :name="q.code" :label="q.title" :rules="[{ required: true, message: '请选择' }]">
                                <a-radio-group v-model:value="formInput[q.code]">
                                    <a-radio-button v-for="o in wellbeingOptions" :value="o.value">{{o.label}}</a-radio-button>
                                </a-radio-group>
                            </a-form-item>
                        </div>
                    </div>
                    <a-divider />
                    <a-page-header title="学习动机问卷" class="py-2" />
                    <div v-for="(q,index) in questions.filter( x => x.category == 'learning')">
                        <div class="flex px-4 gap-2 text-base flex-1" >
                            <a-form-item :name="q.code" :label="q.title" :rules="[{ required: true, message: '请选择' }]">
                                <a-radio-group v-model:value="formInput[q.code]">
                                    <a-radio-button v-for="o in learningOptions" :value="o.value">{{o.label}}</a-radio-button>
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
.ant-radio-button-wrapper-checked{
    @apply !text-white
}

.ant-radio-button-checked{
    @apply bg-blue-500 
}
</style>