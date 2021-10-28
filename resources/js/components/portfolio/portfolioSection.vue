<template>
  <div v-if="sections" class="w-11/12 md:w-2/3 p-4 fr-bg shadow-xl rounded-lg">
    <div class="flex w-full gap-y-4 flex-col items-center">
      <div
        v-for="sec in sections"
        :key="sec.id"
        class="
          flex flex-col
          xl:flex-row
          w-full
          items-center justify-center
        "
      >
        <img
          v-if="sec.image"
          :src="sec.image"
          class="rounded-lg w-4/5 sm:w-2/3 xl:w-1/3"
          :alt="sec.name"
        />
        <div
          class="flex w-full xl:w-2/3 items-start justify-start p-3 flex-col"
        >
          <div class="text-xl font-bold pb-1">
            {{ sec.name }}
          </div>
          <p class="text-base" v-html="sec.text"></p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { Icon } from "@iconify/vue";

export default {
  props: {
    sections: {
      required: false,
      type: Array,
    },
  },

  setup() {
    //
  },
};
</script>