$(document).ready(function() {
  var len_adv_info = $('.adv_info_call').length;
  var len_hr = (len_adv_info * 50) + 70;
  var len_hr_dis = len_adv_info * 65;
  var len = len_hr + 'px';
  len_hr_dis = '-' + len_hr_dis + 'px';
  if (len_adv_info < 3) {
    $('#adv_info_call_info_hr').css('height', len);
    $('#adv_info_call').css('margin-top', len_hr_dis);
  } else {
    len_hr = (len_adv_info * 50) + 96;
    len_hr_dis = len_adv_info * 65;
    len = len_hr + 'px';
    len_hr_dis = '-' + len_hr_dis + 'px';
    $('#adv_info_call_info_hr').css('height', len);
    $('#adv_info_call').css('margin-top', len_hr_dis);
  }
});
function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById('search_zone');
  filter = input.value.toUpperCase();
  div = document.getElementById('zone_ul');
  a = div.getElementsByTagName('li');
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = '';
    } else {
      a[i].style.display = 'none';
    }
  }
}
$('#status_major').keyup(function() {
  var input, a, i, filter, div;
  input = $(this).val();
  filter = input.toUpperCase();
  div = $(this).closest('.filll').children('.fils');
  a = div[0].getElementsByTagName('p');
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = '';
    } else {
      a[i].style.display = 'none';
    }
  }
});
$('#nav_status_major').keyup(function() {
  var input, a, i, filter, div;
  input = $(this).val();
  filter = input.toUpperCase();
  div = $(this).closest('.sidde').children('.fils');
  a = div[0].getElementsByTagName('p');
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = '';
    } else {
      a[i].style.display = 'none';
    }
  }
});
function filterFunction_nav_zone() {
  var input, filter, a, i;
  input = document.getElementById('nav_search_zone');
  filter = input.value.toUpperCase();
  div = document.getElementById('nav_zone_ul');
  a = div.getElementsByTagName('li');
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = '';
    } else {
      a[i].style.display = 'none';
    }
  }
}
function filterFunction_status_job() {
  var j = $('#status_job').val();
  if (j == '') {
    $('#jooob').css('display', 'none');
    $('#jobs').css('display', 'unset');
  } else {
    $('#jobs').css('display', 'none');
    $('#jooob').css('display', 'unset');
    var input, filter, div, a, i;
    input = document.getElementById('status_job');
    filter = input.value.toUpperCase();
    div = document.getElementById('jooob');
    a = div.getElementsByTagName('p');
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = '';
      } else {
        a[i].style.display = 'none';
      }
    }
  }
}
function filterFunction_nav_status_job() {
  var j = $('#nav_status_job').val();
  if (j == '') {
    $('#nav_jooob').css('display', 'none');
    $('#nav_jobs').css('display', 'unset');
  } else {
    $('#nav_jobs').css('display', 'none');
    $('#nav_jooob').css('display', 'unset');
    var input, filter, div, a, i;
    input = document.getElementById('nav_status_job');
    filter = input.value.toUpperCase();
    div = document.getElementById('nav_jooob');
    a = div.getElementsByTagName('p');
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = '';
      } else {
        a[i].style.display = 'none';
      }
    }
  }
}

$('.filter_check').change(function() {
  if ($(this).prop('checked')) {
    var val = $(this).attr('val');
    $('.filter_check').filter('[val=\'' + val + '\']').prop('checked', true);


  } else {
    var val = $(this).attr('val');
    $('.filter_check').filter('[val=\'' + val + '\']').prop('checked', false);
  }
  var zone_checked = get_filter_text('filter_check_zone');
  var job_checked = get_filter_text('filter_check_job');
  var major_checked = get_filter_text('filter_check_major');
  var sex_checked = get_filter_text('filter_check_sex');
  var timing_checked = get_filter_text('filter_timing_checked');
  $.ajax({
    url: './model/filtering.php',
    method: 'POST',
    data: {
      zone_checked: zone_checked,
      job_checked: job_checked,
      major_checked: major_checked,
      sex_checked: sex_checked,
      timing_checked: timing_checked
    },
    beforeSend: function() {
      $('#adverss').hide();
      $('#loading_bar').show();
    }
    , success: function(result) {
      $('#adverss').html(result);

    }, complete: function() {
      $('#loading_bar').hide();
      $('#adverss').show();
    }
  });

});

function get_filter_text(text_class) {
  var filterData = [];
  $('.' + text_class + ':checked').each(function() {
    filterData.push($(this).attr('val'));
  });
  return filterData;
}

$('.fillter_title').click(function() {
  $(this).closest('div').children('.fills').toggle('fast');
});

function openNav() {
  document.getElementById('mySidenav_search_zone').style.width = '270px';
}

function closeNav() {
  document.getElementById('mySidenav_search_zone').style.width = '0';
}

function openNavJob() {
  document.getElementById('mySidenav_job_status').style.width = '270px';
}

function closeNavJob() {
  document.getElementById('mySidenav_job_status').style.width = '0';
}

function openNavMajor() {
  document.getElementById('mySidenav_search_major').style.width = '270px';
}

