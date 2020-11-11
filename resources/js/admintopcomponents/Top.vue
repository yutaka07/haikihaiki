<template>
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="title__center">商品一覧</h1>
      <div class="p-panel__background">
        <div class="p-panel__nav">
          <button @click="search" class="p-panel__nav--link">検索</button>
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
                <div v-show="product['buy_flg'] === 1" class="p-panel__sold">SOLD</div>
                <span>¥{{ product["price"] }}</span>

                <img :src="product['photofile']" alt="" />
              </div>
              <div class="p-panel__footer">
                <span>{{ product["name"] }}</span>
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
    search(){
      this.$router.push({ name: "TopSearch" });
    },
    detail(id) {
      this.$router.push({ name: "ProductDetail", params: { id } });
    },
  },
};
</script>
