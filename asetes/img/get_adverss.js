$(".btn_pag").click(function () {
    var val = $(this).attr("val");
    $("html, body").animate({
        scrollTop:"20px"
    }, 1000);
    $.ajax({url: 'back/get_adver_from_pag.php',
        type: 'post',
        data:{page:val},
    beforeSend:function () {
        $("#adverss").hide();
        $("#loading_bar").show();
    },
    success: function (result) {
        $("#adverss").html(result);
    },
        complete:function () {
            $("#adverss").show();
            $("#loading_bar").hide();
        }});
    // $("#loading_bar").show();
    // $.post("back/get_adver_from_pag.php",{page:val},function (result) {
    //     $("#adverss").html(result);
    //     $("#loading_bar").hide();
    //
    // });
});