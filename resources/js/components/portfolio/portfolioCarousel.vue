<template>
  <div
    v-if="images"
    class="rounded-lg fr-bg relative overflow-hidden w-11/12 md:w-2/3 shadow-xl"
  >
    <carousel class="w-full" :items-to-show="1">
      <slide v-for="i in images" :key="i.id">
        <div class="carousel__item h-full">
          <img :src="i.url" alt="" class="w-full h-full object-cover" />
        </div>
      </slide>

      <template #addons>
        <navigation />
        <pagination />
      </template>
    </carousel>
  </div>
</template>
<script>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";
export default {
  props: {
    images: {
      required: false,
      type: Array,
    },
  },
  setup() {},
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
  data: () => ({
    // carousel settings
    settings: {
      itemsToShow: 1,
      snapAlign: "center",
    },
    // breakpoints are mobile first
    // any settings not specified will fallback to the carousel settings
    breakpoints: {
      // 700px and up
      700: {
        itemsToShow: 3.5,
        snapAlign: "center",
      },
      // 1024 and up
      1024: {
        itemsToShow: 5,
        snapAlign: "start",
      },
    },
  }),
};
</script>
<style >
.carousel {
  display: flex;
  justify-content: center;
}

.carousel__item {
  display: flex;
  justify-content: center;
  align-items: center;
}

.carousel__prev,
.carousel__next {
  box-sizing: content-box;
  background-color: #222831;
}

.carousel__prev:hover .carousel__icon,
.carousel__next:hover .carousel__icon {
  color: #ffd369;
}

.carousel__prev {
  left: 2%;
}

.carousel__next {
  right: 2%;
}

@media (max-width: 1300px) {
  .carousel__prev {
    left: 6%;
  }

  .carousel__next {
    right: 6%;
  }
}

.carousel__pagination-button {
  height: 16px;
  width: 16px;
  border-radius: 30px;
  background-color: white;
  border: #222831 solid 1px;
}
.carousel__pagination-button--active {
  background-color: #ffd369;
}

.carousel__pagination {
  position: absolute;
  bottom: 2%;
}
</style>
