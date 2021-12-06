// document.getElementById("dropmenu").addEventListener('click',openMenu);
dropmenu=document.getElementsByClassName('dropmenu');
for (let index = 0; index < dropmenu.length; index++) {
  dropmenu[index].addEventListener('click', function (){dropdown_js(this);});   
}

function dropdown_js(e){
  childrens=e.children;
  for (let index = 0; index < childrens.length; index++) {
  if(childrens[index].classList.contains('dropdown')){
    childrens[index].classList.toggle("active");
    e.classList.toggle("active");
    var activeChild=childrens[index];     
  }

    document.addEventListener('click', function(event){
        var isClickInside = e.contains(event.target);
        var activeStatus =  e.classList.contains('active');

        if (!isClickInside && activeStatus ){

          e.classList.toggle("active");
          activeChild.classList.toggle("active");
        }
    });
  }
}



