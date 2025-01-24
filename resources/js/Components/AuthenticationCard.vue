<template>
<div class="min-h-screen overflow-hidden flex flex-col justify-center items-center pt-6 sm:pt-0 login-background">

    <div class="max-w-7xl w-full lg:w-[500px] rounded-3xl relative p-2">

        
        <div class="z-50 bg-slate-50 relative shadow-md rounded-3xl border border-slate-200">
            <div class="flex justify-center overflow-hidden my-2">
                <slot name="logo" />
            </div>

            <div class="p-8">
                <slot />
            </div>
        </div>
        <div class="z-0 absolute inset-0 bg-gradient-to-r from-orange-300/80 to-amber-400/70 shadow-lg transform -skew-y-4 sm:skew-y-0 -rotate-6 sm:-rotate-6 rounded-3xl"></div>
    </div>
</div>
</template>
<!-- <template>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 login-background">
    <div class="grid grid-cols-2 max-w-7xl shadow-md ">
        <div class=" hidden md:block ">
            <div class="h-[100%] bg-cover w-[600px]" style="background-image: url('images/login_logo.jpg') "></div>
        </div>
        <div class="bg-white col-span-2 mt-10 md:col-span-1 md:my-auto">
            <div class="flex justify-center">
                <slot name="logo" />
            </div>

            <div class="w-full  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden ">
                <slot />
            </div>
        </div>
    </div>
</div>
</template> -->

<style>
.login-background {
    background: rgb(255, 214, 186);
    background: linear-gradient(135deg, rgba(224, 168, 130, 0.3) 0%, rgba(255, 227, 186, 0.583) 25%, rgba(255, 214, 186, 0.538) 60%, rgba(255, 215, 200, 0.8) 100%);
}
</style>