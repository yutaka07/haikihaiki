import Vue from "vue";
import VueRouter from "vue-router";
import UserHome from "./usercomponents/UserHome.vue";
import ProductDetail from "./usercomponents/ProductDetail.vue";
import BuyProductList from "./usercomponents/BuyProductList.vue";
import Msg from "./usercomponents/Msg.vue";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "hash",
    routes: [
        {
            path: "/",
            name: "UserHome",
            component: UserHome
        },
        {
            path: "/productdetail/:id",
            name: "ProductDetail",
            component: ProductDetail,
            props: route => ({ id: Number(route.params.id) })
        },
        {
            path: "/buyproductlist",
            name: "BuyProductList",
            component: BuyProductList
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
