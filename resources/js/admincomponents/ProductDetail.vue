<template>
    <div class="container">
        <div>
            <h1 class="u-title__center">商品詳細</h1>
            <div class="c-form">
                <div class="c-card">
                    <div class="c-card__header">{{ product["name"] }}</div>

                    <div class="c-card__body">
                        <div class="c-form__group ">
                            <div class="">
                                <img
                                    class="c-form__group--img"
                                    :src="product['photofile']"
                                    alt=""
                                />
                            </div>
                        </div>
                        <div class="c-form__group ">
                            <div>
                                <div class="c-detail__title">商品詳細</div>
                                <div class="c-detail__text">
                                    {{ product["comment"] }}
                                </div>
                            </div>
                        </div>
                        <div class="c-form__group ">
                            <div>
                                <div class="c-detail__title">消費期限</div>
                                <div class="c-detail__text">
                                    {{ product["expiration_date"] }}
                                </div>
                            </div>
                        </div>
                        <div class="c-form__group ">
                            <div>
                                <div class="c-detail__title">値段</div>
                                <div class="c-detail__text">
                                    ¥{{ product["price"] }}
                                </div>
                            </div>
                        </div>
                        <div
                            v-if="product['buy_flg'] === 0"
                            class="c-form__group "
                        >
                            <a :href="url" type="submit" class="c-btn__form">
                                編集
                            </a>

                            <button
                                @click="destroy"
                                type="submit"
                                class="c-btn__form"
                            >
                                削除
                            </button>
                        </div>
                        <div
                            v-if="product['buy_flg'] === 1"
                            class="c-form__group "
                        >
                            <button
                                v-if="product['buy_flg'] === 1"
                                class="c-btn__form c-btn__form--sold"
                            >
                                購入されました
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["id", "products"],
    data() {
        return {
            product: [],
            url: ""
        };
    },
    mounted() {
        //idと同じ商品情報取得
        for (let i = this.products.length - 1; i >= 0; --i) {
            if (this.products[i]["id"] === this.id) {
                this.product = this.products[i];
            }
        }
        this.url = "/admin/products/editproduct/" + this.id;
    },
    methods: {
        edit(product) {
            this.$router.push({ name: "ProductEdit", params: this.id });
        },
        //削除
        destroy() {
            if (confirm("削除しますか？")) {
                axios
                    .post("/admin/home/delete", { productid: this.id })
                    .then(response => {
                        this.$router.push({
                            name: "Msg",
                            params: { message: response.data.success }
                        });
                    })
                    .catch(function(error) {
                        this.$router.push({
                            name: "Msg",
                            params: {
                                message: "エラーが発生して削除できませんでした。",
                            }
                        });
                    });
            }
        }
    }
};
</script>

<style></style>
