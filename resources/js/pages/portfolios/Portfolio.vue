<template>
  <!-- bg-layout h-screen -->

  <div class="relative bg-layout min-h-screen overflow-hidden">PORTFOLIO</div>
</template>
<script>
// import usePortfolios from "../../composables/portfolios";

export default {
  computed: {
    store() {
      return this.$store;
    },
  },
  setup() {
    // const { projects, getProjects } = useProjects();
    // onMounted(getProjects);
    // const { tools, getTools } = useTools();
    // onMounted(getTools);
    // return {
    //   projects,
    //   tools,
    // };
  },
  components: {
    // Icon,
    // Who,
    // ActivitiesComponent,
    // PortfolioIndex,
  },
};
</script>
