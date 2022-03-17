function selectboxChange() {
    target = document.getElementById("output");
    selindex = document.getElementById('Select1').selectedIndex;
    switch (selindex) {
      case 1:
        target.innerHTML = '<div class="combo_button_wrap"><input class="combo_button" type="button" value="→" onclick="OnButtonClickA();"/><input class="combo_button" type="button" value="垂直J" onclick="OnButtonClickB();"/><input class="combo_button" type="button" value="前J" onclick="OnButtonClickC();"/><input class="combo_button" type="button" value="後J" onclick="OnButtonClickD();"/><input class="combo_button" type="button" value="大P" onclick="OnButtonClickE();"/></div>';
        break;
      case 2:
        target.innerHTML = '<input type="button" value="Exec" onclick="OnButtonClickA();"/>';
        break;
      case 3:
        target.innerHTML = "要素3が選択されています。<br/>";
        break;
      case 4:
        target.innerHTML = "要素4が選択されています。<br/>";
        break;
      case 5:
        target.innerHTML = "要素5が選択されています。<br/>";
        break;
    }
}

function OnButtonClickA() {
    target = document.getElementById("combo_content"); //combo_contentのvalueに"a"を追加する関数
    target.value = target.value + "→";
}
function OnButtonClickB() {
    target = document.getElementById("combo_content");
    target.insertAdjacentHTML("beforeend",'');
}


function test(){
  
}