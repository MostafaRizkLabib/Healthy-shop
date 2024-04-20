const typed = new Typed('#text' , {
    strings: ['Allergy Products','Dietary Supplements ','Sugar-Free Products'],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 1000,
    loop: true

});  

document.querySelector('#search-icon').onclick = () =>{
    document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('#close').onclick = () =>{
    document.querySelector('#search-form').classList.remove('active');
}

// array ontain all images
var i = 0
var slidesImage = ["homeimg1.jpg","homeimg2.jpg","homeimg3.jpg","homeimg4.jpg","homeimg5.jpg","homeimg6.jpg"]

// excpression function

var slideShow = function (){

    document.slideshow.src = slidesImage[i]; 

    if ( i < slidesImage.length -1 ){
        i++
    }else {
        i = 0 ;
    }
    setTimeout("slideShow()",2000);


}

slideShow();

 
function search() {
    let input = document.getElementById('search-box').value
    input = input.toLowerCase();
    let x = document.getElementsByClassName('content');
   
    for (i = 0; i < x.length; i++) {
      if (!x[i].innerHTML.toLowerCase().includes(input)) {
        x[i].style.display = "none";
      }
      else {
        x[i].style.display = "list-item";
      }
    }
  }