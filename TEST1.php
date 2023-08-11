<?php include"header.php"?>

<html>
<head>
  <style>
    *{
    margin: 0;
    padding: 0;
}

body{
    margin: 0;
    padding: 0;
}

.product-mobile{
    display: flex;
    flex-flow: row nowrap;
    width: 100vw;
    height: autp;
    justify-content: center;
    align-items: center;
    padding-top: 50px;
}

.product-view{
    display: flex;
    flex-flow:column nowrap;
    justify-content: center;
    align-items: center;
    width: 90vw;
    height: auto;
    overflow: scroll;
  
  }
  
  .product-photo{
    
    width: auto;
    height: auto;
    margin-inline:0;
  }
  
  .product-photo > img{
    
    width: 80vw;
    height: auto;
    aspect-ratio: 1.5/1;
    object-fit: scale-down;
    mix-blend-mode: multiply;
      
  }
  
  .product-detail{
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: start;
    margin-top: .5rem;
  }
  
  .product-head{
    font: 28px 'poppins semibold';
    color: black;
    font-weight: 700;
    margin: 0;
    padding: 0;
    margin-bottom: .5rem;
  }
  
  .product-desc{
    font: 14px 'poppins';
    color: black;
    font-weight: 500;
    margin: 0;
    padding: 0;
    padding-right:1.5rem ;
    margin-bottom: 1rem;
    /* text-align: justify; */
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    white-space: pre-wrap;
  }
  
  .product-review{
    display: flex;
    flex-flow: row nowrap;
    align-items: center;
    width: 100%;
    max-width: 300px;
    justify-content:space-between;
  
  }
  .review-user{
    font: 20px 'poppins medium';
    color: #129948;
    font-weight: 600;
    margin: 1rem 0;
  }
  
  .review-high,.review-low{
    display: flex;
    flex-flow: column nowrap;
    margin: 0;
    padding: 0;
    margin-block:1rem ;
  }
  
  .review-top,.review-short{
    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
    margin-block:1rem ;
  
  }
  
  .product-review img{
    width: 30px;
    height: auto;
    margin: 0;
    padding: 0;
    margin-right:0.5rem;
  }
  
  .review-name{
    font: 16px 'poppins';
    color: black;
    font-weight: 600;
    margin: 0;
    padding: 0;
  }
  
  .product-booking{
    margin: 0;
    padding: 0;
  
  }
  
  .product-price{
    font: 24px 'poppins semibold';
    color: #129948;
    font-weight: 800;
    margin: 0;
    padding: 0;
    margin-bottom: 1rem;
    margin-left: .3rem;
  }
  
  .product-booking button[type="submit"]{
    font: 16px 'poppins medium';
    background-color:#129948 ;
    border: 2px solid #129948;
    border-radius: 12px;
    color: white;
    padding: 5px 10px;
  }
  
  .product-book{
    padding: 0;
    margin: 0;
  }
  
  .datetime-picker {
    display: inline-flex;
  }
  
  .date-picker {
    position: relative;
  }

  .prev-btn,
.next-btn {
    border: none;
    background-color: transparent;
    position: absolute;
    font-size: 16px;
    cursor: pointer;
    color: #129948;
    font-weight: 800;

}

.prev-btn:hover,
.next-btn:hover{
    color: #000;

}

.prev-btn {
  left: 50px;
}

.next-btn {
  right: 50px;
}
  
  .date-input {
    padding: 5px 10px;
    margin: 0 10px 10px 0;
    border: 2px solid #129948;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-family: "poppins";
    color: #333;
  }
  
  .calendar {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    border: 2px solid #129948;
    border-radius: 8px;
    background-color: #fff;
    padding: 15px;
    font-family: "poppins", sans-serif; /* Match your website's font */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 999; /* Ensure the date picker is on top of other elements */
  }
  
  .calendar-header {
    text-align: center;
    font-weight: bold;
    margin-bottom: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    color: #129948; /* Match your website's highlight color */
  }
  
  .calendar-header span {
    margin: 0 20px;
  }
  
  .calendar-body {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 10px;
  }
  
  .calendar-day {
    text-align: center;
    line-height: 30px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #333; /* Match your website's text color */
  }
  
  .calendar-day:hover {
    background-color: #f2f2f2;
  }
  
  .disabled {
    cursor: default;
    opacity: 0.5; /* Past dates will have reduced opacity */
  }
  
  .today {
    background-color: #eee;
    color: #129948;
  }
  
  .selected {
    background-color: #129948; /* Match your website's highlight color */
    color: #fff;
  }
  
  </style>
</head>

<body>
     
