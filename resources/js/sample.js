function selectboxChange() {
    target = document.getElementById("output");
    selindex = document.getElementById('Select1').selectedIndex;
    switch (selindex) {
      case 1:
        target.innerHTML = '<input class="combo_button" type="button" value="→" onclick="OnButtonClickA();"/>';
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