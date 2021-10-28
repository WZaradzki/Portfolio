<template>
  <div class="bg-white">
    <!-- Mobile menu -->
    <TransitionRoot as="template" :show="open">
      <Dialog
        as="div"
        class="fixed inset-0 flex z-40 lg:hidden"
        @close="open = false"
      >
        <TransitionChild
          as="template"
          enter="transition-opacity ease-linear duration-300"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="transition-opacity ease-linear duration-300"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay class="fixed inset-0 bg-black bg-opacity-25" />
        </TransitionChild>

        <TransitionChild
          as="template"
          enter="transition ease-in-out duration-300 transform"
          enter-from="-translate-x-full"
          enter-to="translate-x-0"
          leave="transition ease-in-out duration-300 transform"
          leave-from="translate-x-0"
          leave-to="-translate-x-full"
        >
          <div
            class="
              relative
              max-w-xs
              w-full
              bg-white
              shadow-xl
              pb-12
              flex flex-col
              overflow-y-auto
            "
          >
            <div class="px-4 pt-5 pb-2 flex">
              <button
                type="button"
                class="
                  -m-2
                  p-2
                  rounded-md
                  inline-flex
                  items-center
                  justify-center
                  text-gray-400
                "
                @click="open = false"
              >
                <span class="sr-only">Close menu</span>
                <XIcon class="h-6 w-6" aria-hidden="true" />
              </button>
            </div>
            <div
              class="
                flex flex-col
                items-center
                justify-center
                h-full
                gap-y-4
                p-4
              "
            >
              <router-link
                class="w-auto absolute top-3"
                :to="{ name: 'Home' }"
                @click="open = false"
              >
                <img
                  class="h-10"
                  :src="'/storage/assets/logo/logo.png'"
                  alt="Logo"
                />
              </router-link>

              <router-link
                v-if="store.getters.Lang == 'PL'"
                @click="open = false"
                v-for="page in navigation.pages.pl"
                :key="page.name"
                :to="page.href"
                class="
                  transition
                  duration-500
                  flex
                  items-center
                  justify-start
                  font-medium
                  text-gray-700
                  hover:text-gray-800
                "
                >{{ page.name }}</router-link
              >
              <router-link
                v-else
                @click="open = false"
                v-for="page in navigation.pages.eng"
                :key="page.name"
                :to="page.href"
                class="
                  transition
                  duration-500
                  flex
                  items-center
                  justify-start
                  font-medium
                  text-gray-700
                  hover:text-gray-800
                "
                >{{ page.name }}</router-link
              >
            </div>
          </div>
        </TransitionChild>
      </Dialog>
    </TransitionRoot>

    <header class="relative bg-white">
      <nav aria-label="Top" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200">
          <div class="h-16 justify-between flex items-center">
            <button
              type="button"
              class="bg-white p-2 rounded-md text-gray-400 lg:hidden"
              @click="open = true"
            >
              <span class="sr-only">Open menu</span>
              <MenuIcon class="h-6 w-6" aria-hidden="true" />
            </button>

            <!-- Logo -->
            <div class="ml-4 flex lg:ml-0">
              <a href="#">
                <span class="sr-only">WZ</span>
                <router-link :to="{ name: 'Home' }">
                  <img
                    class="h-8 w-auto"
                    :src="'/storage/assets/logo/logo.png'"
                    alt="Logo"
                  />
                </router-link>
              </a>
            </div>

            <!-- Flyout menus -->
            <div class="flex">
              <PopoverGroup class="hidden lg:ml-8 lg:block lg:self-stretch">
                <div class="h-full flex justify-end space-x-2">
                  <router-link
                    v-if="store.getters.Lang == 'PL'"
                    v-for="page in navigation.pages.pl"
                    :key="page.name"
                    :to="page.href"
                    class="
                      flex
                      items-center
                      text-sm
                      font-medium
                      text-black
                      hover:text-gray-800
                    "
                    >{{ page.name }}</router-link
                  >
                  <router-link
                    v-else
                    v-for="page in navigation.pages.eng"
                    :key="page.name"
                    :to="page.href"
                    class="
                      flex
                      items-center
                      text-sm
                      font-medium
                      text-black
                      hover:text-gray-800
                    "
                    >{{ page.name }}</router-link
                  >
                </div>
              </PopoverGroup>
              <div class="flex p-1 pl-3">
                <Icon
                  v-if="store.getters.Lang == 'PL'"
                  @click="ChangeLang('ENG')"
                  class="h-10 w-10 cursor-pointer"
                  icon="openmoji:flag-united-kingdom"
                />
                <Icon
                  v-if="store.getters.Lang == 'ENG'"
                  @click="ChangeLang('PL')"
                  class="h-10 w-10 cursor-pointer"
                  icon="openmoji:flag-poland"
                />
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div>
      <router-view></router-view>
    </div>
    <div class="social-menu">
      <span class="transform rotate-90 fixed bottom-24 right-1 text-lg th-color"
        >GitHub</span
      >
      <a href="https://github.com/WZaradzki" target="_blank">
        <Icon
          class="h-10 w-10 cursor-pointer fixed bottom-5 right-4 th-color"
          icon="akar-icons:github-fill"
        />
      </a>
    </div>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { Icon } from "@iconify/vue";
import { ref } from "vue";
import {
  Dialog,
  DialogOverlay,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
  Tab,
  TabGroup,
  TabList,
  TabPanel,
  TabPanels,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import {
  MenuIcon,
  SearchIcon,
  ShoppingBagIcon,
  XIcon,
} from "@heroicons/vue/outline";

const navigation = {
  pages: {
    pl: [
      { name: "Kontakt", href: "../#kontakt" },
      { name: "Portfolio", href: "../#portfolio-index" },
    ],
    eng: [
      { name: "Contact", href: "../#kontakt" },
      { name: "Portfolio", href: "../#portfolio-index" },
    ],
  },
};

export default {
  components: {
    Icon,
    Dialog,
    DialogOverlay,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
    MenuIcon,
    SearchIcon,
    ShoppingBagIcon,
    XIcon,
  },
  setup() {
    const open = ref(false);
    const store = useStore();

    return {
      navigation,
      open,
      store,
    };
  },
  methods: {
    ChangeLang(lang_name) {
      this.$store.dispatch("ChangeLang", lang_name);
    },
  },
};
</script>