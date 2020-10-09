<template>
    <div class="container">
        <div class="row justify-content-center">
          
            <h1 class="title__center">マイページ</h1>
            <div class="p-panel__background">
            <div class="p-panel">
                <div class="p-panel__form">
                <h2 class="p-panel__title">購入した商品</h2>
                 <a @click="buyproductlist">もっと見る ></a>
                </div>
                <div class="p-panel__list">
                    <div class="p-panel__body"
                     v-for="(product, index) in products.slice(0,5)" :key="index"
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
        props: ['products'],
        mounted() {
            console.log(this.products);
        },
         methods: {
            detail(id){
                 this.$router.push({ name: "ProductDetail", params: {id} });
            },
            buyproductlist(){
                 this.$router.push({ name: "BuyProductList" });
            },
        }
    }
</script>
