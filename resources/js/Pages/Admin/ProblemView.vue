<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import * as AntdIcons from '@ant-design/icons-vue';

export default {
    components: {
        AdminLayout,
        ...AntdIcons,
    },
    props: ["options"],
    data() {
        return {
            
            // 
            formitems: [],
            formInput:[],

            columns:[
                { title: 'id', dataIndex: 'id',  sorter: (a, b) => a.id - b.id},
                { title: 'Module', dataIndex: 'module'},
                { title: 'Type', dataIndex: 'type'},
                { title: 'Title', dataIndex: 'title'},
                { title: 'Name', dataIndex: 'name'},
                { title: 'Operation', dataIndex: 'operation'},
            ]
        };
    },
    created(){
        this.options.forEach( (item)=>{
            if( item.type == "input"){
                this.formInput.push( {name:item.name, value:""} )
            }
        })
    },
    methods:{
        createOptions(){
            this.$inertia.post(route("admin.problems.store"), this.formData, {
                onSuccess: (page) => { location.reload() },
            });
        },
        editOptions(){
            this.$inertia.put(route("admin.problems.update", this.formData['id']), this.formData, {
                onSuccess: (page) => { location.reload() },
            });
        },
        checkOption(row){
            let index = this.formitems.indexOf(row.name);
            if (index !== -1) {
                // 如果存在，移除該項
                this.formitems.splice(index, 1);
            } else {
                // 如果不存在，加入該項
                // this.formitems.push( {name: row.name} );
                this.formitems.push(row.name);
            }
        },
        editRecord(record){
            this.formState = 'edit'
            this.formData = record
        },
        submitForm(){
            let o = this.formitems.map( x => ({name: x, value:true}))
            let i = this.formInput.filter(item => item.value !== "")
            let result = [...o , ...i]
            
            this.$inertia.post(route("admin.answers.store"), result, {
                onSuccess: (page) => { location.reload() },
            });
        }
    }
}
</script>

<template>
<AdminLayout title="Dashboard">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            压力感知
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-10">
            
            <div class="flex" v-if="options.length > 0">
                <a-form class="w-full" :model="formitems" autocomplete="off"  enctype="multipart/form-data">
                    <a-checkbox-group v-model:value="formitems" class="flex flex-col gap-5 ">

                        <div v-for="(o,index) in options">
                            <div v-if="o.type =='options'" class="flex px-4 gap-2 rounded-lg text-base bg-white shadow-md flex-1"  
                                :class=" formitems.includes(o.name)? 'checkedOption ':'uncheckedOption'">

                                <a-checkbox :value="o.name" ></a-checkbox>

                                <span @click="checkOption(o)" class="flex items-center ">
                                    <a-divider class="py-4 bg-slate-200" type="vertical"  />
                                    <div class="py-3 ">{{ o.title }}</div>
                                </span>
                            </div>
                            <div v-else-if="o.type =='input'" class="px-4 py-2 flex flex-col gap-2 rounded-lg text-base bg-white shadow-md "
                                :class=" formInput.find( x => x.name == o.name).value == ''? 'uncheckedOption':'checkedOption'">
                                {{ o.title }}<br>
                                <a-input type="input" v-model:value="formInput.find( x => x.name == o.name).value"></a-input>
                            </div>
                        </div>
                    </a-checkbox-group>
                    <div class="mt-4">
                        <a-button key="Update" type="primary" @click="submitForm()">提交</a-button>
                    </div>
                </a-form>
            </div>
            <div v-else>未輸入問題<a class="text-blue-500" :href="route('admin.problems.create')">到此創建</a></div>
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