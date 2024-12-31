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
        <div class="z-0 absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-400 shadow-lg transform -skew-y-4 sm:skew-y-0 -rotate-6 sm:-rotate-6 rounded-3xl"></div>

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
.login-background{
    background: rgb(214,255,219);
    background: linear-gradient(135deg, rgba(214,255,219,0.5746673669467788) 0%, rgba(227,255,229,0.5830707282913166) 25%, rgba(214,255,215,0.5382528011204482) 60%, rgba(189,244,255,1) 100%);

}
</style>