<div class="product-mobile">
<div class="product-view">
    <div class="product-photo">
        <img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" />
    </div>

    <div class="product-detail">
            <h5 class="product-price">Rs 1,000</h5>
    
        <h2 class="product-head">Cycle Name</h2>
        <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores veniam minima harum blanditiis voluptas optio ipsum quibusdam molestiae ea voluptate tempore, amet dolorum aliquam incidunt natus voluptatem, molestias
            voluptates. Dolores illo unde quae repudiandae dolorum, quam consequatur impedit nobis obcaecati.
        </p>

        <div class="product-booking">
			<div class="booking-date">		
				<div class="datetime-picker">
					<div class="date-picker">
          <input  class="date-input" id="date-input" name="booking-date" placeholder="Choose a Booking date"  autocomplete="off" required>
						<div class="calendar" id="calendar">
							<div class="calendar-header">
							<button class="prev-btn date-btn" onclick="prevMonth()">&lt;</button>
							<span id="current-month-year"></span>
							<button class="next-btn date-btn" onclick="nextMonth()">&gt;</button>
							</div>
							<div class="calendar-body">
							<!-- Days of the week labels will be added dynamically in JavaScript -->
							</div>
						</div>
					</div>
				</div>
			</div>
      <button type="submit" class="product-book-now-button" onclick="handleBooking()">
      <h3 class="product-book">Book Now</h3>
    </button>
          </div>
    

        <div class="product-review">
         
            <div class="review-high">
            <h4 class="review-user">Top user</h4>
                <div class="review-top">
                    <img src="photo/user.png" alt="top" class="top-img" />
                    <h5 class="review-name">Name1</h5>
                </div>

                <div class="review-top">
                    <img src="photo/user.png" alt="top" class="top-img" />
                    <h5 class="review-name">Name2</h5>
                </div>
            </div>

            <div class="review-low">
            <h4 class="review-user" style="margin-left:20px">Aveage user</h4>
                <div class="review-short">
                    <img src="photo/user.png" alt="short" class="review-img" />
                    <h5 class="review-name">Name3</h5>
                </div>

                <div class="review-short">
                    <img src="photo/user.png" alt="short" class="review-img" />
                    <h5 class="review-name">Name4</h5>
                </div>
            </div>
        </div>

        </div>
</div>
</div>

<script>
const dateInput = document.getElementById('date-input');
const calendar = document.getElementById('calendar');
const calendarBody = calendar.querySelector('.calendar-body');
const currentMonthYear = document.getElementById('current-month-year');

let currentDate = new Date();

function toggleCalendar() {
  calendar.style.display = calendar.style.display === 'block' ? 'none' : 'block';
}

function handleDateSelection(selectedDate) {
  const formattedSelectedDate = new Date(selectedDate);
  if (!isDateDisabled(formattedSelectedDate)) {
    formattedSelectedDate.setUTCHours(0, 0, 0, 0); // Set hours, minutes, seconds, and milliseconds to zero
    dateInput.value = formattedSelectedDate.toISOString().slice(0, 10); // Convert to ISO string to set the input value
    currentDate = formattedSelectedDate; // Update currentDate to the selected date
    createCalendar(); // Rebuild the calendar with the selected date
  }
  toggleCalendar();
}

function getDaysInMonth(year, month) {
  return new Date(year, month + 1, 0).getDate();
}

function getFirstDayOfMonth(year, month) {
  return new Date(year, month, 1).getDay();
}

function isDateDisabled(date) {
  const today = new Date();
  return date < today;
}

function createCalendar() {
  const year = currentDate.getFullYear();
  const month = currentDate.getMonth();
  const daysInMonth = getDaysInMonth(year, month);
  const firstDayOfMonth = getFirstDayOfMonth(year, month);
  const monthName = new Intl.DateTimeFormat('en-US', { month: 'long' }).format(currentDate);

  currentMonthYear.textContent = `${monthName} ${year}`;

  let calendarContent = '';

  const dayOfWeekNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  for (const dayName of dayOfWeekNames) {
    calendarContent += `<div class="calendar-day day-of-week">${dayName}</div>`;
  }

  for (let i = 0; i < firstDayOfMonth; i++) {
    calendarContent += '<div class="calendar-day disabled"></div>';
  }

  for (let i = 1; i <= daysInMonth; i++) {
    const formattedDate = new Date(Date.UTC(year, month, i));
    const isDisabled = isDateDisabled(formattedDate) ? 'disabled' : '';
    const isToday = currentDate.toDateString() === formattedDate.toDateString() ? 'today' : '';
    const isSelected = dateInput.value === formattedDate.toISOString().slice(0, 10) ? 'selected' : '';

    const clickHandler = isDisabled ? '' : `onclick="handleDateSelection('${formattedDate.toISOString().slice(0, 10)}')"`;
    calendarContent += `<div class="calendar-day ${isDisabled} ${isToday} ${isSelected}" ${clickHandler}>${i}</div>`;
  }

  calendarBody.innerHTML = calendarContent;
}

function prevMonth() {
  currentDate.setMonth(currentDate.getMonth() - 1);
  createCalendar();
}

function nextMonth() {
  currentDate.setMonth(currentDate.getMonth() + 1);
  createCalendar();
}

dateInput.addEventListener('click', () => {
  toggleCalendar();
});

createCalendar();

document.addEventListener('click', (event) => {
  if (!calendar.contains(event.target) && event.target !== dateInput) {
    calendar.style.display = 'none';
  }
});

document.addEventListener('keydown', (event) => {
  if (event.key === 'Escape') {
    calendar.style.display = 'none';
  }
});

function handleBooking() {
    var bookingDate = document.getElementById('date-input').value;
    console.log(bookingDate);
    
    if (bookingDate=='') {
        alert("Please choose a booking date.");
        console.log('uncheck');
    } else {
      alert("booking date confirm.");
      console.log('check');

        // window.location.href = 'confirmation.php';
    }
}


</script>

</body>

</html>