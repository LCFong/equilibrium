<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
  components: {
    AdminLayout,
  },
  props: ["id", "activity"],
  data() {
    return {
      selectedOption: null,
      radioStyle:{
        display: 'flex',
        height: '30px',
        lineHeight: '30px',
      },
    };
  },
  methods: {
    handleSubmit() {
      // Handle form submission
      console.log("Selected option:", this.selectedOption);
    },
  },
};
</script>

<template>
  <AdminLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("dashboard") }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-48">
          <div class="p-5">
            <a-typography-title :level="3"
              >{{ id }}: {{ activity.title }}</a-typography-title
            >
            <form @submit.prevent="handleSubmit">
              <a-radio-group v-model:value="selectedOption">
                <template v-for="(option, idx) in activity.options">
                  <a-radio :style="radioStyle" :value="idx">{{option}}</a-radio>
                </template>
              </a-radio-group>
              <a-divider/>
              <div v-if="activity.image" class="mt-4">
                <img
                  :src="activity.image"
                  alt="Activity Image"
                  class="w-full h-auto rounded-lg"
                />
              </div>
              <div v-if="activity.video" class="mt-4">
                <video controls class="w-full h-auto rounded-lg">
                  <source :src="activity.video" type="video/mp4" />
                  Your browser does not support the video tag.
                </video>
              </div>

              <a-button type="primary" class="mt-4" html-type="submit"
                >Submit</a-button
              >
            </form>
          </div>
        </div>
        <div class="bg-white p-4 gap-4 my-2 rounded-lg shadow-md">
          <a-button :href="route('meditation.index')">Home</a-button>
          <a-button :href="route('meditation.show', Number(id) - 1)"
            >Previours</a-button
          >
          <a-button :href="route('meditation.show', Number(id) + 1)"
            >Next</a-button
          >
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
