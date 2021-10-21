var timeFormat12 = true;

function startTime() {
  const today = new Date();

  var weekdayNum = today.getDay(),//day of the week
      month = today.getMonth(),
      date = today.getDate(),//date
      year = today.getFullYear(),
      hours = today.getHours(),
      minutes = today.getMinutes(),
      seconds = today.getSeconds(),
      period = timeFormat12 ? "AM" : "";//if(timeFormat12) {period=AM}else{period=null}

    if(timeFormat12) {
      if(hours >= 12)
      {
        period = 'PM';//else, stays AM because of loop
      }
      if(hours == 0)
      {
        hours = 12;
      }
      if(hours > 12)
      {
        hours = hours - 12;
      }
    }

  //date
  var days = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];//A list
  month = checkFormat(month);//calls the function to add a zero
  date = checkFormat(date);//calls the function to add a zero
  document.getElementById('date').innerHTML = days[weekdayNum] + " " + year + "-" + month + "-" + date;

  //time
  hours = checkFormat(hours);//calls the function to add a zero
  minutes = checkFormat(minutes);//calls the function to add a zero
  seconds = checkFormat(seconds);//calls the function to add a zero
  document.getElementById('time').innerHTML = hours + ":" + minutes + ":" + seconds + " " + period;
  setTimeout(startTime, 1000);

}

function checkFormat(i) {
if (i < 10) {i = "0" + i};  // add zero in front of numbers(second or minute) < 10
return i;
}

function changeTimeFormat(button) {
    button.classList.toggle("selected");
    timeFormat12 = !timeFormat12;
    startTime();
}

function hideDate(button) {
  button.classList.toggle("selected");
  document.getElementById("date").classList.toggle("hide");
}