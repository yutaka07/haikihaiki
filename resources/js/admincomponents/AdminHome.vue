<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="title__center">マイページ</h1>
            <div class="p-panel__background">
                <div class="p-panel__nav">
          <a class="p-panel__nav--link" href="top">商品一覧</a>
          <a class="p-panel__nav--link" href="edit">プロフィール編集</a>
          </div>
            <div class="p-panel">
                <div class="p-panel__form">
                <h2 class="p-panel__title">出品した商品</h2>
                <a @click="registproductlist">もっと見る ></a>
                </div>
                <div class="p-panel__list">
                    <div class="p-panel__body"
                     v-for="(product, index) in products.slice(0,5)" :key="index"
                     v-show="product['buy_flg'] === 0"
                     @click="detail(product['id'])">
                        <div class="p-panel__img">
                            <span>¥{{product['price']}}</span>
                            <img :src="product['photofile']" alt="商品">
                        </div>
                        <div class="p-panel__footer">
                            <span>{{ product['name'] }}</span>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
           
            <div class="p-panel">
                <div class="p-panel__form">
                <h2 class="p-panel__title">購入された商品</h2>
                <a @click="soldproductlist">もっと見る ></a>
                </div>
                <div class="p-panel__list">
                    <div class="p-panel__body"
                    v-for="(product, index) in products.slice(0,5)" :key="index"
                     v-show="product['buy_flg'] === 1"
                     @click="detail(product['id'])">
                        <div class="p-panel__img">
                             <span>¥{{product['price']}}</span>
                            <img :src="product['photofile']" alt="商品">
                        </div>
                        <div class="p-panel__footer">
                            <span>{{ product['name'] }}</span>
                        </div>
                    </div>
                    
                </div>
                </div>
            </div>
            <div class="c-menu__mypageregist">
             <div class="nav-item nav-item__regist ">
                    <a class="nav-link nav-link__regist" href="products/registproduct" >
                        出品 
                    </a>
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
            registproductlist(){
                 this.$router.push({ name: "RegistProductList" });
            },
            soldproductlist(){
                 this.$router.push({ name: "SoldProductList" });
            },
        },

    }
</script>
