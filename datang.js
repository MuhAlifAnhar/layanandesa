document.addEventListener("DOMContentLoaded", function() {
var idleTime = 0;

function resetIdleTime() {
    idleTime = 0;
}

document.addEventListener("mousemove", resetIdleTime);
document.addEventListener("keypress", resetIdleTime);

setInterval(function() {
    idleTime++;
    if (idleTime >= 60) {
        window.location.href = "video.html";
    }
}, 10000);

var idleTimee = 0;

function resetIdleTimee() {
    idleTimee = 0;
}

document.addEventListener("mousemove", resetIdleTimee);
document.addEventListener("keypress", resetIdleTimee);

setInterval(function() {
    idleTimee++;
    if (idleTimee >= 30) {
        window.location.href = "datang.html";
    }
}, 10000);

});

// document.addEventListener("DOMContentLoaded", function() {
//     var idleTime = 0;
    
//     function resetIdleTime() {
//         idleTime = 0;
//     }
    
//     document.addEventListener("mousemove", resetIdleTime);
//     document.addEventListener("keypress", resetIdleTime);
    
//     setInterval(function() {
//         idleTime++;
//         if (idleTime >= 60) {
//             window.location.href = "video.html";
//         }
//     }, 1000);
    
//     function restartAnimations() {
//         var elements = document.querySelectorAll('[data-animate]');
//         for(const el of Array.from(elements)) {
//             const animateClass = el.dataset.animate
//             el.classList.remove(animateClass)
//             requestAnimationFrame(() => {
//                 el.classList.add(animateClass)
//             })
//         }
//     }
    
//         setInterval(restartAnimations, 2000);
//     });
