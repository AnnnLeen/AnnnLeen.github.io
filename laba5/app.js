function click1() {
    let f1 = document.getElementById("field1").value;
    let f2 = document.getElementById("field2").value;
    let res = parseInt(f1)*parseInt(f2);
        if ((Number.isNaN(res)) || (res<0)) {
           document.getElementById("result").innerHTML="Вы ввели некорректное значение :( Поробуйте снова"; }
           else
    { document.getElementById("result").innerHTML="Общая стоимость: "+res; }
}

function onClick() {
  alert("click");
}

window.addEventListener("DOMContentLoaded", function (event) {
  console.log("DOM fully loaded and parsed");
  let b = document.getElementById("button1");
  b.addEventListener("click", onClick);
});
