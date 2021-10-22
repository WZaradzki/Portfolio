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
          <span>Portfolio</span>
        </h2>
      </div>

      <div class="mt-10">
        <dl
          class="
            space-y-10
            md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8z md:gap-y-10
          "
        >
          <div v-for="tool in activityLang" :key="tool.name" class="relative">
            <dt>
              <div
                class="
                  absolute
                  flex
                  items-center
                  justify-center
                  h-14
                  w-14
                  rounded-md
                  bg-black
                  th-color
                "
              >
                <span
                  class="
                    h-full
                    flex
                    items-center
                    justify-center
                    w-full
                    plaster-font
                    uppercase
                    text-4xl text-center
                  "
                  >{{ tool.icon }}</span
                >
              </div>
              <p
                class="
                  ml-16
                  text-m
                  md:text-lg
                  flex
                  items-center
                  h-14
                  leading-6
                  font-medium
                  fr-color
                "
              >
                {{ tool.name }}
              </p>
            </dt>
            <dd
              class="mt-2 ml-16 text-base fr-color"
              v-html="tool.description"
            ></dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</template>
<script>
import useActivities from "../../composables/activities";
import { onMounted, watch, computed, ref } from "vue";

export default {
  props: {
    lang: {
      required: true,
      type: String,
    },
  },

  setup(props) {
    const { activityLang, getActivityLang } = useActivities();
    onMounted(getActivityLang(props.lang));

    watch(props, (props, prevProps) => {
      getActivityLang(props.lang);
    });

    return {
      activityLang,
    };
  },
  data() {
    return {
      idLang: {
        id: "",
        lang: "",
      },
    };
  },
  mounted() {
    this.idLang.lang = props.lang;
  },
};
</script>