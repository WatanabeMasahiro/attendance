$(function() {

  // f_test();
  f_navBar();
  // f_ancTran();
  f_contentRegister_list();
  f_staffRegister_list()
  f_onsiteRegister_list();
  f_nondata_tbody();
  f_index_punchBtn();
  f_attendance_punchBtn();
  f_deleteBtn_confirm();
  f_content_updateBtn();
  f_staff_registerUpdate_Btn();
  f_staff_registerDeleteMsg();
  f_onsite_registerUpdate_Btn();
  // f_onsite_registerDeleteMsg();
  f_staffUpdDel_fieldId();
  f_infochangeBtn();
  f_withdrawalBtn_confirm();
  f_pagepassPage();
  f_gray_th();
  f_flashingWarning();
  // f_paginate_anchor();
  f_auth_register();


  // function f_test() {
  //   $('.JStest').on('click', function() {
  //     alert("hello!");
  //   });
  // }


  function f_navBar() {
    $('.navbar-collapse').find('a').each(function(){
      var a_Href = $(this).attr('href');
      var url_Path = location.pathname;
      if ( a_Href == url_Path ) {
        $(this).css('background-color', 'orange')
               .css('border-radius', '2px')
      }
    });
  }


  // function f_ancTran() {
  //   $(document).on('click', '.ancTran1, .ancTran2, .ancTran3, .ancTran4', function() {
  //     event.preventDefault();
  //     var pagepass2_var = prompt('パスワードを入力してください');
  //     if (pagepass2_var === null) {;
  //     } else if (pagepass2_var === '') {
  //         alert('入力文字がありません。');
  //     } else {
  //         var ancTran_href = $(this).attr('href');
  //         $('#passForm').attr('action', ancTran_href);
  //         $('#pagepass2').attr('value', pagepass2_var);
  //         $('#passForm').submit();
  //     }
  //   });
  // }

  function f_contentRegister_list() {
    $('.recordData_content').on('click', function() {
      var passForm_action = "/content_update_delete";
      $('#passForm').attr('action', passForm_action);
      var send_contentId = $(this).find('.send_contentId').text();
      $('#passForm').append('<input id="content_id" name="content_id" type="hidden" value="">');
      $('#content_id').attr('value', send_contentId);
      $('#passForm').submit();
    });
  }

  function f_staffRegister_list() {
    $('.recordData_staff').on('click', function() {
      var passForm_action = "/staff_update_delete";
      $('#passForm').attr('action', passForm_action);
      var send_staffId = $(this).find('.send_staffId').text();
      $('#passForm').append('<input id="staff_id" name="staff_id" type="hidden" value="">');
      $('#staff_id').attr('value', send_staffId);
      $('#passForm').submit();
    });
  }

  function f_onsiteRegister_list() {
    $('.recordData_field').on('click', function() {
      // function getParam(name, url) {
      //   if (!url) url = window.location.href;
      //   name = name.replace(/[\[\]]/g, "\\$&");
      //   var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      //       results = regex.exec(url);
      //   if (!results) return null;
      //   if (!results[2]) return '';
      //   return decodeURIComponent(results[2].replace(/\+/g, " "));
      // }
      // var pagepass2_var = getParam('pagepass2');
      var passForm_action = "/onsite_update_delete";
      $('#passForm').attr('action', passForm_action);
      var send_onsiteId = $(this).find('.send_onsiteId').text();
      $('#passForm').append('<input id="onsite_id" name="onsite_id" type="hidden" value="">');
      $('#onsite_id').attr('value', send_onsiteId);
      $('#passForm').submit();
    });
  }


  function f_nondata_tbody() {
    if($('.nondata_tbody').length == true && $('.nondata_tbody').find('tr').length == false) {
      $('.nondata_tbody').append('<tr><td class="align-middle bg-white" colspan="5" style="font-size: 15px;"><div class="h2 my-5 text-dark"><b>データがありません。</b></div></td></tr>');
    }
  }


  function f_index_punchBtn() {
    $('.index_punchBtn').on('click', function() {
      if( $('[name=on_site]').val() == 0 ) {
        event.preventDefault();
        alert($('.opt_name').text() + 'を選択してください。');
      }
    });
  }


  function f_attendance_punchBtn() {
    $('.punchinBtn').on('click', function() {
      if( $('[name=staff_name]').val() == 0 ) {
        event.preventDefault();
        alert('スタッフ名を選択してください。');
      }
    });
    $('.punchoutBtn').on('click', function() {
      if( $('[name=staff_name]').val() == 0 ) {
        event.preventDefault();
        alert('スタッフ名を選択してください。');
      }
    });
  }


  function f_deleteBtn_confirm() {
    $('button[name="delete"]').on('click', ()=> {
      if (!confirm("データを削除しますか??" )) {
        return false;
      }
    });
  }


  function f_content_updateBtn() {
    $('.content_updateBtn').on('click', function() {
      if( $('input[name="edited_at"]').val() == $('input[name="edited_at"]').data('edited_at') && $('input[name="field_name"]').val() == $('input[name="field_name"]').data('field_name') && $('input[name="staff_name"]').val() == $('input[name="staff_name"]').data('staff_name') && $('[name="punch"]').val() == $('.punch_th').data('punch') && $('[name="remarks"]').val() == $('[name="remarks"]').data('remarks') ) {
        event.preventDefault();
        alert('データが変更されていません。');
      }
      if ( $('input[name="edited_at"]').val() == false && $('input[name="field_name"]').val() == false && $('input[name="staff_name"]').val() == false ) {
        event.preventDefault();
        alert('日時と' + $('.d_o_name').text() + 'とスタッフ名が入力されていません。');
      }
      else if ( $('input[name="edited_at"]').val() == false && $('input[name="field_name"]').val() == false ) {
        event.preventDefault();
        alert('日時と' + $('.d_o_name').text() + 'が入力されていません。');
      }
      else if ( $('input[name="edited_at"]').val() == false && $('input[name="staff_name"]').val() == false ) {
        event.preventDefault();
        alert('日時とスタッフ名が入力されていません。');
      }
      else if ( $('input[name="field_name"]').val() == false && $('input[name="staff_name"]').val() == false ) {
        event.preventDefault();
        alert($('.d_o_name').text() + 'とスタッフ名が入力されていません。');
      }
      else if ( $('input[name="edited_at"]').val() == false ) {
        event.preventDefault();
        alert('日時が入力されていません。');
      }
      else if ( $('input[name="field_name"]').val() == false ) {
        event.preventDefault();
        alert($('.d_o_name').text() + 'が入力されていません。');
      }
      else if ( $('input[name="staff_name"]').val() == false ) {
        event.preventDefault();
        alert('スタッフ名が入力されていません。');
      }
      if ( !($('[name="punch"]').val() == 1 || $('[name="punch"]').val() == 0) ) {
        event.preventDefault();
        alert('出退勤が選択されていません。');
      }
    });
  }


  function f_staff_registerUpdate_Btn() {
    $(document).on('click', '.staff_registerBtn, .staff_updateBtn', function(){
      if( $('select[name="field_id"]').val() == 0 && $('input[name="name"]').val() == "" ) {
        event.preventDefault();
        alert($('.opt_name').text() + 'を選択し、スタッフ名を入力してください。');
      } else if( $('select[name="field_id"]').val() == 0 ) {
        event.preventDefault();
        alert($('.opt_name').text() + 'を選択してください。');
      } else if( $('input[name="name"]').val() == "" ) {
        event.preventDefault();
        alert('スタッフ名を入力してください。');
      }
      if( $('input[name="name"]').val() == $('input[name="name"]').data('name') ) {
        event.preventDefault();
        alert('データが変更されていません。');
      }
    });
  }


  function f_staff_registerDeleteMsg() {
    // if( $('#staff_registerDelete1').get(0) ) {
    //   $('#staff_registerDelete1').remove();
    //   $('#staff_registerDelete2').removeClass('d-none').addClass('flashingWarning');
    // }
    // if( $('#staff_registerDelete').get(0) ) {
    //   var url = new URL(window.location.href.split('?')[0]);
    //   var pagepass = $('#staff_registerPagepass2').text();
    //   url.searchParams.append('pagepass2', pagepass);
    //   url.searchParams.append('del', true);
    //   location.href = url;
    // }
    if( $('#staff_registerDelete').get(0) ) {
      var url = new URL(window.location.href);
      var pagepass = $('#staff_registerPagepass2').text();
      url.searchParams.append('pagepass2', pagepass);
      history.replaceState('', '', url);
    }
  }


  function f_onsite_registerUpdate_Btn() {
    $(document).on('click', '.onsite_registerBtn, .onsite_updateBtn', function(){ 
      if( $('input[name="name"]').val() == "" ) {
        event.preventDefault();
        alert($('.opt_name').text() + 'を入力してください。');
      }
      if( $('input[name="name"]').val() == $('input[name="name"]').data('name') ) {
        event.preventDefault();
        alert('データが変更されていません。');
      }
    });
  }


  // function f_onsite_registerDeleteMsg() {
  //   if( $('#onsite_registerDelete').get(0) ) {
  //     var url = new URL(window.location.href);
  //     var pagepass = $('#onsite_registerPagepass2').text();
  //     url.searchParams.append('pagepass2', pagepass);
  //     history.replaceState('', '', url);
  //   }
  // }


  function f_staffUpdDel_fieldId() {
    // var field_id = $('.fieldId_num').text();
    // $('.field_id').val(field_id).prop('selected', true);
  }


  function f_infochangeBtn() {
    $('.infochangeBtn').on('click', function() {
      if( $('input[name="name"]').val() == $('input[name="name"]').data('name') && $('input[name="email"]').val() == $('input[name="email"]').data('email') && $('input[name="pagepass"]').val() == $('input[name="pagepass"]').data('pagepass') && $('input[name="department_onsite"]:checked').val() == $('.depons_th').data('depons') ) {
        event.preventDefault();
        alert('データが変更されていません。');
      }
      if ( ($('input[name="name"]').val() == false || $('input[name="email"]').val() == false || $('input[name="pagepass"]').val() == false) && $('input[name="department_onsite"]:checked').val() == undefined ) {
        event.preventDefault();
        alert('未入力の項目を入力し、「現場 or 部署」を選択してください。');
      }
      else if ( $('input[name="name"]').val() == false || $('input[name="email"]').val() == false || $('input[name="pagepass"]').val() == false ) {
        event.preventDefault();
        alert('未入力の項目を入力してください。');
      }
      else if( $('input[name="department_onsite"]:checked').val() == undefined ) {
        event.preventDefault();
        alert('「現場 or 部署」を選択してください。');
      }
    });
  }


  function f_withdrawalBtn_confirm() {
    $('.withdrawalBtn').on('click', ()=> {
      if (!confirm('退会すると、登録している\nすべてのデータが削除されます。')) {
        return false;
      }
      if (!confirm("退会しますか??" )) {
        return false;
      }
    });
  }

  function f_gray_th() {
    if (location.pathname == "/info_change") {
      $('th').css('background-color', '#999999');
      $('th').not('#th_width_not').css('width', '160px');
    }
  }


  function f_flashingWarning() {
    var n = 5;
    var interval;
    interval = setInterval(function(){
      $('.flashingWarning').fadeOut(1200).fadeIn(1800);
      n--;
      if (n == 0) {
        clearInterval(interval);
      }
    },500);
    setTimeout(function(){
        $('.flashingWarning').animate({opacity:0,height:0},1000);
      }, 10000);
  }


  // function f_paginate_anchor() {
  //   if(location.pathname == '/staff_register' || location.pathname == '/onsite_register') {
  //     function getParam(name, url) {
  //       if (!url) url = window.location.href;
  //       name = name.replace(/[\[\]]/g, "\\$&");
  //       var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
  //           results = regex.exec(url);
  //       if (!results) return null;
  //       if (!results[2]) return '';
  //       return decodeURIComponent(results[2].replace(/\+/g, " "));
  //     }
  //     $('.page-link').on('click', function() {
  //       event.preventDefault();
  //       var pagepass2 = '&pagepass2=' + getParam('pagepass2');
  //       var a_href = $(this).attr('href') + pagepass2;
  //       window.location.href = a_href;
  //     });
  //   }
  // }


  function f_pagepassPage() {
    if (location.pathname == "/pagepass") {
      $('button[name="pagepass_input"]').on('click', function(){
        if ( $('input[name="pagepass"]').val() == "" ) {
          event.preventDefault();
          alert('パスワードが未入力です。');
        }
      });
    }
  };


  function f_auth_register() {
    $('.auth_regBtn').on('click', function() {
      if (location.pathname == "/register") {
        if ( ($('input[name="name"]').val() === "" || $('input[name="email"]').val() === "" || $('input[name="password"]').val() === "" || $('input[name="password_confirmation"]').val() === "" || $('input[name="pagepass"]').val() === "") && $('input[name="department_onsite"]:checked').val() === undefined ) {
          event.preventDefault();
          alert('未入力の項目を入力し、「現場 or 部署」を選択してください。');
        }
        else if ( $('input[name="name"]').val() === "" || $('input[name="email"]').val() === "" || $('input[name="password"]').val() === "" || $('input[name="password_confirmation"]').val() === "" || $('input[name="pagepass"]').val() === "" ) {
          event.preventDefault();
          alert('未入力の項目を入力してください。');
        }
        else if( $('input[name="department_onsite"]:checked').val() === undefined ) {
          event.preventDefault();
          alert('「現場 or 部署」を選択してください。');
        }
      }
    });
  }


});
