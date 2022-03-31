//開くボタンを押した時には
$(".open-btn").click(function () {
  $("#search-wrap").addClass('panelactive');//#search-wrapへpanelactiveクラスを付与
$('#search-text').focus();//テキスト入力のinputにフォーカス
});

//閉じるボタンを押した時には
$(".close-btn").click(function () {
  $("#search-wrap").removeClass('panelactive');//#search-wrapからpanelactiveクラスを除去
});

document.addEventListener('click',e=>{
      const t=e.target;
      if(t.closest('.user_profile_img_wrap')){
        profile_menu_wrap.classList.toggle('display');
      }else if(!t.closest('.display')){
        profile_menu_wrap.classList.remove('display');
      }
});

document.addEventListener('click',e=>{
  const t=e.target;
  if(t.closest('.report_wrap')){
    report_menu_wrap.classList.toggle('display2');
  }else if(!t.closest('.display2')){
    report_menu_wrap.classList.remove('display2');
  }
});

/*
document.addEventListener('click',e=>{
  const t=e.target;
  if(t.closest('.comment_delete_button')){
    comment_delete_wrap.classList.toggle('display3');
  }else if(!t.closest('.display3')){
    comment_delete_wrap.classList.remove('display3');
  }
});
*/

$(function(){
  $('comment_delete_wrap').hide();
  
  $('.comment_delete_button').on('click',function(){   
    $('comment_delete_wrap').not($($(this).attr('href'))).hide();
    // フェードイン・アウトのアニメーション付で、表示・非表示を交互に実行
    $($(this).attr('href')).fadeToggle(1);
    
    // show を使うと、表示するだけ （ 同じボタンを何回押しても変わらない ）
    // $($(this).attr('href')).show();
  });
});