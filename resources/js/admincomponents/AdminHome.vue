<template>
    <div class="container">
        <div>
            <h1 class="u-title__center">マイページ</h1>
            <div class="p-panel__background">
                <div class="p-panel__nav">
                    <a class="p-panel__nav--link" href="top">商品一覧</a>
                    <a class="p-panel__nav--link" href="edit"
                        >プロフィール編集</a
                    >
                </div>
                <div class="p-panel">
                    <div class="p-panel__form">
                        <h2 class="p-panel__title">出品した商品</h2>
                        <a @click="registproductlist">もっと見る ></a>
                    </div>
                    <div class="p-panel__list">
                        <div
                            class="p-panel__body"
                            v-for="(product, index) in products.slice(0, 5)"
                            :key="index"
                            @click="detail(product['id'])"
                        >
                            <div class="p-panel__img">
                                <div
                                    v-show="product['buy_flg'] === 1"
                                    class="p-panel__sold"
                                >
                                    sold
                                </div>
                                <span class="p-panel__img--text"
                                    >¥{{ product["price"] }}</span
                                >
                                <img
                                    class="p-panel__img--image"
                                    :src="product['photofile']"
                                    alt="商品"
                                />
                            </div>
                            <div class="p-panel__footer">
                                <span class="p-panel__footer--text">{{
                                    product["name"]
                                }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-panel">
                    <div class="p-panel__form">
                        <h2 class="p-panel__title">購入された商品</h2>
                        <a @click="soldproductlist">もっと見る ></a>
                    </div>
                    <div class="p-panel__list">
                        <div
                            class="p-panel__body"
                            v-for="(product, index) in soldproducts.slice(0, 5)"
                            :key="index"
                            @click="detail(product['id'])"
                        >
                            <div class="p-panel__img">
                                <div
                                    v-show="product['buy_flg'] === 1"
                                    class="p-panel__sold"
                                >
                                    sold
                                </div>
                                <span class="p-panel__img--text"
                                    >¥{{ product["price"] }}</span
                                >
                                <img
                                    class="p-panel__img--image"
                                    :src="product['photofile']"
                                    alt="商品"
                                />
                            </div>
                            <div class="p-panel__footer">
                                <span class="p-panel__footer--text">{{
                                    product["name"]
                                }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-menu__mypageregist">
                <div class="c-menu__item--mypageregist ">
                    <a
                        class="c-menu__link--mypageregist"
                        href="products/registproduct"
                    >
                        出品
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["products"],
    data() {
        return {
            soldproduct: []
        };
    },
    methods: {
        detail(id) {
            this.$router.push({ name: "ProductDetail", params: { id } });
        },
        registproductlist() {
            this.$router.push({ name: "RegistProductList" });
        },
        soldproductlist() {
            this.$router.push({ name: "SoldProductList" });
        }
    },
    computed: {
        soldproducts() {
            for (var i in this.products) {
                if (this.products[i]["buy_flg"] === 1) {
                    this.soldproduct.push(this.products[i]);
                }
            }
            return this.soldproduct;
        }
    }
};
</script>
