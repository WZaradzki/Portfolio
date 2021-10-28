<template>
  <!-- bg-layout h-screen -->

  <div v-if="lang" class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="">
        <h2
          class="
            text-2xl
            sm:text-3xl
            md:text-4xl
            fr-color
            font-extrabold
            tracking-wide
            uppercase
          "
        >
          <span> {{ bioLang.title }}</span>
        </h2>
      </div>

      <div class="mt-10">
        <dl class="w-full">
          <div
            class="
              flex
              gap-y-2
              md:gap-x-10
              items-center
              flex-col
              justify-center
              md:flex-row
            "
          >
            <img
              class="object-cover w-1/3 h-48 md:w-1/6 mr-2 rounded-full"
              :src="bioLang.image"
              alt="Profile image"
            />

            <dd class="w-full text-lg fr-color" v-html="bioLang.text"></dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</template>
<script>
import { Icon } from "@iconify/vue";
import useBio from "../../composables/bio";
import { onMounted, watch, computed, ref } from "vue";

export default {
  props: {
    lang: {
      required: true,
      type: String,
    },
  },
  setup(props) {
    const { bioLang, getBioLang } = useBio();
    onMounted(getBioLang(props.lang));

    watch(props, (props, prevProps) => {
      getBioLang(props.lang);
    });

    return {
      bioLang,
    };
  },
  components: {
    Icon,
  },
};
</script>