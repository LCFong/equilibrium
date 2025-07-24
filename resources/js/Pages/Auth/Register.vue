<script setup>
import { ref, onMounted } from 'vue';
import {
    Head,
    Link,
    useForm
} from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    gender: 'M',
    education: 'F1',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('user.register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
const educationOptions = ref([
    { label: '初中',  options: [
            { value: 'F1', label: '初一 F1', },
            { value: 'F2', label: '初二 F2', },
            { value: 'F3', label: '初三 F3', },
        ],
    },
    { label: '高中',  options: [
            { value: 'F4', label: '高一 F4', },
            { value: 'F5', label: '高二 F5', },
            { value: 'F6', label: '高三 F6', },
        ],
    },
    { label: '大學',  options: [
            { value: 'Y1', label: '大一 Year1', },
            { value: 'Y2', label: '大二 Year2', },
            { value: 'Y3', label: '大三 Year3', },
            { value: 'Y4', label: '大四 Year4', },
            { value: 'Y5', label: '大五 Year5', },
        ],
    },
    { value: 'other', label: '其他 Other' },
]);
</script>

<template>
<Head title="Register" />

<AuthenticationCard>
    <!-- <template #logo>
            <AuthenticationCardLogo />
        </template> -->

    <form @submit.prevent="submit">
        <div class="mt-4">
            <div class="flex">
                <InputLabel for="email" value="電郵 (用戶名)" />
            </div>
            <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
            <div class="flex">
                <InputLabel for="password" value="密碼" />
            </div>
            <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
            <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4">
            <div class="flex">
                <InputLabel for="password_confirmation" value="確認密碼" />
            </div>
            <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>

        <a-divider class="mt-" />

        <div class="mt-4">
            <InputLabel for="name" value="名字" />
            <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div v-if="false" class="mt-4">
            <InputLabel for="gender" value="性別" />
            <a-radio-group v-model:value="form.gender" name="radioGroup" class="mt-1 h-8 flex items-center">
                <a-radio value="M">男</a-radio>
                <a-radio value="F">女</a-radio>
                <a-radio value="LGBT">LGBT</a-radio>
            </a-radio-group>
            <!-- <TextInput id="gender" v-model="form.gender" type="text" class="mt-1 block w-full" required autofocus autocomplete="gender" /> -->
            <InputError class="mt-2" :message="form.errors.gender" />
        </div>
        <div v-if="false" class="mt-4">
            <InputLabel for="education" value="學歷" />
            <a-select 
                class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full "
                id="education" v-model:value="form.education" :options="educationOptions"></a-select>
            <InputError class="mt-2" :message="form.errors.education" />
        </div>

        <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
            <InputLabel for="terms">
                <div class="flex items-center">
                    <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                    <div class="ms-2">
                        I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                    </div>
                </div>
                <InputError class="mt-2" :message="form.errors.terms" />
            </InputLabel>
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            已經註冊
            </Link>

            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                註冊
            </PrimaryButton>
        </div>
    </form>
</AuthenticationCard>
</template>

<style scoped>
:deep(.ant-select-selector){
    align-items: center;
    height: 42px !important;
}
</style>