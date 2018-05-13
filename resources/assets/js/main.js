
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

/*--------------------------------------------------------------------
 * jQuery UI
 * http://jqueryui.com
 * Includes: core.js, widget.js, mouse.js, slider.js
 * Copyright jQuery Foundation and other contributors; Licensed MIT
 *--------------------------------------------------------------------*/
require('jquery-ui/ui/core');
require('jquery-ui/ui/widget');
require('jquery-ui/ui/effect');
require('jquery-ui/ui/widgets/mouse');
require('jquery-ui/ui/widgets/slider');

// /*!
//  * jQuery UI Widget 1.12.1
//  * http://jqueryui.com
//  *
//  * Copyright jQuery Foundation and other contributors
//  * Released under the MIT license.
//  * http://jquery.org/license
//  */
// require('jquery-ui');
//require('./plugins/jquery.easing-1.3.min');
/*--------------------------------------------------------------------
 * FullCalendar v3.9.0
 * Docs & License: https://fullcalendar.io/
 * (c) 2018 Adam Shaw
 *--------------------------------------------------------------------*/
require('fullcalendar');
require('fullcalendar/dist/locale/ja');
require('fullcalendar-scheduler');

/*--------------------------------------------------------------------
 * Select2 4.0.6-rc.1
 * https://select2.github.io
 *
 * Released under the MIT license
 * https://github.com/select2/select2/blob/master/LICENSE.md
 *--------------------------------------------------------------------*/
require('select2');
/*--------------------------------------------------------------------
 * File: jquery.flexisel.js
 * Version: 1.0.0
 * Description: Responsive carousel jQuery plugin
 * Author: 9bit Studios
 * Copyright 2012, 9bit Studios
 * http://www.9bitstudios.com
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *--------------------------------------------------------------------*/
require('./main/plugins/jquery.flexisel');
/*--------------------------------------------------------------------
 * jQuery FlexSlider v2.7.0
 * Copyright 2012 WooThemes
 * Contributing Author: Tyler Smith
 *--------------------------------------------------------------------*/
require('flexslider');


require('overhang/lib/overhang');



/*--------------------------------------------------------------------
 * ResponsiveSlides.js v1.55
 * http://responsiveslides.com
 * http://viljamis.com
 *
 * Copyright (c) 2011-2012 @viljamis
 * Available under the MIT license
 *--------------------------------------------------------------------*/
require('./main/plugins/responsiveSlides/responsiveslides');

require('dm-file-uploader');

require('@fortawesome/fontawesome');

require('cropper/dist/cropper');

require('./main/plugins/nav');

