<script>
import MemberLayout from "@/Layouts/MemberLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';

export default {
    components: {
        MemberLayout,
        ...AntdIcons,
    },
    props: ["options", "category"],
    data() {
        return {
            
            // 
            formitems: [],
            formInput:[],
        };
    },
    created(){
        this.options.forEach( (item)=>{
            if( item.type == "input"){
                this.formInput.push( {code:item.code, value:""} )
            }
        })

    },
    computed:{
        categoryTitle(){
            if(this.category == 'peer'){
                return "同伴影响";
            }
            if(this.category == 'study'){
                return "学业压力";
            }
            if(this.category == 'interpersonal'){
                return "人际关系";
            }
            if(this.category == 'sleep'){
                return "睡眠";
            }
            return "";
        }
    },
    methods:{
        checkOption(row){
            let index = this.formitems.indexOf(row.code);
            if (index !== -1) {
                // 如果存在，移除該項
                this.formitems.splice(index, 1);
            } else {
                // 如果不存在，加入該項
                this.formitems.push(row.code);
            }
        },
        submitForm(){
            let o = this.formitems.map( x => ({code: x, value:true}))
            let i = this.formInput.filter(item => item.value !== "")
            let result = [...o , ...i]

            this.$inertia.post(route("member.consultation_items.store"), result, {
                onSuccess: (page) => { 
                    window.location.href = route("member.consultations.index");
                },
            });
        },
        redirectBack(){
            history.back()
        }
    }
}
</script>

<template>
<MemberLayout title="Dashboard">
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            压力感知 {{ categoryTitle }}
        </div>
    </template>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-10">
            
            <div class="flex" v-if="options.length > 0">
                <a-form class="w-full" :model="formitems" autocomplete="off"  enctype="multipart/form-data">
                    <a-checkbox-group v-model:value="formitems" class="flex flex-col gap-5 ">

                        <div v-for="(o,index) in options">
                            <div v-if="o.type =='options'" class="flex mx-2 px-4 gap-2 rounded-lg text-base bg-white shadow-md flex-1"  
                                :class=" formitems.includes(o.code)? 'checkedOption ':'uncheckedOption'"
                                @click="checkOption(o)">

                                <a-checkbox :value="o.code" @click="checkOption(o)"></a-checkbox>

                                <span  class="flex items-center ">
                                    <a-divider class="py-4 bg-slate-200" type="vertical"  />
                                    <div class="py-3 " style="white-space: normal;">{{ o.title }}</div>
                                </span>
                            </div>
                            <div v-else-if="o.type =='input'" class="px-4 py-2 flex flex-col gap-2 rounded-lg text-base bg-white shadow-md "
                                :class=" formInput.find( x => x.code == o.code).value == ''? 'uncheckedOption':'checkedOption'">
                                {{ o.title }}<br>
                                <a-input type="input" v-model:value="formInput.find( x => x.code == o.code).value"></a-input>
                            </div>
                        </div>
                    </a-checkbox-group>
                    <div class="mt-4 flex gap-4">
                        <a-button key="Update" type="primary" @click="submitForm()">提交</a-button>
                        <a-button key="Update" type="default" @click="redirectBack()">返回</a-button>
                    </div>
                </a-form>
            </div>
            <div v-else>暂未有问题</div>
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