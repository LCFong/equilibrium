<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';
import { contentQuotesLinter } from "ant-design-vue/es/_util/cssinjs/linters";

export default {
    components: {
        AdminLayout,
        ...AntdIcons,
    },
    props: ["questions", "seven_options"],
    data() {
        return {
            
            // 
            formItems: [],
            formInput:[],
        };
    },
    created(){
        // this.formItems = this.options
        // this.options.forEach( (item)=>{
        //     if( item.type == "input"){
        //         this.formInput.push( {code:item.code, value:""} )
        //     }
        // })
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
            
            this.$inertia.post(route("admin.evaluation_items.store"), this.questions, {
                onSuccess: (page) => { location.reload() },
            });
        }
    }
}
</script>

<template>
<AdminLayout title="Dashboard" >
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
                        <div v-for="(q,index) in questions">
                            <div v-if="q.type =='seven_options'" class="flex px-4 gap-2 text-base flex-1" >
                                <a-form-item :label="q.title">
                                    <a-radio-group v-model:value="q.value">
                                        <template v-if="q.type == 'seven_options'">
                                            <a-radio v-for="option in seven_options" :value="option.value">{{ option.label }}</a-radio>
                                        </template>
                                    </a-radio-group>
                                </a-form-item>
                            </div>
                        </div>

                    <div class="mt-4">
                        <a-button key="Update" type="primary" @click="submitForm()">提交</a-button>
                    </div>
                </a-form>
            </div>
            <div v-else>未輸入問題<a class="text-blue-500" :href="route('admin.consultations.create')">到此創建</a></div>
        </div>
    </div>
</AdminLayout>
</template>

<style>
.checkedOption{
    @apply transition-transform duration-300 scale-105 bg-gradient-to-r from-sky-100 to-blue-200/60
}
.uncheckedOption{
    @apply transition-transform duration-300 scale-100
}

</style>