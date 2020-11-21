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
                                <div class="c-detail__title">コンビニ名</div>
                                <div class="c-detail__text">
                                    {{ admin["name"] }}
                                </div>
                            </div>
                        </div>
                        <div class="c-form__group ">
                            <div>
                                <div class="c-detail__title">支店名</div>
                                <div class="c-detail__text">
                                    {{ admin["branch"] }}
                                </div>
                            </div>
                        </div>
                        <div class="c-form__group ">
                            <div>
                                <div class="c-detail__title">住所</div>
                                <div class="c-detail__text">
                                    {{ admin["address"] }}
                                </div>
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
                        <div class="c-form__group ">
                            <button class="c-btn__form c-btn__form--sold">
                                コンビニは購入できません
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
    props: ["id", "products", "admins"],
    data() {
        return {
            product: [],
            admin: [],
            productid: "",
            url: ""
        };
    },

    mounted() {
        for (let i = this.products.length - 1; i >= 0; --i) {
            if (this.products[i]["id"] === this.id) {
                this.product = this.products[i]; //商品情報取得
                for (let i = this.admins.length - 1; i >= 0; --i) {
                    if (this.admins[i]["id"] === this.product["admin_id"]) {
                        this.admin = this.admins[i]; //admin情報取得
                    }
                }
            }
        }
        //twitterのurl
        this.url =
            "https://twitter.com/intent/tweet?url=" +
            location.origin +
            location.pathname +
            "/%23" +
            this.$route.path +
            "&text=" +
            this.product["name"] +
            "：" +
            this.product["price"] +
            "円";
    },
};
</script>

<style></style>
