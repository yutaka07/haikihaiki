<template>
  <div class="container">
    <div>
      <h1 class="u-title__center">購入した商品</h1>
      <div class="p-panel__background">
        <div class="p-panel">
          <div class="p-panel__list">
            <div
              class="p-panel__body"
              v-for="(product, index) in products"
              :key="index"
              @click="detail(product['id'])"
            >
              <div class="p-panel__img">
                <span class="p-panel__img--text">¥{{ product["price"] }}</span>
                <img class="p-panel__img--image" :src="product['photofile']" alt="商品" />
              </div>
              <div class="p-panel__footer">
                <span class="p-panel__footer--text">{{ product["name"] }}</span>
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
  methods: {
    detail(id) {
      this.$router.push({ name: "ProductDetail", params: { id } });
    },
  },
};
</script>
