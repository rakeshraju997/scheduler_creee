const date = new Date();

const renderCalendar = (booked,selectedCat) => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");
  
  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];  


  function checkBooked(checkDays){
    for(var key in booked) {
      if (booked.hasOwnProperty(key)) {
        // console.log(booked[key].date,checkDays,booked[key].count);
        if(booked[key].date == checkDays){
          if(selectedCat == booked[key].category && parseInt(booked[key].count)<3){
            return null;
          }else {
            return booked[key].category;
          }
          
        }
      }
    }
  }

  console.log(selectedCat);

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = new Date().toDateString();

  let days = "";

  for (let x = firstDayIndex; x > 0; x--) {
    days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
  }
  let counter=0;
  for (let i = 1; i <= lastDay; i++) {
    
    let j= ("0"+i).slice(-2);
    let bookedStatus=checkBooked('2021-0'+(date.getMonth()+1)+'-'+j);
    // console.log(bookedStatus);
    if(bookedStatus == 3){
      counter = 3;
    }else if(bookedStatus == 2){
      counter = 1  ;
    }else if(bookedStatus == 1){
      counter = 1  ;
     }
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
        if(counter >0 ){
          days += `<div class="booked">${i}</div>`;
          counter--;
        }else{
          days += `<div class="today">${i}</div>`;
        }
    } else if(counter > 0){
      days += `<div class="booked">${i}</div>`;
      counter--;
    }else{
      days += `<div class="day" value="${i}" >${i}</div>`;
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">${j}</div>`;
    monthDays.innerHTML = days;
  }
  // document.getElementById('model').innerHTML = loadPage('./assets/common/model.html');
  const element = document.querySelectorAll(".day").forEach( item =>{
    item.addEventListener("click", () => {
      console.log($().jquery);
      console.log(selectedCat);
      console.log(item.getAttribute('value')+'-'+ (date.getMonth()+1) + '-2021');
      document.querySelector('#titleDate').append=months[date.getMonth()]+item.getAttribute('value')+',2021';
    });
  });
};

// function loadPage(href)
//   {
//       var xmlhttp = new XMLHttpRequest();
//       xmlhttp.open("GET", href, false);
//       xmlhttp.send();
//       return xmlhttp.responseText;
//   }

document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

renderCalendar();
