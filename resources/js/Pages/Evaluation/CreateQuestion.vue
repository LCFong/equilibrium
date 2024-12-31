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
            // Create Option Form 
            categoryOption:[
                {label : "normal" , value: "normal"},
                // {label : "study" , value: "study"},
                // {label : "interpersonal" , value: "interpersonal"},
            ],
            typeOption:[
                {label : "options" , value: "options"},
                {label : "question box" , value: "input"},
            ],
            formState:'create',
            formData:{},
            // --------
            
            // 
            formitems: [],
            formInput:[],

            columns:[
                { title: 'id', dataIndex: 'id',  sorter: (a, b) => a.id - b.id},
                { title: 'Category', dataIndex: 'category'},
                { title: 'Type', dataIndex: 'type'},
                { title: 'Title', dataIndex: 'title'},
                { title: 'Code', dataIndex: 'code'},
                { title: 'Operation', dataIndex: 'operation'},
            ]
        };
    },
    created(){
        this.options.forEach( (item)=>{
            if( item.type == "input"){
                this.formInput.push( {code:item.code, value:""} )
            }
        })
    },
    methods:{
        createOptions(){
            this.$inertia.post(route("admin.evaluations.store"), this.formData, {
                onSuccess: (page) => { location.reload() },
            });
        },
        editOptions(){
            this.$inertia.put(route("admin.evaluations.update", this.formData['id']), this.formData, {
                onSuccess: (page) => { location.reload() },
            });
        },
        editRecord(record){
            this.formState = 'edit'
            this.formData = record
        },
        
        beforeUploadThumbnail(file) {
            return true
        },
        handleChangeThumbnail(newFileList) {
            this.formData.thumbnails = newFileList.fileList;
        },
        dummyRequest({
            file,
            onSuccess
        }) {
            setTimeout(() => {
                onSuccess(file);
            }, 0);
        },
    }
}
</script>

<template>
<AdminLayout title="Dashboard">
    <template #header>
        <div class="font-semibold text-xl text-gray-800 ">
            压力感知
        </div>
    </template>

    <div class="py-12 ">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-10 bg-white rounded shadow-md">
            
            <div>
                <div class="border-b mb-4 py-2">{{ formState }}</div>
                <a-form :model="formData" autocomplete="off" >
                    <a-form-item label="Title" name="title" autoc>
                        <a-input type="input" v-model:value="formData.title" />
                    </a-form-item>
                    <a-form-item label="Category" name="category" >
                        <a-select v-model:value="formData.category" :options="categoryOption" />
                    </a-form-item>
                    <a-form-item label="Type" name="type" >
                        <a-select type="input" v-model:value="formData.type" :options="typeOption"/>
                    </a-form-item>
                    <a-form-item label="Code" name="code" >
                        <a-input type="input" v-model:value="formData.code" />
                    </a-form-item>
                    <a-form-item label="Media" name="media" >
                        <a-upload  :before-upload="beforeUploadThumbnail" :on-change="handleChangeThumbnail" :multiple="false" :show-upload-list="true" :custom-request="dummyRequest">
                            <a-button >
                                <UploadOutlined />
                                Click to upload
                            </a-button>
                        </a-upload>
                    </a-form-item>

                    <a-form-item >
                        <a-button v-if="formState == 'create'" type="primary" html-type="submit" @click="createOptions()">Submit</a-button>
                        <a-button v-else-if="formState == 'edit'" type="primary" html-type="submit" @click="editOptions()">Edit</a-button>
                    </a-form-item>
                </a-form>
            </div>
            
            <!-- Table -->
            <div>
                <a-table :columns="columns" :data-source="options" :pagination="{ pageSize: 50 }">
                    <template #bodyCell="{ column, text, record, index }">
                        <template v-if="column.dataIndex == 'operation'">
                            <a-button @click="editRecord(record)">{{ $t('edit') }}</a-button>
                        </template>
                        <template v-else>
                            {{ record[column.dataIndex] }}
                        </template>
                    </template>
                </a-table>
            </div>
            <!-- Table -->
            
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