function slide_func() {
    let slideBox = document.querySelector("div.slideBox");
    let slide_image_box = document.querySelector("div.slide_image_box");
    let slides = document.querySelectorAll("div.slide_image_box a");
    let prev = document.querySelector(".prev");
    let next = document.querySelector(".next");
    let slideCount = slides.length;
    let currentIndex = 0;
    let timer;

    for(let i=0 ; i<slideCount; i++) {
        let newLeft = i*100+'%';
        slides[i].style.left = newLeft;
    }

    function gotoSlide(index) {
        currentIndex = index;
        let newLeft = -(currentIndex *100) + '%';
        slide_image_box.style.left=newLeft;
        slide_image_box.classList.add('animated');
        
        (currentIndex===0)? prev.classList.add('disabled'):prev.classList.remove('disabled') ;
        (currentIndex===5)? next.classList.add('disabled'):next.classList.remove('disabled') ;
    }

    gotoSlide(0);

    prev.addEventListener('click',function(e){
        e.preventDefault(); //angker 기능을 막음
        let index = currentIndex;
        index = (index === 0 ) ? slideCount-1 : index-1; 
        gotoSlide(index);
    });

    next.addEventListener('click',function(e){
        e.preventDefault();
        let index = currentIndex;
        index = (index===(slideCount-1)) ? 0 : index+1;
       
        gotoSlide(index);
    });

    function startTimer(){
        timer = setInterval(function(){
            let index = (currentIndex+1)%slideCount;

            gotoSlide(index);
        },2000);
    }

    startTimer();

    slide_image_box.addEventListener("mouseenter",function(){
        clearInterval(timer);
    });

    slide_image_box.addEventListener("mouseleave",function(){
        startTimer();
    });

    
    console.log(currentIndex);
}//end of slide_func