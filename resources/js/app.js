/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import swal from 'sweetalert';
// import InfiniteLoading from "vue-infinite-loading";
Vue.use(require('vue-infinite-loading'));

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
        code: "",
        price: "",
        cost: "",
        cost1: "",
        cost2: "",
        cost3: "",
        OrderAdvertId: "",
        advert: [],
        page: 1,
        Scategory: [],
        Myid: "",
        maincategoires: [],
        SecondScategory: [],
        SelectedAdvert: [],
        mobilenumber: "",


    },


    mounted: function () {
        this.getcategory();
        this.getadvert();
        this.getmaincategory();
        $(".send-advert3").hide();

    },


    methods: {


        /************login**/
        addmobile: function () {
            axios.post('/addmobile', {
                mobile: this.mobilenumber
            })
                .then((response) => {

alert("ok");
                });

        },
        makeFavorite: function () {

            $('#Top_filters').hide();
            $('#sidebar').hide();
            $('#show').hide();

            $('#mydivar').show();
        },

        back3: function () {
            $('#show').hide();

            $('#Top_filters').fadeIn(1000);
            $('#sidebar').fadeIn(1000);


        },
        /* showinf the specific app**/
        ShowAdvert: function (id) {
            $('#Top_filters').hide();
            $('#sidebar').hide();
            axios.post('/show', {
                Myid: id
            })
                .then((response) => {

                    this.SelectedAdvert = response.data;
                    $("#show").show();
                });

        },


        /* show categories in show advert*/
        showCat: function (id) {
            axios.post('/show_cat', {
                Myid: id
            })
                .then((response) => {
                    $('.mainCats').css("display", "none");
                    $('.SubCats').css("display", "block");
                    $('.dropdown-menu').css("display", "block");

                    this.Scategory = response.data;
                    $.each(this.Scategory, function (key, value) {
                        $('#title').text(value.name)
                    });


                });

        },

        back: function () {
            $('.SubCats').css("display", "none");
            $('.mainCats').css("display", "block");


        },

        /****show second subcategories in show advert****/
        send_category: function (id) {
            axios.post('/show_cat', {
                Myid: id
            })
                .then((response) => {
                    this.SecondScategory = response.data;
                    $.each(this.SecondScategory, function (key, value) {
                        $('#title').text(value.name)
                    });

                    $('.SubCats').css("display", "none");
                    $('.SecondSubCats').css("display", "block");
                    $('.dropdown-menu').css("display", "block");


                });
        },
        back2: function () {
            $('.SecondSubCats').css("display", "none");
            $('.SubCats').css("display", "block");


        },

        /**show categories**/

        /**show advert function**/
        getadvert: function () {
            axios.get('/showadvert').then(response => {
                this.advert = response.data.data;

                console.log(response.data.data);
            });
        },
        /**************show advert function**************/
        infiniteHandler: function ($state) {

            let limit = this.advert.length / 6 + 2;
            axios.get('/showadvert', {params: {page: limit}}).then(response => {
                this.loadMore($state, response);
            });
        },
        loadMore: function ($state, response) {
            if (response.data.data.length) {
                this.advert = this.advert.concat(response.data.data);
                setTimeout(() => {
                    $state.loaded();
                }, 3000);
                if (response.data.total == this.advert.length) {
                    $state.complete();
                }
            } else {
                $state.complete();

            }


        },

        /********verify code*/

        // hide_menu: function () {
        //     $(".home_page").fadeOut(1000);
        //
        // },
        /**** add order *****/
        addorder: function () {
            var price = $("#price2").val();
            var cost = $("#cost").val();
            var cost1 = $("#cost1").val();
            var cost2 = $("#cost2").val();
            var cost3 = $("#cost3").val();
            var advert_id = $("#advert_id").val();


            axios.post('/addorder', {
                price: price,
                cost: cost,
                cost1: cost1,
                cost2: cost2,
                cost3: cost3,
                advert_id: advert_id,

            }).then((response) => {
                console.log(response);


            });
        },


        verifyCode: function () {
            axios.post('/verifyCode', {
                code: this.code,
            }).then((response) => {
                console.log(response);
                if (response.data == "\r\nno") {
                    swal("کد وارد شده نادرست است")
                    ک
                } else {


                    $(".warning .progress").attr("id", "verifyCode");
                    $(".manage-text").hide();
                    $("#line").hide();

                }
            });
        },


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

        getmaincategory: function () {
            axios.get('/admin/mainCategories')
                .then(response => {
                    this.maincategoires = response.data;
                })
                .catch(error => {
                    console.log(error);
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
        /***status***/
        set_status: function (id) {
            axios.post('/admin/status', {
                id: id,

            })
                .then((response) => {
                    location.href = "/admin/advert";

                })
                .catch((error) => {
                });

        }


    }
});

