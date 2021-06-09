$(function() {

  // f_test();
  f_navBar();
  f_ancTran();
  f_ancTran5();
  f_ancTran6();
  f_ancTran7();
  f_index_punchBtn();
  f_attendance_punchBtn();
  f_deleteBtn_confirm();
  f_staff_registerUpdate_Btn();
  f_onsite_registerBtn();
  f_staffUpdDel_fieldId();
  f_withdrawalBtn_confirm();
  // f_gray_th();
  f_flashingWarning();
  f_paginate_anchor();


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


  function f_ancTran() {
    $(document).on('click', '.ancTran1, .ancTran2, .ancTran3, .ancTran4', function() {
      event.preventDefault();
      var pagepass2_var = prompt('パスワードを入力してください');
      if (pagepass2_var === null) {
        ;
      } else if (pagepass2_var === '') {
          alert('入力文字がありません。');
      } else {
          var ancTran_href = $(this).attr('href');
          $('#passForm').attr('action', ancTran_href);
          $('#pagepass2').attr('value', pagepass2_var);
          $('#passForm').submit();
      }
    });
  }

  function f_ancTran5() {
    $('.recordData_content').on('click', function() {
      var pagepass2_var = prompt('パスワードを入力してください');
      if (pagepass2_var === null) {
        ;
      } else if (pagepass2_var === '') {
          alert('入力文字がありません。');
      } else {
          var passForm_action = "/content_update_delete";
          $('#passForm').attr('action', passForm_action);
          $('#pagepass2').attr('value', pagepass2_var);
          var send_contentId = $(this).find('.send_contentId').text();
          $('#passForm').append('<input id="content_id" name="content_id" type="hidden" value="">');
          $('#content_id').attr('value', send_contentId);
          $('#passForm').submit();
      }
    });
  }

  function f_ancTran6() {
    $('.recordData_staff').on('click', function() {
      function getParam(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }
      var pagepass2_var = getParam('pagepass2');
      var passForm_action = "/staff_update_delete";
      $('#passForm').attr('action', passForm_action);
      $('#pagepass2').attr('value', pagepass2_var);
      var send_staffId = $(this).find('.send_staffId').text();
      $('#passForm').append('<input id="staff_id" name="staff_id" type="hidden" value="">');
      $('#staff_id').attr('value', send_staffId);
      $('#passForm').submit();
    });
  }

  function f_ancTran7() {
    $('.recordData_field').on('click', function() {
      function getParam(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }
      var pagepass2_var = getParam('pagepass2');
      var passForm_action = "/onsite_update_delete";
      $('#passForm').attr('action', passForm_action);
      $('#pagepass2').attr('value', pagepass2_var);
      var send_onsiteId = $(this).find('.send_onsiteId').text();
      $('#passForm').append('<input id="onsite_id" name="onsite_id" type="hidden" value="">');
      $('#onsite_id').attr('value', send_onsiteId);
      $('#passForm').submit();
    });
  }


  function f_index_punchBtn() {
    $('.index_punchBtn').on('click', function() {
      if( $('[name=on_site]').val() == 0 ) {
        event.preventDefault();
        alert('現場名を選択してください。');
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


  function f_staff_registerUpdate_Btn() {
    $(document).on('click', '.staff_registerBtn, .staff_updateBtn', function() {
      if( $('select[name="field_id"]').val() == '現場名' && $('input[name="name"]').val() == 0 ) {
        event.preventDefault();
        alert('現場名を選択し、スタッフ名を入力してください。');
      } else if( $('select[name="field_id"]').val() == '現場名' ) {
        event.preventDefault();
        alert('現場名を選択してください。');
      } else if( $('input[name="name"]').val() == 0 ) {
        event.preventDefault();
        alert('スタッフ名を入力してください。');
      }
    });
  }


  function f_onsite_registerBtn() {
    $('.onsite_registerBtn').on('click', function() {
      if( $('input[name="name"]').val() == 0 ) {
        event.preventDefault();
        alert('現場名を入力してください。');
      }
    });
  }


  function f_staffUpdDel_fieldId() {
    // var field_id = $('.fieldId_num').text();
    // $('.field_id').val(field_id).prop('selected', true);
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

  // function f_gray_th() {
  //   if (location.pathname == "/" || location.pathname == "/details" || location.pathname == "/entry" || location.pathname == "/work_past" || location.pathname == "/payslips" || location.pathname == "/payslips_duration" || location.pathname == "/staff_info") {
  //     $('th').css('background-color', '#999999');
  //     $('th').not('#th_width_not').css('width', '160px');
  //     if(!($('.recordData').children('td').length)){
  //       $('.recordData').children('th').addClass('text-center py-2').css('font-size', '1.5em').css('letter-spacing', '0.05em').text('データがありません。');
  //     }
  //   }
  // }


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


  function f_paginate_anchor() {
    if(location.pathname == '/staff_register' || location.pathname == '/onsite_register') {
      function getParam(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }
      $('.page-link').on('click', function() {
        event.preventDefault();
        var pagepass2 = '&pagepass2=' + getParam('pagepass2');
        var a_href = $(this).attr('href') + pagepass2;
        window.location.href = a_href;
      });
    }
  }


});
