$(document).ready(function(){

    // sidebar

    $('#sidebarCollapse').on('click' , function(){
        $('#sidebar').toggleClass('active');
        if($('body').css("overflow-y") !== "hidden") {
            $('body').css("overflow-y", "hidden");
        }else{
            $('body').css("overflow-y", "");
        }
    });

    // carousel

    $("#lightgallery").lightGallery({
        thumbnail:true
    });

    $("#lightSlider").lightSlider({
        item: 1,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,

        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////

        speed: 400, //ms'
        auto: false,
        loop: false,
        slideEndAnimation: true,
        pause: 2000,

        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',

        rtl:false,
        adaptiveHeight:false,

        vertical:false,
        verticalHeight:500,

        thumbItem:10,
        pager: true,
        gallery: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',

        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,

        responsive : [],

        onBeforeStart: function (el) {},
        onSliderLoad: function (el) {},
        onBeforeSlide: function (el) {},
        onAfterSlide: function (el) {},
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
    });


    $("#region_select").on('change',function(e){
        var region_id = e.target.value;
        var url = '/api/get-townships';
        $.ajax({
            url:url,
            type:"POST",
            data: {
                region_id: region_id
            },
            success:function (data) {
                $('#township_select').empty();
                $.each(data.townships,function(index,township){
                    $('#township_select').append('<option value="'+township.id+'">'+township.township_name+'</option>');
                });
            }
        });
    });

});
