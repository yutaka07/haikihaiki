<template>
  <div class="container">
    <div class="row justify-content-center">
        <h1 class="u-title__center">商品編集</h1>
        <div class="c-form">
            <div class="c-card">
                <div class="c-card__header">商品</div>

                <div class="c-card__body">
                    <form method="post" action="" enctype="multipart/form-data">
                       

                        <div class="c-form__group row">
                           
                            <div class="col-md-6">
                                <input placeholder="商品名" id="name" type="text" class="c-form__group--control " name="name" v-model="productname" required autocomplete="name" autofocus>

                               
                            </div>
                        </div>

                        <div class="c-form__group row">
                           

                            <div class="col-md-6">
                              <label for="expiration_date">消費期限</label>
                                <input 
                                 id="expiration_date" type="datetime-local" class="c-form__group--control " name="expiration_date" :value="date" required autocomplete="expiration_date" autofocus>

                             
                            </div>
                        </div>
                        <div class="c-form__group row">
                           

                            <div class="col-md-6">
                            <label for="price">価格（円）</label>
                                <input placeholder="価格" id="price" type="number" class="c-form__group--control " name="price" :value="product['price']" required autocomplete="price" autofocus>

                               
                            </div>
                        </div>

                        <div class="c-form__group row">
                           

                            <div class="col-md-6">
                            <label for="comment">商品詳細</label>
                                <textarea cols="30" rows="10"  id="comment" type="comment" class="c-form__group--textarea " name="comment" :value="product['comment']" required autocomplete="comment">
                                </textarea>

                              
                            </div>
                        </div>

                        <div class="c-form__group row">
                            
                            <div class="col-md-6">
                                
                                <input placeholder="ファイル"  id="photofile" type="file" class="c-form__group--control " name="photofile" required autocomplete="new-photofile">

                                
                            </div>
                        </div>

                        

                        <div class="c-form__group row mb-0">
                           
                                <button type="submit" class="c-btn__form">
                                    更新
                                </button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props:["products", "id"],
    data(){
    return{
      product: [],
      date: '',
      productname: '',
    };
  },
    mounted(){
         for (let i = this.products.length - 1; i >= 0; --i) {
      if (this.products[i]["id"] === this.id) {
        this.product = this.products[i];
  }
     }
     this.productname = this.product['name'];
     //消費期限
     const a = this.product['expiration_date'].slice(0,10);
     const b = 'T';
     const c = this.product['expiration_date'].slice(11);
     this.date = (a+b+c);
     
    },
    methods:{
        update(){
            axios
            .post("/admin/home/update", { productid: this.id })
            .then(function (response) {
              console.log(response);
            })
            .catch(function (error) {
              console.log(error);
            });
        }
    }

}
</script>

<style>

</style>