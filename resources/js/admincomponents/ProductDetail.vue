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
                <div class="c-detail__title">商品詳細</div>
                <div class="c-detail__text">{{ product["comment"] }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div>
                <div class="c-detail__title">賞味期限</div>
                <div class="c-detail__text">{{ product["expiration_date"] }}</div>
              </div>
            </div>
            <div class="form-group row">
              <div>
                <div class="c-detail__title">値段</div>
                <div class="c-detail__text">¥{{ product["price"] }}</div>
              </div>
            </div>
                    <div v-show="product['buy_flg'] === 0" class="form-group row mb-0">

                                <a :href="url" type="submit" class="c-btn__form">
                                    編集
                                </a>

                                <button
                                @click="destroy" 
                                type="submit" class="c-btn__form"
                                >
                                    削除
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
  props: [ "id", "products" ],
  data(){
    return{
      product: [],
      url: ''
    };
  },
  mounted(){
    //idと同じ商品情報取得
     for (let i = this.products.length - 1; i >= 0; --i) {
      if (this.products[i]["id"] === this.id) {
        this.product = this.products[i];
       
  }
     }
     this.url = '/admin/products/editproduct/' + this.id;
    
     },
methods: {
            edit(product){
                 this.$router.push({ name: "ProductEdit", params: this.id});
            },
            //削除
            destroy(){
              if(confirm('削除しますか？')){
                axios
          .post("/admin/home/delete", { productid: this.id })
          .then(function (response) {
            console.log(response);
            window.location.href = '/admin/home';
          })
          .catch(function (error) {
            console.log(error);
          });
              }
            }
        }
}
</script>

<style>

</style>