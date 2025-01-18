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
            if(this.category == 'selection'){
                return "情境选择";
            }
            if(this.category == 'revision'){
                return "情境修正";
            }
            if(this.category == 'attention'){
                return "注意部署";
            }
            if(this.category == 'cognition'){
                return "认知重评/认知改变";
            }
            if(this.category == 'reaction'){
                return "反应调节";
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
            
            this.$inertia.post(route("member.mediate_items.store"), result, {
                onSuccess: (page) => { 
                    window.location.href = route("member.mediates.index"); },
            });
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
                            <!-- Option -->
                            <div v-if="o.type =='options'" class="flex px-4 gap-2 rounded-lg text-base bg-white shadow-md flex-1 text-wrap"  
                                :class=" formitems.includes(o.code)? 'checkedOption ':'uncheckedOption'"
                                @click="checkOption(o)">

                                <a-checkbox :value="o.code" ></a-checkbox>

                                <span  class="flex items-center ">
                                    <a-divider class="py-4 bg-slate-200" type="vertical"  />
                                    <div class="py-3 ">{{ o.title }}</div>
                                </span>
                            </div>
                            <div v-else-if="o.type =='input'" class="px-4 py-2 flex flex-col gap-2 rounded-lg text-base bg-white shadow-md "
                                :class=" formInput.find( x => x.code == o.code).value == ''? 'uncheckedOption':'checkedOption'">
                                {{ o.title }}<br>
                                <a-input type="input" v-model:value="formInput.find( x => x.code == o.code).value"></a-input>
                            </div>
                        </div>
                    </a-checkbox-group>
                    <div class="mt-4">
                        <a-button key="Update" type="primary" @click="submitForm()">提交</a-button>
                    </div>
                </a-form>
            </div>
            <div v-else>未輸入問題<a class="text-blue-500" :href="route('admin.consultations.create')">到此創建</a></div>
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