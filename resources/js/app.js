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
Vue.component('chat-component', require('./components/chatComponent.vue').default);
Vue.component('chat-message', require('./components/chatMessageComponent.vue').default);
Vue.component('chat-composer', require('./components/ChatComposer.vue').default);
Vue.component('chat-log', require('./components/ChatLog.vue').default);

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
        codenumber: "",
        UserMobile: "",
        cat: [],
        urgent_filter: '',
        image_filter: '',
        room_number: [],
        advertisor: [],
        typeadvert: [],
        totalPrice: [],
        year1: [],
        year2: [],
        area1: [],
        area2: [],
        searchInAdverts: '',
        carSunation2: [],
        carSunation1: [],
        carTypeadvert: [],
        carYear2: [],
        carYear1: [],
        carBrand: [],
        carPrice1: [],
        carPrice2: [],
        chatmobilenumber: "",

    },


    mounted: function () {
        this.getcategory();
        this.getadvert();
        this.getmaincategory();
        $(".send-advert3").hide();

    },


    methods: {
        verifyCode3: function () {
            var mobile = this.chatmobilenumber;
            alert('mobile' + mobile);
            alert(this.codenumber);

            axios.post('/verifyShowCode', {
                code: this.codenumber,
                mobile: mobile,

            })
                .then((response) => {
                    console.log('new response : ' + response);
                    if (response.data == "\nyes") {
                        $("#send_mobile").hide();
                        $("#code_mobile").hide();
                        $("#myModal").hide();
                    } else if (response.data == "\nno") {
                        alert("code is not verify");

                    }


                });

        },
        sideBarShowCat: function (id) {
            axios.post('/show_cat', {
                Myid: id
            })
                .then((response) => {
                    $('#sidebarMainCats').css("display", "none");
                    $('#sidebarSubCats').css("display", "block");
                    // $('.dropdown-menu').css("display", "block");

                    this.Scategory = response.data;
                    $.each(this.Scategory, function (key, value) {
                        $('#title').text(value.name)
                    });


                });
        },
        asideAllAdvert: function () {
            $("#StateFilters").hide();
            $("#CarFilters").hide();
            $('#sidebarSubCats').css("display", "none");
            $('#sidebarSecondSubCats').css("display", "none");

            $('#sidebarMainCats').css("display", "block");
        },
        sideBarBack: function () {
            $('#sidebarSubCats').css("display", "none");
            $('#sidebarMainCats').css("display", "block");

        },

        sideBarSend_category: function (id) {
            axios.post('/show_cat', {
                Myid: id
            })
                .then((response) => {
                    this.SecondScategory = response.data;
                    $.each(this.SecondScategory, function (key, value) {
                        $('#title').text(value.name)
                    });

                    $('#sidebarSubCats').css("display", "none");
                    $('#sidebarSecondSubCats').css("display", "block");
                    // $('.dropdown-menu').css("display", "block");


                });
        },
        sideBarBack2: function () {
            $('#sidebarSecondSubCats').css("display", "none");
            $('#sidebarSubCats').css("display", "block");

        },

        uncheck: function () {
            $("#allCheck").prop("checked", false);
            $("#allCheck2").prop("checked", false);
        },
        carTypeFilter: function (data) {
            if (this.carTypeadvert.length == 0 || this.carTypeadvert == 0) return true;
            if (this.carTypeadvert == data.type) {
                return true
            }
        },
        BrandFilter: function (data) {
            if (String(data.brand).includes(this.carBrand)) return true;
            else if (this.carBrand.length == 0) return tr;
        },
        CarFilters: function (data) {
            var checkPrice;
            var checkSunation;
            var checkYear;
            if (this.carYear1.length == 0 || this.carYear2.length == 0) checkYear = false; else checkYear = true;
            if (this.carPrice1.length == 0 || this.carPrice2.length == 0) checkPrice = false; else checkPrice = true;
            if (this.carSunation1.length == 0 || this.carSunation2.length == 0) checkSunation = false; else checkSunation = true;


            if (!checkSunation && !checkPrice && !checkYear) return true;
            else if (checkPrice && checkSunation && !checkYear) {
                if (parseInt(data.fee) <= parseInt(this.carPrice2) && parseInt(data.fee) >= parseInt(this.carPrice1) && parseInt(data.sunation) <= parseInt(this.carSunation2)) {
                    return true;
                }
            } else if (checkPrice && !checkSunation && !checkYear) {

                if (parseInt(data.fee) <= parseInt(this.carPrice2) && parseInt(data.fee) >= parseInt(this.carPrice1)) return true;
            } else if (!checkPrice && checkSunation && !checkYear) {
                if (parseInt(data.sunation) <= parseInt(this.carSunation2) && parseInt(data.sunation) >= parseInt(this.carSunation1)) return true;
            } else if (!checkPrice && !checkSunation && checkYear) {

                if (parseInt(data.year) <= parseInt(this.carYear2) && parseInt(data.year) >= parseInt(this.carYear1)) return true;
            } else if (!checkPrice && checkSunation && checkYear) {
                if (parseInt(data.sunation) <= parseInt(this.carSunation2) && parseInt(data.sunation) >= parseInt(this.carSunation1)
                    && parseInt(data.year) <= parseInt(this.carYear2) && parseInt(data.year) >= parseInt(this.carYear1))
                    return true;
            } else if (checkPrice && !checkSunation && checkYear) {
                if (parseInt(data.fee) <= parseInt(this.carPrice2) && parseInt(data.fee) >= parseInt(this.carPrice1)
                    && parseInt(data.year) <= parseInt(this.carYear2) && parseInt(data.year) >= parseInt(this.carYear1)) return true;

            } else if (checkPrice && checkSunation && checkYear) {

                if (parseInt(data.year) <= parseInt(this.carYear2) && parseInt(data.year) >= parseInt(this.carYear1) &&
                    parseInt(data.fee) <= parseInt(this.carPrice2) && parseInt(data.fee) >= parseInt(this.carPrice1) &&
                    parseInt(data.sunation) <= parseInt(this.carSunation2) && parseInt(data.sunation) >= parseInt(this.carSunation1)
                ) {
                    return true;
                }

            }
        },
        FilterState: function (data) {

            if (data == 'allAdverts') {
                $("#StateFilters").hide();
                $("#CarFilters").hide();

            } else if (data.parent_id == 27 || data.id == 27) {
                $("#StateFilters").show();
                $("#CarFilters").hide();
            } else if (data.id == 28 || data.parent_id == 28) {
                $("#StateFilters").hide();
                $("#CarFilters").show();
            }


        },

        SearchInAllAds: function (data) {

            if (String(data.subject).includes(this.searchInAdverts)) {
                return data;
            } else if (this.searchInAdverts == '') {
                return true;

            }
        },

        // infiniteHandler2:function($state){
        //     let vm=this;
        //     axios.get('/showadvert?page='+this.page)
        //         .then(response=>{
        //             return response;
        //         }).then(data=>{
        //             $.each(data.data.data,function (key,value) {
        //             vm.advert.push(value);
        //             });
        //             $state.loaded();
        //             this.page=this.page+1;
        //     })
        // },

        /**************filter**************/
        checkUrgentFilter: function (data) {
            if (this.urgent_filter == true && data.cost1 == 'urgent') {
                return true;
            } else if (this.urgent_filter == '')
                return true;
        },
        checkImageFilter: function (data) {
            console.log(data.image);
            if (this.image_filter == true && data.image != null)
                return true;
            else if (this.image_filter == '') {
                return true;
            }
        },
        SearchFilter: function (data) {
            var typeCheck;
            var advertiserCheck;
            var roomCheck;
            //we check that if they are empty value is true
            if (this.typeadvert.length == 0) typeCheck = true; else typeCheck = false;
            if (this.advertisor.length == 0) advertiserCheck = true; else advertiserCheck = false;
            if (this.room_number.length == 0) roomCheck = true; else roomCheck = false;

            if (!typeCheck && !advertiserCheck && !roomCheck) {
                console.log("here");
                if (this.advertisor == 0 && this.typeadvert == 0 && this.room_number == data.room_number) return true;
                else if (this.advertisor == 0 && this.typeadvert == data.type && this.room_number == data.room_number) return true;
                else if (this.typeadvert == 0 && this.advertisor == data.advertiser && this.room_number == data.room_number) return true;
                else if (this.advertisor == data.advertiser && this.room_number == data.room_number && this.typeadvert == data.type) {
                    return true;
                }
            } else if (typeCheck && advertiserCheck && roomCheck)
                return true;
            else if (!typeCheck && advertiserCheck && roomCheck) {
                if (this.typeadvert == 0) return true;
                else if (this.typeadvert == data.type) return true;

            } else if (typeCheck && !advertiserCheck && roomCheck) {
                if (this.advertisor == 0) return true;
                else if (this.advertisor == data.advertiser) return true;
            } else if (typeCheck && advertiserCheck && !roomCheck) {
                if (this.room_number == data.room_number) return true
            } else if (!typeCheck && !advertiserCheck && roomCheck) {
                if (this.typeadvert == 0 && this.advertisor == 0) return true;
                else if (this.typeadvert == 0 && this.advertisor == data.advertiser) return true;
                else if (this.advertisor == 0 && this.typeadvert == data.type) return true;
                else if (this.typeadvert == data.type && this.advertisor == data.advertiser) return true;
            } else if (!typeCheck && advertiserCheck && !roomCheck) {

                if (this.typeadvert == 0 && this.room_number == data.room_number) return true;
                else if (this.typeadvert == data.type && this.room_number == data.room_number)
                    return true;
            } else if (typeCheck && !advertiserCheck && !roomCheck) {
                if (this.advertisor == 0 && this.room_number == data.room_number) return true;
                else if (this.advertisor == data.advertiser && this.room_number == data.room_number) {
                    return true;
                }

            }


            /*****************************/
            // if (this.typeadvert == 0 && this.advertisor == 0) return true;
            //
            //
            // if (this.typeadvert.length == 0 && this.advertisor.length == 0) {
            //     return true;
            // } else if (this.typeadvert == 0 && this.advertisor == data.advertiser) {
            //     return true;
            // } else if (this.advertisor == 0 && this.typeadvert == data.type) {
            //     return true
            // } else if (this.typeadvert == data.type && this.advertisor != data.advertiser) {
            //     return false;
            // } else if (this.advertisor == data.advertiser && this.typeadvert != data.type) {
            //     return false
            // } else if (this.typeadvert == data.type) {
            //     console.log('data.type= ' + data.type);
            //     return this.typeadvert;
            // } else if (this.advertisor == data.advertiser) {
            //     console.log('data.advertiser = ' + data.advertiser);
            //     return this.advertisor;
            // } else if (data.area <= this.area2 && data.area >= this.area1) {
            //     console.log('data.area2 =  ' + this.area2);
            //     return this.area2;
            // }

            // if (this.typeadvert.length == 0) return true;
            // if (this.typeadvert.length == 0) return true;
            // if (this.area2.length == 0) return true;

            // $("#search").click(function () {
            console.log(data.type);


            // })
        },

        search: function () {

            console.log(this.typeadvert);
            console.log(this.advertisor);


        },
        filter: function (data) {
            if (this.cat.length == 0) return true;
            console.log(data.parent_id);
            return this.cat.includes(data.parent_id);

        },

        /****************filter****************/
        verifyCode2: function () {
            var mobile = this.UserMobile;
            alert('mobile' + mobile);
            alert('code' + this.codenumber);

            axios.post('/verifyShowCode', {
                code: this.codenumber,
                mobile: mobile,

            })
                .then((response) => {
                    console.log(response);
                    if (response.data == "\nyes") {
                        // $("#send_mobile").hide();
                        $("#code_mobile").hide();
                        location.reload();
                        $("#myModal").hide();
                    } else if (response.data == "\nno") {
                        alert("code is not verify");

                    }


                });

        },


        /************login**/
        addmobile: function () {
            axios.post('/addmobile', {
                mobile: this.mobilenumber
            })
                .then((response) => {

                    $("#send_mobile").hide();
                    $("#code_mobile").show();
                    this.UserMobile = this.mobilenumber;

                    alert("ok");
                });

        },

        makeFavorite: function (id) {
            var Myid = id.Id;
            axios.post('/addfavorite', {
                id: Myid
            })
                .then((response) => {
                    console.log(response.data);
                    $('#Top_filters').hide();
                    $('#sidebar').hide();
                    $('#show').hide();

                    $('#mydivar').show();
                });

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

        },
        users:function () {
                axios.get('/showuser').then(response =>{
                    this.advert=response.data;
                })
        }


    }
});

