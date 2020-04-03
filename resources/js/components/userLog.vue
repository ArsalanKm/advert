<template>
    <div>
        <ul class="mychats" style="margin: 10px">
            <li v-for="adverts in advert" v-if="adverts.user_id==sender_id" :click="chat(1,2,adverts.user_id)">
                <input type="hidden" id="user_id" :value="adverts.user_id">
                <span style="float: right" v-if="adverts.image==null">

                                            <img src="/img/index.png" style="width: 50px;height: 50px;margin:8px">

                                        </span>
                <span style="float: right;width: 50px;height: 50px;margin: 8px" v-else>
                                            <img :src="'/images/'+adverts.image"
                                                 style="width: 50px;height: 50px;margin: 8px">
                                        </span>

                <p class="chat_title"
                   style="margin: 0;text-align: right;width: 80%;font-weight: bold;font-size: 13pt">
                    {{ adverts.subject }}
                </p>
                <p class="chat_text" style="margin: 0;text-align: right;width: 80%;font-size: 11pt">
                    {{adverts.chat_text}}

                </p>
            </li>

        </ul>
    </div>
</template>

<script>
    export default {
        props: ['sender_id', 'advert'],
        data() {
            return {
                message: "",
            }
        },
        methods: {
            chat(id, sender_id,user_id) {
                // $(".advert_id").val(id);
                // $(".sender_id").val(sender_id);
                // var user_id = $("#user_id").val();
                alert(user_id);
                axios.get('/private-messages/' + user_id).then(response => {
                    this.message = response.data;
                    console.log(this.message);
                });


            }
        }
    }
</script>

<style scoped>

</style>
