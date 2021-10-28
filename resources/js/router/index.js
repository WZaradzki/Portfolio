import { createRouter, createWebHistory, scrollBehavior } from "vue-router";

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
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            setTimeout(() => {
                const element = document.getElementById(
                    to.hash.replace(/#/, "")
                );
                if (element && element.scrollIntoView) {
                    element.scrollIntoView({
                        block: "start",
                        behavior: "smooth",
                    });
                }
            }, 500);

            //NOTE: This doesn't work for Vue 3
            //return {selector: to.hash}

            //This does
            return { el: to.hash };
        } else if (savedPosition) {
            return savedPosition;
        }
        return { top: 0, behavior: "smooth" };
    },
});
