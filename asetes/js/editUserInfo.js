$(document).ready(function () {
    $("#btn_editInfo").click(function () {
        var editInfo_name_input = $("#editInfo_name_input").val();
        var gender = $('input[name=gender]:checked', '#editInfo_gender').val();
        var editInfo_mobile_input = $("#editInfo_mobile_input").val();
        var ostan_select = $("#ostan_select").val();
        var editInfo_city_input = $("#editInfo_city_input").val();
        if (editInfo_name_input == "" || editInfo_mobile_input.length == 0 || editInfo_city_input == "") {
            alert("فیلد هارا پر کنید");
            console.log(editInfo_name_input+"-"+editInfo_mobile_input+"-"+editInfo_city);
        } else {
            $.post("./model/editUserinfoUpdate.php", {edit_user:0,
                name: editInfo_name_input, gender: gender, mobile: editInfo_mobile_input, ostan_select: ostan_select,
                city: editInfo_city_input
            }, function (result) {
                alert(result);
                window.open("panelUser_editUserInfo",'_self');
            });
        }

    });

    $("#sub_ed_email").click(function () {
        var new_email_input = $("#new_email_input").val();
        var new_sec_email_input = $("#new_sec_email_input").val();
        var substr_em = new_email_input.substring(new_email_input.length-4,new_email_input.length);
        var em = 0;
        if(!new_email_input.includes("@")){
            em++;
        }
        if(substr_em!=".com"){
            em++;
        }
        if(new_sec_email_input!=new_email_input){
            em++;
        }

        if(em>0){
            alert("فیلد هارا درست پر کنید");
        }else{
            $.post("./model/editUserinfoUpdate.php",{new_email:new_email_input},function (result) {
                alert(result);
                window.open("PanelUser_editEmail","_self");
            });
        }
    });

    $("#jobbtn").click(function () {
        var jobstatusselect = $("#jobstatusselect").val();
        var salaryselect = $("#salaryselect").val();
        var workinselect = $("#workinselect").val();

        $.post("./model/editUserinfoUpdate.php",{editjobinfo:0,jobstatusselect:jobstatusselect,salaryselect:salaryselect,
            workinselect:workinselect},function (result) {
            if(result==1){
                alert("تغییرات انجام شد");
                window.open("panelUser_editResume","_self");
            }else{
                alert("تغییرات انجام نشد");
            }
        });
    });

    $(".r_lev").click(function () {
        $(this).children(".lanlevelradio").prop('checked',true);
    });

    $("#btnlang").click(function () {
        var lang=$("#langselect").val();
        var level="";
        $(".lanlevelradio").each(function () {
            if($(this).prop("checked")){
                level=$(this).val()
            }
        });
        $.post("./model/editUserinfoUpdate.php",{addlang:0,level:level,lang:lang},function (result) {
            if(result==1){
                alert("زبان افزوده شد");
                window.open("panelUser_editResume","_self");
            }else{
                alert("این زبان انتخاب شده است");
            }
        });
    });

    $(".fa-close-lan").click(function () {
        var lang = $(this).attr("val");
        $.post("./model/editForRes.php",{lang:lang},function (result) {
            if(result==1){
                alert("زبان موردنظر حذف شد");
                window.open("PanelUser_editResume","_self");
            }else{
                alert("دوباره امتحان كنيد");
            }
        });
    });

    $("#btnlangedit").click(function () {
        var lang=$("#selectedlan").val();
        var level="";
        $(".lanlevelradio").each(function () {
            if($(this).prop("checked")){
                level=$(this).val()
            }
        });
        $.post("./model/editUserinfoUpdate.php",{editlang:0,level:level,lang:lang},function (result) {
            if(result==1){
                alert("زبان ويرايش شد");
                window.open("panelUser_editResume","_self");
            }else{
                alert("مشكلي وجود دارد");
            }
        });
    });
});