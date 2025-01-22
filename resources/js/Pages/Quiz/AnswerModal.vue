<script>
import * as AntdIcons from '@ant-design/icons-vue';

export default {
    components: {
        ...AntdIcons,
    },
    props: [],
    data() {
        return {
            // 
            modalOpen:false,

            options:[],
            formitems: [],
            formInput:[],
        };
    },
    created(){
        this.getOptions()
    },
    mounted() {
        this.checkSession(); // 在組件掛載時檢查會話
    },
    computed:{
    },
    methods:{

        async checkSession() {
            try {
                const response = await axios.get('/session');
                if (response.data) {
                    this.showQuizModal(); // 使用 this 調用 showQuizModal 方法
                }
            } catch (error) {
                console.error('Error fetching session:', error);
            }
        },

        getOptions(){
            
            axios.get(route('member.quizs.get_option'))
                .then(response => {
                    this.options = response.data
                    response.data.forEach( (item)=>{
                        if( item.type == "input"){
                            this.formInput.push( {code:item.code, value:""} )
                        }
                    })
                })

        },
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
            
            this.$inertia.post(route("member.quiz_items.store"), result, {
                onSuccess: (page) => { location.reload() },
            });
        },
        showQuizModal(){
            this.modalOpen = !this.modalOpen
        }
    }
}
</script>

<template>
    
    <a href="#" class="text-xl text-blue-600 hover:text-blue-800" @click="showQuizModal()">
        小问题
        <FormOutlined />
    </a>

    <a-modal  width="800px" v-model:open="modalOpen" class="" title="小问题" :footer="null">
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex flex-col">
                <div class="pb-4">
                    若今天已经完成了可以跳过<br><br>

                    每次登陆情绪感受提问的问题，回答点击即可，距上次登陆有如下感受？是否选择：
                </div>

                <div class="flex " v-if="options.length > 0">
                    <a-form class="w-full" :model="formitems" autocomplete="off"  enctype="multipart/form-data">
                        <a-checkbox-group v-model:value="formitems" class="flex flex-col gap-4 ">

                            <div v-for="(o,index) in options">
                                <div v-if="o.type =='options'" class="flex px-4 gap-2 flex-1 border-b-2 leading-3"  
                                    :class=" formitems.includes(o.code)? 'border-blue-600 ':''"
                                    @click="checkOption(o)">

                                    <a-checkbox :value="o.code" @click="checkOption(o)"></a-checkbox>

                                    <span  class="flex items-center ">
                                        <!-- <a-divider class="py-4 bg-slate-200" type="vertical"  /> -->
                                        <div class="py-3 ">{{ o.title }}</div>
                                    </span>
                                </div>
                                <div v-else-if="o.type =='input'" class="px-4 py-2 flex flex-col gap-2 "
                                    :class=" formInput.find( x => x.code == o.code).value == ''? 'border-blue-600 ':''">
                                    {{ o.title }}<br>
                                    <a-input type="input" v-model:value="formInput.find( x => x.code == o.code).value"></a-input>
                                </div>
                            </div>
                        </a-checkbox-group>
                        <div class="mt-6 text-end">
                            <a-button key="Update" type="primary" @click="submitForm()">提交</a-button>
                        </div>
                    </a-form>
                </div>
            </div>
        </div>
    </a-modal>
</template>

<style>
</style>