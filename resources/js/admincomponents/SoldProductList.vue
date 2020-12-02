<template>
    <div class="container">
        <div>
            <h1 class="u-title__center">購入された商品</h1>
            <div class="p-panel__background">
                <div class="p-panel">
                    <div class="p-panel__list">
                        <div
                            class="p-panel__body"
                            v-for="(product, index) in soldproducts"
                            :key="index"
                            @click="detail(product['id'])"
                        >
                            <div class="p-panel__img">
                                <div
                                    v-show="product['buy_flg'] === 1"
                                    class="p-panel__sold"
                                >
                                    <span class="p-panel__sold--text">SOLD</span>
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
