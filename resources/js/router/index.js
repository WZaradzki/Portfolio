import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "Home",
        component: () =>
            import(/* webpackChunkName: "Home" */ "../pages/home/Home.vue"),
    },
    {
        path: "/portfolio/:slug",
        name: "portfolio",
        component: () =>
            import(
                /* webpackChunkName: "portfolio" */ "../pages/portfolios/Portfolio.vue"
            ),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
