<template>
  <!-- bg-layout h-screen -->

  <div class="relative bg-layout overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div
        class="
          relative
          z-10
          pb-8
          sm:pb-16
          md:pb-20
          lg:max-w-3xl lg:w-full lg:pb-28
          xl:pb-32
        "
      >
        <div
          class="
            mt-10
            mx-auto
            max-w-8xl
            px-3
            sm:mt-12 sm:px-6
            md:mt-16
            lg:mt-20 lg:px-8
            xl:mt-28
          "
        >
          <div class="sm:text-center lg:text-left">
            <h1
              v-if="store.getters.Lang == 'PL'"
              class="
                text-2xl
                tracking-tight
                font-extrabold
                fr-color
                sm:text-3xl
                md:text-4xl
              "
            >
              <span class="block inline">Nazywam się</span>
              {{ " " }}
              <span class="block th-color inline">Wiktor Zaradzki</span>
              {{ " " }}

              <span class="block inline">i jestem Full Stack Developerem.</span>
            </h1>
            <h1
              v-else
              class="
                text-2xl
                tracking-tight
                font-extrabold
                fr-color
                sm:text-3xl
                md:text-4xl
              "
            >
              <span class="block inline">My name is</span>
              {{ " " }}
              <span class="block th-color inline">Wiktor Zaradzki</span>
              {{ " " }}

              <span class="block inline">and I am a Full Stack Developer.</span>
            </h1>
            <p
              class="
                mt-3
                text-base
                fr-color
                sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto
                md:mt-5 md:text-xl
                lg:mx-0
              "
            >
              <span v-if="store.getters.Lang == 'PL'">
                Mieszkam i pracuję w Trójmieście. Tworzę aplikacje webowe
                dopasowane do oczekiwań klientów. Prowadzę projekty od początku
                do końca. Zapraszam do zapoznania sie z portfolio i czekam na
                kontakt.
              </span>
              <span v-else>
                I live and work in Gdańsk, Poland. I create web applications
                tailored to customer expectations. I run projects from beginning
                to end. I invite you to read the portfolio and look forward to
                hearing from you.</span
              >
            </p>
          </div>
        </div>
      </div>

      <div class="py-12">
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
              <span v-if="store.getters.Lang == 'PL'"> Moje narzędzia </span>
              <span v-else> My Tools </span>
            </h2>
          </div>

          <div class="mt-10">
            <dl class="space-y-0 grid grid-cols-2 gap-x-8 gap-y-10">
              <div v-for="tool in tools" :key="tool.name" class="relative">
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
                    <Icon class="h-10 w-10" :icon="tool.icon" />
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
              </div>
            </dl>
          </div>
        </div>
      </div>
      <activities-component :lang="store.getters.Lang"></activities-component>
      <who :lang="store.getters.Lang"></who>
      <portfolio-index :lang="store.getters.Lang"></portfolio-index>
    </div>
  </div>
</template>
<script>
import { Icon } from "@iconify/vue";
import useProjects from "../../composables/projects";
import useTools from "../../composables/tools";
import { onMounted, computed, ref } from "vue";
import ActivitiesComponent from "../../components/activities/Activites.vue";
import Who from "../../components/who/Who.vue";
import PortfolioIndex from "../../components/portfolio/portfolioIndex.vue";

export default {
  computed: {
    store() {
      return this.$store;
    },
  },
  setup() {
    const { projects, getProjects } = useProjects();
    onMounted(getProjects);

    const { tools, getTools } = useTools();
    onMounted(getTools);

    return {
      projects,
      tools,
    };
  },
  components: {
    Icon,
    Who,
    ActivitiesComponent,
    PortfolioIndex,
  },
};
</script>