function closeNavMajor() {
  document.getElementById('mySidenav_search_major').style.width = '0';
}

function openNavSex() {
  document.getElementById('mySidenav_sex').style.width = '270px';
}

function closeNavSex() {
  document.getElementById('mySidenav_sex').style.width = '0';
}

function openNavDoc() {
  document.getElementById('mySidenav_doc').style.width = '270px';
}

function closeNavDoc() {
  document.getElementById('mySidenav_doc').style.width = '0';
}

function openNavText() {
  document.getElementById('mySidenav_search_text').style.width = '270px';
}

function closeNavText() {
  document.getElementById('mySidenav_search_text').style.width = '0px';
}

$('#search_text').keyup(function() {
  var val_search_text = $('#search_text').val();
  if (val_search_text == '') {
    $('#search_seg').slideUp();
  } else {
    $('#search_seg').slideDown();
    $.post('./model/search.php', {val_search_text: val_search_text}, function(result) {
      $('#search_seg').html(result);

    });
  }
});

$('#side_search_text').keyup(function() {
  var val_search_text = $('#side_search_text').val();
  if (val_search_text == '') {
    $('#side_search_seg').slideUp();
  } else {
    $('#side_search_seg').slideDown();
    $.post('./model/search.php', {val_search_text: val_search_text}, function(result) {
      $('#side_search_seg').html(result);

    });
  }
});

var arr_show = [];
var arr_job = [];
var arr_major = [];

function myFunction() {
  document.getElementById('adver_dropdown').classList.toggle('show');
}

function filterFunction2() {
  var input, filter, ul, li, a, i;
  input = document.getElementById('adver_input');
  filter = input.value.toUpperCase();
  div = document.getElementById('adver_dropdown');
  a = div.getElementsByTagName('a');
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = '';
    } else {
      a[i].style.display = 'none';
    }
  }
}

function filterFunction_job() {
  var input, filter, ul, li, a, i;
  input = document.getElementById('job_input');
  filter = input.value.toUpperCase();
  div = document.getElementById('check_jobs');
  a = div.getElementsByTagName('li');
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = '';
    } else {
      a[i].style.display = 'none';
    }
  }
}

function filterFunction_major() {
  var input, filter, ul, li, a, i;
  input = document.getElementById('major_input');
  filter = input.value.toUpperCase();
  div = document.getElementById('check_majors');
  a = div.getElementsByTagName('li');
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = '';
    } else {
      a[i].style.display = 'none';
    }
  }
}

