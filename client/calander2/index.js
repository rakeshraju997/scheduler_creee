

const days=document.getElementById('days');

const isWeekend = day =>{
    return day % 7 === 0 || day % 7 === 6 ;
}

// const getDayName = day =>{
//     const date = new Date(Date.UTC(2018, 0, day));
//     return new Intl.DateTimeFormat(en-US,{ weekday: "short" }).format(date);
// }

const isNotValidDay = day =>{
    return false ;
}

for(let day=1; day <=31 ; day++){

    const weekend = isWeekend(day);
    const notValid = isNotValidDay(day);

    days.insertAdjacentHTML('beforeend', `<label class='day ${weekend ? "weekend" : ""} ${notValid ? "invalid" : ""}' data-day='22'><input class='appointment' date-day='18' placeholder='What would you like to do?' required='true' type='text'><span>${day}</span><em></em></label>`);
}