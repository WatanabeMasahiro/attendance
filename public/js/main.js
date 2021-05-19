$(function() {

  // f_test();
  f_navBar();
  f_ancTran();
  f_index_punchBtn();
  f_attendance_punchBtn()
  f_staff_registerBtn();
  f_onsite_registerBtn();
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
          var ancTran1_href = $(this).attr('href');
          $('#passForm').attr('action', ancTran1_href);
          $('#pagepass2').attr('value', pagepass2_var);
          $('#passForm').submit();
      }
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


  function f_staff_registerBtn() {
    $('.staff_registerBtn').on('click', function() {
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
    setInterval(function(){
      $('.flashingWarning').fadeOut(1200).fadeIn(1800);
    },500);
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
