/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
import swal from 'sweetalert';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // har sheyi ke dakhele date:{} gharar begirad msihvad model
    //vazifeye model ineke ettelaato besorate ani be view ersal bokone

    data: {
        name: "",
        parent_id: "",
        p_id: "",
        categories: [],
        submenus: [],
        advertcat: {},
        id: "",
        catmenus: "",
        menu: [],
        category: "",
        city: "",
        countryside: "",
        area: "",
        TypeAdvert: "",
        TypeAdvert1: "",
        textFee: "",
        textFee1: "",
        numberRoom: "",
        mobile: "",
        chat: "",
        email: "",
        checkemail: "",
        titleAdvert: "",
        text: "",
        Advertiser: "",
        advert_id: "",
        images: [],



    },
    mounted: function () {
        this.getcategory();
        $(".send-advert3").hide();

    },


    methods: {

        AddState: function () {
            var category = $("#category").val();
            axios.post('/addstate', {
                city: this.city,
                area: this.area,
                numberRoom: this.numberRoom,
                textFee: this.textFee,
                textFee1: this.textFee1,
                Advertiser: this.Advertiser,
                advert_id: category,
                mobile: this.mobile,
                chat: this.chat,
                email: this.email,
                checkemail: this.checkemail,
                titleAdvert: this.titleAdvert,
                text: this.text,
                TypeAdvert: this.TypeAdvert,

            }).then(response => {
                console.log(response.data);

            })
        },


        send_advert2: function (id) {
            axios.post('/send_advert2', {
                id: id
            })
                .then((response) => {
                    this.category = response.data;

                    $(".send-advert2").hide();
                    $(".sub_heading").hide();
                    $(".send-advert").hide();
                    $(".send-advert1").hide();
                    $("#card").hide();
                    $(".send-advert3").show();

                });
        },


        /********* SendCategorie**********/
        Sendsubcats: function (id) {
            axios.post('/subcats', {
                id: id
            })
                .then((response) => {
                    console.log(response.data);

                    this.menu = (response.data);
                    $(".send-advert1").hide();
                    $(".send-advert2").toggle();

                });
            axios.post('/catmenus', {
                id: id
            })
                .then((response) => {
                    console.log(response.data);

                    this.catmenus = (response.data);
                    // $(".send-advert1").hide();
                    $(".sub_heading").toggle();

                });
        },

        SendAdvert: function (id) {
            axios.post('/parent', {
                id: id
            })
                .then((response) => {
                    console.log(response.data);

                    this.advertcat = (response.data);
                    $(".send-advert").hide();
                    $(".send-advert1").toggle();
                    console.log(this.advertcat);

                });

            axios.post('/Sendsubmenu', {
                id: id
            })
                .then((response) => {

                    this.submenus = (response.data);
                    $(".send-advert").hide();


                })
                .catch((error) => {
                    alert('not ok');
                });

        },


        addCategory: function () {
            axios.post('/admin/addcategory', {
                name: this.name,
                parent_id: this.parent_id,
            })
                .then((response) => {


                    // swal("category added successfully");
                    // setInterval(2000);
                    location.href = "/admin/category";

                })
                .catch((error) => {
                    alert('not ok');
                });

        },
        getcategory: function () {
            axios.get('/admin/getcategories')
                .then(response => {
                    this.categories = response.data;
                    console.log(this.categories);
                })
                .catch(error => {
                    console.log(error);
                });


        },
        deleteCategory: function () {
            axios.post('/admin/deletecategory', {
                id: this.p_id,

            })
                .then((response) => {
                    swal("category deleted successfully");

                    location.href = "/admin/category";
                })
                .catch((error) => {
                    swal('not ok');
                });

        },


    }
});

