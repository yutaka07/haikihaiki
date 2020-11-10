<template>
 <div class="container">
    <div class="row justify-content-center">
      <h1 class="title__center" v-if="message != undefined">{{message}}</h1>
      <div class="p-panel__background">
        <div class="p-panel__nav">
          <a class="p-panel__nav--link" href="top">商品一覧</a>
          <a class="p-panel__nav--link" href="home/edit">プロフィール編集</a>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
 props: ['message'],
    data() {
      return {
    
      }
    }
}
</script>

<style>

</style>