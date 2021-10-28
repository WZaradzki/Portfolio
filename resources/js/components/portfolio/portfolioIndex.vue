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

      <div
        v-for="portfolio in portfolios"
        :key="portfolio.id"
        class="mt-10 flex items-center flex-col md:flex-row justify-start"
      >
        <img
          :src="portfolio.cover"
          class="w-60 rounded-md object-contain h-60"
          :alt="portfolio.title"
        />
        <div class="w-full flex flex-col gap-y-5 justify-center p-3">
          <h1 class="text-3xl font-bold th-color">{{ portfolio.title }}</h1>
          <p class="text-base fr-color" v-html="portfolio.description"></p>
          <router-link
            :to="{
              name: 'portfolio',
              params: { slug: portfolio.lang_index },
            }"
            class="
              flex
              items-center
              justify-end
              w-auto
              px-5
              py-3
              border border-transparent
              text-base
              font-bold
              rounded-md
              th-bg
              main-color
              hover:opacity-25
              self-end
            "
          >
            Przejdź
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import usePortfolios from "../../composables/portfolios";
import { onMounted, watch, computed, ref } from "vue";

export default {
  props: {
    lang: {
      required: true,
      type: String,
    },
  },
  setup(props) {
    const { portfolios, getPortfolios } = usePortfolios();
    onMounted(getPortfolios(props.lang));

    watch(props, (props, prevProps) => {
      getPortfolios(props.lang);
    });

    return {
      portfolios,
    };
  },
};
</script>