$('.adver_city').click(function() {
  document.getElementById('adver_dropdown').classList.toggle('show');
  var te = $(this).attr('city');
  $('#adver_but').text(te);
  $('#adver_but').val(te);
});
$('.adver_btn').click(function() {
  var adver_fname_lname = $('#adver_fname_lname').val();
  var adver_phone_number = $('#adver_phone_number').val();
  var adver_factory_name = $('#adver_factory_name').val();
  var adver_call_phone = $('#adver_call_phone').val();
  var adver_email = $('#adver_email').val();
  var adver_but = $('#adver_but').val();
  var adver_txtarea_ide = $('#adver_txtarea_ide').val();
  var adver_txtarea_profit = $('#adver_txtarea_profit').val();
  var adver_txtarea_rela = $('#adver_txtarea_rela').val();
  var adver_title = $('#adver_title').val();
  var adver_address = $('#adver_address').val();
  var adver_before_main = $('#adver_before_main').val();
  var adver_after_main = $('#adver_after_main').val();
  var for_what = $('#advr_btn').attr('for_what');

  var adver_timing = $('#adver_timing').val();
  var adver_sex = $('#adver_sex').val();


  var fd = new FormData();
  var files = $('#adver_file_upload')[0].files;
  var file_name = document.getElementById('adver_file_upload').value;
  file_name = file_name.split('\\').pop();

  var validate_email = $('#adver_email').val();
  var em_nu = 0;
  var substr_ema = validate_email.substring(validate_email.length - 4, validate_email.length);
  if (!validate_email.includes('@')) {
    em_nu++;
  }
  if (substr_ema != '.com') {
    em_nu++;
  }

  $('.major_check:checkbox:checked').each(function() {
    var val = $(this).val();
    arr_major.push(val);
  });
  $('.job_check:checkbox:checked').each(function() {
    var val = $(this).val();
    arr_job.push(val);
  });
  $('.adver_check:checkbox:checked').each(function() {
    var val = $(this).val();
    arr_show.push(val);
  });

  if (arr_job.length == 0 || arr_major.length == 0 || adver_timing == 0 || adver_sex == 0 || adver_fname_lname == ''
      || adver_phone_number == '' || adver_factory_name == '' || adver_call_phone == '' ||
      adver_email == '' || adver_but == '' || adver_title == '' || adver_address == '' || adver_before_main == '' ||
      adver_after_main == '') {
    alert('مقادير براي ثبت آگهي را وارد كنيد');
  } else if (em_nu > 0) {
    alert('ایمیل را درست وارد کنید');
  } else {
    if ($('#adver_fast').is(':checked')) {
      var adver_fast = 1;
    } else {
      var adver_fast = 0;
    }
    var adver_show = '';
    for (var i = 0; i < arr_show.length; i++) {
      if (i == (arr_show.length - 1)) {
        adver_show += arr_show[i];
      } else {
        adver_show += arr_show[i] + '-';
      }
    }
    var adver_job = '';
    for (var i = 0; i < arr_job.length; i++) {
      if (i == (arr_job.length - 1)) {
        adver_job += arr_job[i];
      } else {
        adver_job += arr_job[i] + '-';
      }
    }
    var adver_major = '';
    for (var i = 0; i < arr_major.length; i++) {
      if (i == (arr_major.length - 1)) {
        adver_major += arr_major[i];
      } else {
        adver_major += arr_major[i] + '-';
      }
    }
    console.log(adver_major);
    if (files.length > 0 && for_what == 1) {
      fd.append('file', files[0]);
      $.ajax({
        url: './model/set_file.php',
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        success: function(res) {
          if (res == 1) {
            $.post('./model/set_advertise.php',
                {
                  adver_fname_lname: adver_fname_lname,
                  adver_phone_number: adver_phone_number,
                  adver_factory_name: adver_factory_name,
                  adver_call_phone: adver_call_phone,
                  adver_email: adver_email,
                  adver_but: adver_but,
                  adver_show: adver_show,
                  adver_txtarea_ide: adver_txtarea_ide,
                  adver_txtarea_profit: adver_txtarea_profit,
                  adver_txtarea_rela: adver_txtarea_rela,
                  adver_fast: adver_fast,
                  adver_job: adver_job,
                  adver_major: adver_major,
                  adver_timing: adver_timing,
                  adver_title: adver_title,
                  adver_sex: adver_sex,
                  adver_img: file_name,
                  adver_address: adver_address,
                  adver_before_main: adver_before_main,
                  adver_after_main: adver_after_main,
                  for_what: for_what
                }
                , function(result) {
                  alert(result);
                });
          } else {
            alert(res);
          }
        }
      });
    } else if (for_what == 2 && files.length > 0) {
      fd.append('file', files[0]);
      $.ajax({
        url: './model/set_file.php',
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        success: function(res) {
          if (res == 1) {
            var sdfghkj = $('#sdfghkj').val();
            $.post('./model/set_advertise.php',
                {
                  adver_fname_lname: adver_fname_lname,
                  adver_phone_number: adver_phone_number,
                  adver_factory_name: adver_factory_name,
                  adver_call_phone: adver_call_phone,
                  adver_email: adver_email,
                  adver_but: adver_but,
                  adver_show: adver_show,
                  adver_txtarea_ide: adver_txtarea_ide,
                  adver_txtarea_profit: adver_txtarea_profit,
                  adver_txtarea_rela: adver_txtarea_rela,
                  adver_fast: adver_fast,
                  adver_job: adver_job,
                  adver_major: adver_major,
                  adver_timing: adver_timing,
                  adver_title: adver_title,
                  adver_sex: adver_sex,
                  adver_img: file_name,
                  adver_address: adver_address,
                  adver_before_main: adver_before_main,
                  adver_after_main: adver_after_main,
                  for_what: for_what,
                  sdfghkj: sdfghkj
                }
                , function(result) {
                  alert(result);
                });
          } else {
            alert(res);
          }
        }
      });
    } else if (for_what == 2 && files.length == 0) {
      var sdfghkj = $('#sdfghkj').val();
      file_name = $('#adver_file_upload').attr('image_url');
      $.post('./model/set_advertise.php',
          {
            adver_fname_lname: adver_fname_lname,
            adver_phone_number: adver_phone_number,
            adver_factory_name: adver_factory_name,
            adver_call_phone: adver_call_phone,
            adver_email: adver_email,
            adver_but: adver_but,
            adver_show: adver_show,
            adver_txtarea_ide: adver_txtarea_ide,
            adver_txtarea_profit: adver_txtarea_profit,
            adver_txtarea_rela: adver_txtarea_rela,
            adver_fast: adver_fast,
            adver_job: adver_job,
            adver_major: adver_major,
            adver_timing: adver_timing,
            adver_title: adver_title,
            adver_sex: adver_sex,
            adver_img: file_name,
            adver_address: adver_address,
            adver_before_main: adver_before_main,
            adver_after_main: adver_after_main,
            for_what: for_what,
            sdfghkj: sdfghkj
          }
          , function(result) {
            alert(result);
          });
    }

  }

});
  $(".delete_user_advertise").click(function () {
  var val = $(this).attr("val");
  $.post("./model/delete_user_advertise.php",{val:val},function (result) {
  if(result==1){
  alert("آکهی با موفقیت حذف شد");
  $.post("./model/user_advertise.php",function (result) {
  $("#user_advertise_tbody").html(result);
});
}else{
  alert("حذف آکهی با مشکل مواجه شد");
}
})
});
$(".adver_sarasari").click(function () {
  var es_sa_id = $(this).attr("val-adver-sarasari");
  var url = "estekhdamSarasari?id="+es_sa_id;
  window.open(url,"_self");
});
