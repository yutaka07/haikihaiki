import Vue from "vue";
import VueRouter from "vue-router";
import Top from "./admintopcomponents/Top.vue";
import ProductDetail from "./admintopcomponents/ProductDetail.vue";
import TopSearch from "./admintopcomponents/TopSearch.vue";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "hash",
    routes: [
        {
            path: "/",
            name: "Top",
            component: Top
        },
        {
            path: "/topsearch",
            name: "TopSearch",
            component: TopSearch
        },
        {
            path: "/productdetail/:id",
            name: "ProductDetail",
            component: ProductDetail,
            props: route => ({ id: Number(route.params.id) })
        },
        {
            path: "*",
            redirect: "/"
        }
    ],
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { x: 0, y: 0 };
        }
    }
});
