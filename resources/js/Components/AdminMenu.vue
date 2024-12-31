<template>
<div>


</div>
</template>

<script>
import * as AntdIcons from '@ant-design/icons-vue';
import NavLink from '@/Components/NavLink.vue';

export default {
    components: {
        ...AntdIcons,
        NavLink,
    },
    data() {
        return {
            collapsed:false,
            selectedKeys: [],
            openKeys: ["sub1"],
        };
    },
    mounted() { }
}
</script>
