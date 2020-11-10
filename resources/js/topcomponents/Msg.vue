<template>
<div>
    <div v-if="message != undefined">{{message}}</div>
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