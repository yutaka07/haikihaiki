<template>
    <div class="container">
        <div>
            <h1 class="u-title__center">商品一覧</h1>
            <div class="p-panel__background">
                <div class="p-search">
                    <h2 class="p-search__title">検索</h2>
                    <div class="p-search__flex">
                        <div class="p-search__group">
                            <div><span>都道府県</span></div>
                            <select
                                v-model="searchprefecture"
                                class="p-search__group__form"
                                id="prefectures_id"
                                name="prefectures_id"
                            >
                                <option
                                    :value="prefecture['id']"
                                    v-for="(prefecture, index) in prefectures"
                                    :key="index"
                                >
                                    {{ prefecture["name"] }}
                                </option>
                            </select>
                        </div>
                        <div class="p-search__group">
                            <div><span>支店</span></div>
                            <select
                                v-model="searchbranch"
                                class="p-search__group__form"
                            >
                                <option
                                    :value="bran"
                                    v-for="(bran, index) in productbranch"
                                    :key="index"
                                >
                                    {{ bran }}
                                </option>
                            </select>
                        </div>

                        <div class="p-search__group">
                            <div><span>消費期限</span></div>
                            <input
                                class="p-search__group__form"
                                type="datetime-local"
                                v-model="searchdate"
                            />
                            <div class="p-search__group__sentence">
                                <span>以降</span>
                            </div>
                        </div>

                        <div class="p-search__group">
                            <div><span>値段</span></div>
                            <input
                                class="p-search__group__form"
                                type="number"
                                pattern="\d*"
                                v-model="searchprice"
                            />
                            <div class="p-search__group__sentence">
                                <span>円以下</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-panel">
                    <h2 class="p-panel__searchtitle">検索結果</h2>
                    <div class="p-panel__list">
                        <div
                            v-for="(product, index) in products"
                            :key="index"
                            @click="detail(product['id'])"
                            v-show="
                                product['price'] < searchprice &&
                                    searchdate < product['expiration_date'] &&
                                    product['prefectures_id'] ===
                                        searchprefecture &&
                                    product['branch'] === searchbranch
                            "
                            class="p-panel__body"
                        >
                            <div class="p-panel__img">
                                <div
                                    v-show="product['buy_flg'] === 1"
                                    class="p-panel__sold"
                                >
                                    SOLD
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
    data() {
        return {
            searchprice: "",
            now: "",
            date: "",
            searchdate: "",
            searchprefecture: "",
            searchbranch: "",
            branch: []
        };
    },

    computed: {
        //商品情報取得
        productbranch() {
            this.branch = [];

            for (var i in this.products) {
                if (
                    this.products[i]["prefectures_id"] === this.searchprefecture
                ) {
                    this.branch.push(this.products[i]["branch"]);
                }
            }
            this.branch = [...new Set(this.branch)];
            if (!this.branch.length) {
                this.branch.push("登録支店がありません");
            }
            return this.branch;
        }
    },

    mounted() {
        //検索欄に値を代入
        this.searchprefecture = Number(
            localStorage.getItem("storageprefecture")
        );
        this.searchbranch = localStorage.getItem("storagebranch");
        if (!localStorage.getItem("storagedate")) {
            this.date = new Date();
            this.now =
                this.date.getFullYear() +
                "-" +
                ("0" + (this.date.getMonth() + 1)).slice(-2) +
                "-" +
                ("0" + this.date.getDate()).slice(-2) +
                "T" +
                ("0" + this.date.getHours()).slice(-2) +
                ":" +
                ("0" + this.date.getMinutes()).slice(-2);
            this.searchdate = this.now;
        } else {
            this.searchdate = localStorage.getItem("storagedate");
        }
        if (!localStorage.getItem("storageprice")) {
            this.searchprice = 1000;
        } else {
            this.searchprice = localStorage.getItem("storageprice");
        }
    },
    methods: {
        detail(id) {
            for (var i in this.products) {
                if (this.products[i]["id"] === id) {
                    this.searchbranch = this.products[i]["branch"];
                    this.searchprefecture = this.products[i]["prefectures_id"];
                    //検索欄の値をlocalstorageに保存
                    localStorage.setItem("storagebranch", this.searchbranch);
                    localStorage.setItem(
                        "storageprefecture",
                        this.searchprefecture
                    );
                    localStorage.setItem("storageprice", this.searchprice);
                    localStorage.setItem("storagedate", this.searchdate);
                }
            }
            this.$router.push({ name: "ProductDetail", params: { id } });
        }
    }
};
</script>
