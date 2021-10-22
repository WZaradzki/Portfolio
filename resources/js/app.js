require("./bootstrap");

import { createApp } from "vue";
import router from "./router";
import App from "./layouts/App.vue";
import store from "./store";

createApp(App, {}).use(router).use(store).mount("#app");
