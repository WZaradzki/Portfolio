<template>
  <!-- bg-layout h-screen -->

  <div
    v-if="portfolio"
    class="relative bg-pf-layout min-h-screen overflow-hidden"
  >
    <div
      class="relative w-full h-3/4 flex flex-col items-center justify-center"
    >
      <!-- <div class="flex justify-center md:justify-end -mt-16">
        <img
          class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500"
          src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
        />
      </div> -->

      <img
        class="w-1/2 md:w-1/2 lg:w-1/3 bg-white shadow-xl rounded-lg my-20"
        :src="portfolio.cover"
        :alt="portfolio.title"
      />
      <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold fr-color">
        {{ portfolio.title }}
      </h1>
    </div>
    <div class="flex flex-col items-center w-full gap-y-10 mt-20 mb-20">
      <div class="w-11/12 md:w-2/3 py-4 px-8 fr-bg shadow-xl rounded-lg">
        <p class="text-base" v-html="portfolio.description"></p>
      </div>
      <portfolio-section :sections="portfolio.sections"></portfolio-section>
      <portfolio-carousel :images="portfolio.images"></portfolio-carousel>
      <portfolio-links :links="portfolio.links"></portfolio-links>
      <div class="flex w-11/12 md:w-2/3 text-md items-center justify-between">
        <router-link
          v-if="prevPortfolio.lang_index"
          class="fr-color link_th"
          :to="{
            name: 'portfolio',
            params: { slug: prevPortfolio.lang_index },
          }"
        >
          <span v-if="store.getters.Lang == 'PL'"> Poprzedni projekt </span>
          <span v-else> Prev project </span></router-link
        >
        <router-link
          v-if="nextPortfolio.lang_index"
          class="fr-color link_th"
          :to="{
            name: 'portfolio',
            params: { slug: nextPortfolio.lang_index },
          }"
        >
          <span v-if="store.getters.Lang == 'PL'"> Następny projekt </span>
          <span v-else> Next project </span></router-link
        >
      </div>
    </div>
  </div>
</template>
<script>
import { Icon } from "@iconify/vue";

import usePortfolios from "../../composables/portfolios";
import { computed, onMounted, watch, reactive } from "vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
import PortfolioSection from "../../components/portfolio/portfolioSection.vue";
import portfolioCarousel from "../../components/portfolio/portfolioCarousel.vue";
import PortfolioLinks from "../../components/portfolio/portfolioLinks.vue";

export default {
  setup() {
    const {
      portfolio,
      nextPortfolio,
      prevPortfolio,
      getPortfolio,
      getNextPortfolio,
      getPrevPortfolio,
    } = usePortfolios();
    const store = useStore();
    const route = useRoute();

    const id = {
      id: {
        lang: store.getters.Lang,
        slug: route.params.slug,
      },
    };

    // const Lang = reactive({
    //   lang: store.getters.Lang,
    // });

    onMounted(getPortfolio(id));
    onMounted(getNextPortfolio(id));
    onMounted(getPrevPortfolio(id));

    watch(store.state, (props, prevProps) => {
      const id = {
        id: {
          lang: store.getters.Lang,
          slug: route.params.slug,
        },
      };
      getPortfolio(id);
      getNextPortfolio(id);
      getPrevPortfolio(id);
    });

    watch(route, (props, prevProps) => {
      if (route.params.slug) {
        const id = {
          id: {
            lang: store.getters.Lang,
            slug: route.params.slug,
          },
        };
        getPortfolio(id);
        getNextPortfolio(id);
        getPrevPortfolio(id);
      }
    });

    return {
      portfolio,
      store,
      nextPortfolio,
      prevPortfolio,
    };
  },
  components: {
    PortfolioSection,
    portfolioCarousel,
    PortfolioLinks,
    // Icon,
    // Who,
    // ActivitiesComponent,
    // PortfolioIndex,
  },
};
</script>
