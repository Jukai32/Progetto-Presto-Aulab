// NAVBAR
const navbar = document.querySelector('#navbar');

document.addEventListener('scroll' , () => {
  let scrolled = window.scrollY;
  
  if(scrolled > 80){
    navbar.classList.add('scrolled')
  } else {
    navbar.classList.remove('scrolled')
  }
});

// COUNTDOWN
if(window.location.pathname == '/'){
  
  function countdown() {
    let countDate = new Date(`October 30, 2022 00:00:00`).getTime();
    let now = new Date();
    
    // settato il tempo
    let gap = countDate - now;
    let second = 1000;
    let minute = second * 60;
    
    let hour = minute * 60;
    let day = hour * 24;
    
    // calcolato il gap 
    let textDay = Math.floor(gap / day);
    let textHour = Math.floor((gap % day) / hour);
    let textMinute = Math.floor((gap % hour) / minute);
    let textSecond = Math.floor((gap % minute) / second);
    
    // inserito in html
    document.querySelector('.day').innerHTML = textDay;
    document.querySelector('.hour').innerHTML = textHour;
    document.querySelector('.minute').innerHTML = textMinute;
    document.querySelector('.second').innerHTML = textSecond;
  }
  
  setInterval(countdown, 1000);
} 

// animation
const sliders = document.querySelectorAll(".slide-in");

const appearOnScroll = new IntersectionObserver(function (entries) {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) {
      return;
    } else {
      entry.target.classList.add("appear");
    }
  });
});

sliders.forEach((slider) => {
  appearOnScroll.observe(slider);
});

