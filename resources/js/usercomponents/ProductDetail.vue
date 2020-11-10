<template>
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="title__center">商品詳細</h1>
      <div class="form">
        <div class="card">
          <div class="card-header">{{ product["name"] }}</div>

          <div class="card-body">
            <div class="form-group row">
              <div class="">
                <img :src="product['photofile']" alt="" />
              </div>
            </div>

            <div class="form-group row">
              <div>
                <div class="c-detail__title">コンビニ名</div>
                <div class="c-detail__text">{{ admin["name"] }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div>
                <div class="c-detail__title">支店名</div>
                <div class="c-detail__text">{{ admin["branch"] }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div>
                <div class="c-detail__title">住所</div>
                <div class="c-detail__text">{{ admin["address"] }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div>
                <div class="c-detail__title">商品詳細</div>
                <div class="c-detail__text">{{ product["comment"] }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div>
                <div class="c-detail__title">消費期限</div>
                <div class="c-detail__text">
                  {{ product["expiration_date"] }}
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div>
                <div class="c-detail__title">値段</div>
                <div class="c-detail__text">¥{{ product["price"] }}</div>
              </div>
            </div>
            <div v-if="product['buy_flg'] === 1" class="form-group row mb-0">
              <button
                type="submit"
                class="c-btn__form"
                @click="buyproductcancel"
              >
                購入キャンセル
              </button>
            </div>
            <div v-else class="form-group row mb-0">
              <button
                class="c-btn__form c-btn__form--sold"
              >
                商品がありません
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
    };
  },
  mounted() {
    for (let i = this.products.length - 1; i >= 0; --i) {
      if (this.products[i]["id"] === this.id) {
        this.product = this.products[i];
        for (let i = this.admins.length - 1; i >= 0; --i) {
          if (this.admins[i]["id"] === this.product["admin_id"]) {
            this.admin = this.admins[i];
          }
        }
      }
    }
  },
  methods: {
    buyproductcancel() {
      if (confirm("購入キャンセルしますか？")) {
        axios
          .post("/user/home", { productid: this.id })
          .then( () => {
           this.$router.push({ name: "Msg", params: {message: response.data.success} });
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },
  },
};
</script>

<style>
</style>