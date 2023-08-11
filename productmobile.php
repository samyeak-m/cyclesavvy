<?php
$currentPage = 'home';
include"header.php";
?>

<html>
<head>
  <style>
    <?php include "css/productmobile.css"; ?>
  </style>
</head>

<body>
<?php
$id = $_GET['id'];
include "dbconnect.php";
$q = "SELECT * FROM tbl_inventory WHERE stk_id = $id";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

  echo '

<div class="product-mobile">
<div class="product-view">
    <div class="product-photo">
    <img src="photo/' . $row['photo'] . '" alt="' . $row['name'] . ' Photo">
    </div>

    <div class="product-detail">
    <h5 class="product-price">' . $row['price'] . '</h5>
    
    <h2 class="product-head">' . $row['name'] . '</h2>
    <p class="product-desc">' . $row['description'] . '</p>

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
';

      
      ?>

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
    formattedSelectedDate.setUTCHours(0, 0, 0, 0); 
    dateInput.value = formattedSelectedDate.toISOString().slice(0, 10); 
    currentDate = formattedSelectedDate; 
    createCalendar();
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
