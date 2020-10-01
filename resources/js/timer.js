// The data/time we want to countdown to
var countDownDate = new Date("Sep 8, 2020 16:00:00").getTime();

// Run myfunc every second
var myfunc = setInterval(function() {

var now = new Date().getTime();
var timeleft = countDownDate - now;
    
// Calculating the days, hours, minutes and seconds left
var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
    
// Result is output to the specific element
document.getElementById("days").innerHTML = days
document.getElementById("hours").innerHTML = hours 
document.getElementById("minutes").innerHTML = minutes  
document.getElementById("seconds").innerHTML = seconds
    
// Display the message when countdown is over
if (timeleft < 0) {
    clearInterval(myfunc);
    document.getElementById("days").innerHTML = "0"
    document.getElementById("hours").innerHTML = "0" 
    document.getElementById("minutes").innerHTML = "0"
    document.getElementById("seconds").innerHTML = "0"
}
}, 1000);