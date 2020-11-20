<template>
    <div class="container">
        <div class="p-panel__msg">
            <h1 class="p-panel__msg--title" v-if="message != undefined">
                {{ message }}<br />{{ emailmsg }}
            </h1>
            <h1 class="p-panel__msg--title" v-else>ページを移動して下さい</h1>
            <div>
                <div class="p-panel__nav">
                    <a class="p-panel__nav--link" href="top">商品一覧</a>
                    <a class="p-panel__nav--link" href="home">マイページ</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["message", "emailmsg"],
    data() {
        return {};
    }
};
</script>

<style></style>
