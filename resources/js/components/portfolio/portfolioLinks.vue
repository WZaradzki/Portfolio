<template>
  <div class="flex gap-x-3 items-center justify-center">
    <a
      target="_blank"
      v-for="link in links"
      :key="link.id"
      class="
        flex
        items-center
        justify-center
        h-14
        w-14
        rounded-full
        hover:bg-black
        bg-main-color
        th-color
      "
      :href="link.url"
    >
      <Icon class="h-10 w-10" :icon="link.name" />
    </a>
  </div>
</template>
<script>
import { Icon } from "@iconify/vue";

export default {
  props: {
    links: {
      required: false,
      type: Array,
    },
  },

  setup() {
    //
  },
  components: {
    Icon,
  },
};
</script>
