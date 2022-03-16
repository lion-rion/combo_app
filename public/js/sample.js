function selectboxChange() {
    target = document.getElementById("output");
    selindex = document.form1.Select1.selectedIndex;
    switch (selindex) {
      case 1:
        target.insertAdjacentHTML('beforebegin', '<input type="button" value="Exec" onclick="OnButtonClickA();"/>');
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
function OnButtonClickB() {
    target = document.getElementById("a");
    target.insertAdjacentHTML("beforeend",'aaa');
}
function OnButtonClickA() {
    target = document.getElementById("a");
    target.insertAdjacentHTML("beforeend",'sss');
}