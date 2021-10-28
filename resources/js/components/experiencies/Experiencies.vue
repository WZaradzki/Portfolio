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
          <span v-if="lang == 'PL'"> Doświadczenie</span>
          <span v-else>Experiencies</span>
        </h2>
      </div>

      <div class="mt-10">
        <dl
          class="
            space-y-10
            md:px-10
            md:space-y-0 md:grid md:grid-cols-1 md:gap-x-8z md:gap-y-10
          "
        >
          <div v-for="experience in experiencies" :key="experience.name" class="flex flex-col">
              <h3 class="text-2xl font-bold th-color">{{experience.name}}</h3>
              <span class="text-xl fr pb-5 fr-color">{{experience.date_start}} - {{experience.date_end}}</span>
              <p
                class="
                  text-m
                  md:text-lg
                  flex
                  items-center
                  leading-6
                  font-medium
                  fr-color
                "
              >
                {{ experience.description }}
              </p>

          </div>
        </dl>
      </div>
    </div>
  </div>
</template>
<script>
import useExperiencies from "../../composables/experiencies";
import { onMounted, watch, computed, ref } from "vue";

export default {
  props: {
    lang: {
      required: true,
      type: String,
    },
  },
  setup(props) {
    const { experiencies, getExperiencies } = useExperiencies();
    onMounted(getExperiencies(props.lang));

    watch(props, (props, prevProps) => {
      getExperiencies(props.lang);
    });

    return {
      experiencies,
    };
  },
};
</script>