<template>
    <div class="container">
        <div>
            <h1 class="u-title__center">商品一覧</h1>
            <div class="p-panel__background">
                <div class="p-panel__nav--top">
                    <button @click="search" class="c-btn__flat--border">
                        検索ページに行く
                    </button>
                </div>
                <div class="p-panel">
                    <div class="p-panel__list">
                        <div
                            v-for="(product, index) in products"
                            :key="index"
                            @click="detail(product['id'])"
                            class="p-panel__body"
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
                                    alt=""
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
    props: ["products", "prefectures", "admins"],
    methods: {
        search() {
            this.$router.push({ name: "TopSearch" });
        },
        detail(id) {
            this.$router.push({ name: "ProductDetail", params: { id } });
        }
    }
};
</script>
