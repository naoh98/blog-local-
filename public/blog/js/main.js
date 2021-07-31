$(document).ready(function () {
    //
    $(".card").hover( function () {
       $(this).css({
           "transform":"scale(1.05,1.05)",
           "border":"1px solid lightskyblue"
       });
    }, function () {
        $(this).css({
            "transform":"scale(1,1)",
            "border":"1px solid rgba(0,0,0,.125)"
        });
    });
    //
    $(".create_news").append("<div class='after_news'></div>");
    $(".after_news").text("Start your new story");
    $(".after_news").css({
        "font-size": "14px",
        "color": "whitesmoke",
        "padding": "6px",
        "position": "absolute",
        "width": "max-content",
        "top": "50%",
        "left": "100%",
        "transform": "translate(0,-50%)",
        "margin-left": "5px",
        "border": "1px solid black",
        "border-radius": "5px",
        "background": "#595959",
        "display": "none",
    });
    $(".create_news").hover( function(){
        $(".after_news").css("display","block");
    }, function () {
        $(".after_news").css("display","none");
    });
    //
    $(".back_to_cover").append("<div class='after_cv'></div>");
    $(".after_cv").text("Back to our cover page");
    $(".after_cv").css({
    "font-size": "14px",
    "color": "whitesmoke",
    "padding": "6px",
    "position": "absolute",
    "width": "max-content",
    "top": "50%",
    "left": "100%",
    "transform": "translate(0,-50%)",
    "margin-left": "5px",
    "border": "1px solid black",
    "border-radius": "5px",
    "background": "#595959",
    "display": "none",
    });
    $(".back_to_cover").hover( function(){
        $(".after_cv").css("display","block");
    }, function () {
        $(".after_cv").css("display","none");
    });
    //
    $(".back_to_top").on("click", function (e) {
        e.preventDefault();
       $("html, body").animate({scrollTop: 0},800);
    });
    //
    $(".menubar li").hover( function () {
       $(this).find(">ul").show(200);
    }, function () {
        $(this).find(">ul").hide(200);
    });
    //
    $(".search").on("click", function (e) {
        e.preventDefault();
        $(".opacity-black").show();
        $(".search-modal").show();
    });
    //
    $(".opacity-black").on("click", function () {
        $(".opacity-black").hide();
        $(".search-modal").hide();
    });
    //
    $(".search-modal input").on("keypress", function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $(".opacity-black").hide();
            $(".search-modal").hide();
        }
    });
    $(".search-modal input").on("change", function () {
       let text=$(this).val();
       let url = $(this).data("url");
       // console.log(text);
        let obj ={};
        obj.text=text;
        $.ajax({
         url: url,
         data: obj,
         type: 'GET',
         beforeSend: function() {

         },
         success: function(res){
            if (res.code===200){
                window.history.pushState('','',res.url);
                $('body').html(res.html);
            }
         },
         error: function() {

         },
         complete: function() {

         }
         });

    });
});