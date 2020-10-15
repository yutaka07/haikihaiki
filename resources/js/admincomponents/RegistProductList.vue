<template>
   <div class="container">
        <div class="row justify-content-center">
            <h1 class="title__center">出品した商品</h1>
            <div class="p-panel__background">
            <div class="p-panel">
                <div class="p-panel__list">
                    
                    <div class="p-panel__body"
                     v-for="(product, index) in products" :key="index"
                     v-show="product['buy_flg'] === 0"
                     @click="detail(product['id'])">
                        <div class="p-panel__img">
                            <span>{{product['price']}}円</span>
                            <img :src="product['photofile']" alt="商品">
                        </div>
                        <div class="p-panel__footer">
                            <span>{{ product['name'] }}</span>
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
      props:["products"],
        methods: {
             detail(id){
                 this.$router.push({ name: "ProductDetail", params: { id }  });
            },
        }
}
</script>
