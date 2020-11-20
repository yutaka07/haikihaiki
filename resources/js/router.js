import Vue from "vue";
import VueRouter from "vue-router";
import AdminHome from "./admincomponents/AdminHome.vue";
import ProductDetail from "./admincomponents/ProductDetail.vue";
import RegistProductList from "./admincomponents/RegistProductList.vue";
import SoldProductList from "./admincomponents/SoldProductList.vue";
import ProductEdit from "./admincomponents/ProductEdit.vue";
import Msg from "./admincomponents/Msg.vue";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "hash",
    routes: [
        {
            path: "/",
            name: "AdminHome",
            component: AdminHome
        },
        {
            path: "/productdetail/:id",
            name: "ProductDetail",
            component: ProductDetail,
            props: route => ({ id: Number(route.params.id) })
        },
        {
            path: "/registproductlist",
            name: "RegistProductList",
            component: RegistProductList
        },
        {
            path: "/msg",
            name: "Msg",
            component: Msg,
            props: true
        },
        {
            path: "/soldproductlist",
            name: "SoldProductList",
            component: SoldProductList
        },
        {
            path: "/productedit/:id",
            name: "ProductEdit",
            component: ProductEdit,
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
