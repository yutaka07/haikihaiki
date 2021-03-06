import Vue from "vue";
import VueRouter from "vue-router";
import Top from "./topcomponents/Top.vue";
import ProductDetail from "./topcomponents/ProductDetail.vue";
import TopSearch from "./topcomponents/TopSearch.vue";
import Msg from "./topcomponents/Msg.vue";

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
            path: "/msg",
            name: "Msg",
            component: Msg,
            props: true
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