jQuery(document).ready(function($) {

    /* To top --> Begin */

    (function() {

        var extend = {
            button      : '#back-top',
            text        : 'Back to Top',
            min         : 200,
            fadeIn      : 400,
            fadeOut     : 400,
            speed		: 800,
            easing		: 'easeOutQuint'
        }

        $('body').append('<div id="' + extend.button.substring(1) + '"><a href="#top" title="' + extend.text + '"><span>' + extend.text + '</span></a></div>');

        $(window).scroll(function() {
            var pos = $(window).scrollTop();

            if (pos > extend.min) {
                $(extend.button).fadeIn(extend.fadeIn);
            }
            else {
                $(extend.button).fadeOut (extend.fadeOut);
            }

        });

        $(extend.button).add(extend.backToTop).click(function(e){
            $('html, body').animate({scrollTop : 0}, extend.speed, extend.easing);
            e.preventDefault();
        });

    })();

    /* end Back to Top */


    /* To top --> End */





    /* Full Calendar --> Start */
    //Global Ajax error handling mainly used for session expiration
    // $( document ).ajaxError(function(event, jqXHR, settings, errorThrown) {
    //     $('#frmModalAjaxWait').modal('hide');
    //     if (jqXHR.status == 401) {
    //         bootbox.alert("<?php echo lang('global_ajax_timeout');?>", function() {
    //             //After the login page, we'll be redirected to the current page
    //             location.reload();
    //         });
    //     } else { //Oups
    //         bootbox.alert("<?php echo lang('global_ajax_error');?>");
    //     }
    // });

    //Create a calendar and fill it with AJAX events
    $('#calendar').fullCalendar({
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        themeSystem: 'bootstrap3',
        //timeFormat: ' ', /*Trick to remove the start time of the event*/
        timeFormat: 'H(:mm)t',

        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        titleFormat: 'YYYY-MM',
        selectable: true,
        navLinks: true,
        navLinkDayClick: function(date, jsEvent) {
            console.log('day', date.format()); // date is a moment
            console.log('coords', jsEvent.pageX, jsEvent.pageY);

            $('#calendar').fullCalendar('changeView', 'agendaDay', date.format());

        },
        select: function(startDate, endDate, jsEvent, view){
            console.log('selected ' + startDate.format() + ' to ' + endDate.format() );

            $('#myModal').modal({ keyboard: false });  // initialized with no keyboard
            $('#myModal').modal('show');                // 初始化后立即调用 show 方法
            // $('#calendar').fullCalendar( 'addEventSource',
            //     [ // put the array in the `events` property
            //         {
            //             title  : 'event1',
            //             start  : startDate.format(),
            //             color: 'rgb(248,143,49)',     // an option!
            //             textColor: 'yellow' // an option!
            //         },
            //         {
            //             title  : 'event2',
            //             start  : startDate.format(),
            //             end    : endDate.format(),
            //             color: '#374006',     // an option!
            //             textColor: 'yellow' // an option!
            //         },
            //         {
            //             title  : 'event3',
            //             start  : startDate.format() + 'T12:30:00',
            //             color: '#F78006',     // an option!
            //             textColor: 'yellow', // an option!
            //             allDay: false
            //         }
            //     ]
            // )
        },
        // dayClick: function(date, jsEvent, view) {
        //
        //     alert('Clicked on: ' + date.format());
        //
        //     alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //
        //     alert('Current view: ' + view.name);
        //
        //     // change the day's background color just for fun
        //     $(this).css('background-color', 'red');
        //
        // },
        dayClick: function(date, jsEvent, view, resourceObj) {

            console.log('Date: ' + date.format());
            //console.log('Resource ID: ' + resourceObj.id);

        },
        events:
            [
                {
                    title  : 'event1',
                    start  : '2018-04-01 10:00',
                    end:     '2018-04-02 17:00'
                }
            ],


        // loading: function(isLoading) {
        //     if (isLoading) { //Display/Hide a pop-up showing an animated icon during the Ajax query.
        //         $('#frmModalAjaxWait').modal('show');
        //     } else {
        //         $('#frmModalAjaxWait').modal('hide');
        //     }
        // },
        // eventRender: function(event, element, view) {
        //     if(event.imageurl){
        //         $(element).find('span:first').prepend('<img src="' + event.imageurl + '" />');
        //     }
        // },
        // eventAfterRender: function(event, element, view) {
        //     //Add tooltip to the element
        //     $(element).attr('title', event.title);
        //
        //     if (event.enddatetype == "Morning" || event.startdatetype == "Afternoon") {
        //         var nb_days = event.end.diff(event.start, "days");
        //         var duration = 0.5;
        //         var halfday_length = 0;
        //         var length = 0;
        //         var width = parseInt(jQuery(element).css('width'));
        //         if (nb_days > 0) {
        //             if (event.enddatetype == "Afternoon") {
        //                 duration = nb_days + 0.5;
        //             } else {
        //                 duration = nb_days;
        //             }
        //             nb_days++;
        //             halfday_length = Math.round((width / nb_days) / 2);
        //             if (event.startdatetype == "Afternoon" && event.enddatetype == "Morning") {
        //                 length = width - (halfday_length * 2);
        //             } else {
        //                 length = width - halfday_length;
        //             }
        //         } else {
        //             halfday_length = Math.round(width / 2);   //Average width of a day divided by 2
        //             length = halfday_length;
        //         }
        //     }
        //     $(element).css('width', length + "px");
        //
        //     //Starting afternoon : shift the position of event to the right
        //     if (event.startdatetype == "Afternoon") {
        //         $(element).css('margin-left', halfday_length + "px");
        //     }
        // },
        windowResize: function(view) {
            $('#calendar').fullCalendar( 'rerenderEvents' );
        }
    });
    /* Full Calendar --> End */

    /* Change Language --> Start */
    $('.lang-btn').on('click',function(){
        $('.lang-btn').attr('disabled','disabled');
    });



    // $("select").select2({
    //     templateResult: formatState
    // });

    $("#select-language").select2({
        //language: "zh-CN", //设置 提示语言
        width: "140px", //设置下拉框的宽度
        placeholder: "Please select...",
        tags: true,
        maximumSelectionLength: 5,  //设置最多可以选择多少项
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }
            console.log(state.element.getAttribute("imgPath"));
            var $state = $('<span><img style="width: 30px;height: 30px; vertical-align: middle;" src="' + state.element.getAttribute("imgPath") + '" class="img-flag" /> ' + state.text + '</span>');
            return $state;
        },
        templateSelection: function (state) {
            if (!state.id) return state.text; // optgroup
            var $state = $('<span><img style="width: 30px;height: 30px; vertical-align: middle;" src="' + state.element.getAttribute("imgPath") + '" class="img-flag" /> ' + state.text + '</span>');
            return $state;
        }
    }).on('change',function(){
        console.log('Language will be changed');
        $(this).prop('disabled',true);
        window.location.href = '/lang/' + $(this).val();
    });

    //$('select').select2();
    /* Change Language --> End */

    /* Logout --> End */
    $('#logout').on('click',function(){
        $('#logout-form').submit();
    });
    /* Logout --> End */






    $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });

    $("#flexiselDemo1").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: false,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 3
            }
        }
    });



    $("#flexiselDemo2").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: false,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#slider1").responsiveSlides({
        auto: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
    });

    $('.alert-close').on('click', function(c){
        $('.message').fadeOut('slow', function(c){
            $('.message').remove();
        });
    });

    $('.alert-close1').on('click', function(c){
        $('.message1').fadeOut('slow', function(c){
            $('.message1').remove();
        });
    });


    /* Top Panel --> Begin */

    var $panel = $(".top-panel");
    // console.log('Init...');

    $panel.slideUp('200');
    $('.openbtn > a').removeClass('hidd');

    $('.openbtn').on('click','a',function(e) {

        console.log('Clicked');
        var $target = $(e.target);

        if($target.hasClass('hidd')) {
            $panel.stop(true,false).animate({
                opacity: '1'
            },200);
            $target.blur();
        }

        $panel.slideToggle(600, function(){

            $target.toggleClass('hidd');

            if($(this).css('display') == 'block') {
                $(this).stop(true,false).animate({
                    opacity:'1'
                },200);
            } else {
                $(this).stop(true,false).animate({
                    opacity:'1'
                },200);
            }
        });

        e.preventDefault();
    });

    /* Top Panel --> End */



    // $('.header-bottom').on('mouseenter',function(){
    //     $('.header-bottom-in').slideDown('slow');
    // }).on('mouseleave',function () {
    //     $('.header-bottom-in').slideUp('slow');
    // });

    /*
    var defaults = {
          containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
     };
    */

    //$().UItoTop({ easingType: 'easeOutQuart' });

});/* ######################### DOM READY - END ######################### */

// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
