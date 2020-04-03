<template>
    <div>
        <div class="chat_navbar col-lg-12">
            <div class="right">
                    <span>
                    <i class="icon icon-cog" style="color: #ca0600;cursor: pointer" data-toggle="modal"
                       data-target="#myModal"></i>
                   <h5>چت دیوار </h5>
                    </span>
            </div>
            <div class="left">
                <div class="icons">

                    <i class="icon icon-phone" style="margin-left: 5px;color: #ca0600;cursor:pointer;"></i>
                    <i class="icon icon-ellipsis-vertical"
                       style="margin-left: 15px;color: #ca0600;cursor: pointer"></i>
                </div>
                <div class="chat_header">
                    <h5>گوشی سامسونگ </h5>
                    <span class="chat_name">alireza</span>

                </div>

            </div>
        </div>

        <div class="col-lg-4" style="float: right;padding-right: 0">
            <div class="chat_users">
                <ul class="mychats" style="margin: 10px">
                    <li v-for="adverts in advert" v-if="adverts.user_id==sender_id" @click="chat(1,2,adverts.user_id)">
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
        </div>
        <div class="col-lg-8">
            <div class="chatText">
                <div class="chat_body" >
                <div class="conversationWarning">
                    <ul class="conversationRule">
                        <li>
                            <i class="icon icon-linux"></i>
                            <span>لطفا از ارسال اطلاعات محرمانه مانند رمز عبور و کد تایید خود داری نمایید.</span>
                        </li>
                        <li>
                            <i class="icon icon-linux"></i>
                            <span>
                                            در صورت مشاهده هرگونه تخلف می توانید کاربر متخلف را مسدود کنید.
                                        </span>
                        </li>
                    </ul>
                </div>


                <div id="chatArea" class="content scrollbar" style="background: white">
                    <ul class="messages" style="padding: 0px">

                        <chat-log :message="message">
                        </chat-log>


                    </ul>
                </div>
                <chat-composer>


                </chat-composer>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['sender_id', 'advert'],
        data() {
            return {
                message: [],
            }
        },
        methods: {
            chat(id, sender_id, user_id) {
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
