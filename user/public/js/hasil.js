// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
   list.forEach((item) => {
      item.classList.remove("hovered");
   });
   this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouser", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
   navigation.classList.toggle("active");
   main.classList.toggle("active");
};

// jam
// To run the function on load
document.getElementById("txt").addEventListener("load", startTime());

function startTime() {
   var today = new Date();
   var h = today.getHours();

   // To print AM/PM and 12 hour format  
   if (h > 12) {
      var meridiem = "PM";
      h = h - 12;
   } else {
      meridiem = "AM";
   }

   var m = today.getMinutes();

   // add a zero in front of numbers<10
   h = checkTime(h);
   m = checkTime(m);

   document.getElementById("txt").innerHTML = h + ":" + m + " " + meridiem;

   // To update time every second
   var t = setTimeout(function () {
      startTime()
   }, 1000);
}

function checkTime(i) {
   if (i < 10) {
      i = "0" + i;
   }
   return i;
}


// end jam

// tanggal
const date = document.getElementById("date");
const day = document.getElementById("day");
const month = document.getElementById("month");
const year = document.getElementById("year");

const today = new Date();

const weekDays = [
   "Sun",
   "Mon",
   "Tue",
   "Wed",
   "Thu",
   "Fri",
   "Sat"
];

const allMonths = [
   "Jan",
   "Feb",
   "Mar",
   "Apr",
   "May",
   "Jun",
   "Jul",
   "Aug",
   "Sep",
   "Oct",
   "Nov",
   "Dec"
];

date.innerHTML = (today.getDate() < 10 ? "0" : "") + today.getDate();
day.innerHTML = weekDays[today.getDay()];
month.innerHTML = allMonths[today.getMonth()];
year.innerHTML = today.getFullYear();
// end tanggal


// range

function rangeSlide(value) {
   document.getElementById("rangeValue").innerHTML = value;
}

// MODAL BOX
// Get the modal
const modal = document.getElementById("myModal");

// Get the button that opens the modal
const btns = document.querySelectorAll("#myBtn");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btns.forEach(function (btn) {
   btn.addEventListener("click", function () {
      modal.style.display = "block";
   });
});

// When the user clicks on <span> (x), close the modal
span.addEventListener("click", function () {
   modal.style.display = "none";
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
   if (event.target == modal) {
      modal.style.display = "none";
   }
}

// Mengambil ID dari laporan yg ingin di ubah
const dataSpans = document.querySelectorAll('.btn');

// Tambahkan event listener ke setiap elemen
dataSpans.forEach(span => {
   span.addEventListener('click', () => {
      const dataId = span.getAttribute('data-id'); // Ambil nilai data-id dari elemen
      console.log(`Nilai Data-ID: ${dataId}`);
   });
});
