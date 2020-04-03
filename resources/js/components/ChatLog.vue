<template>
    <ul class="media-list message">
        <li v-for="msg in message">
            {{msg.chat_text}}
        </li>
    </ul>
</template>

<script>

    export default {
        props:['message'],
        name: "ChatLog",

    }
</script>

<style scoped>

</style>
