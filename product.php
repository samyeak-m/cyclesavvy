<?php
$currentPage = 'home';
include "header.php";
?>
<!DOCTYPE html>
<head>

	<style>
		<?php include "css/product.css"; ?>
	</style>
</head>
<body>

<div class="main">
	<section class="product">

	<div class="product-v">

<a class="product-pop-detail" onclick="openModal(this)" style="width: auto;">
<figure class="product-button">
			<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>
	</a>
  <div id="product-pop" class="product-modal">
    <div class="product-container product-animated" id="product-container">
      <span onclick="closeModal(this)" class="product-close">&times;</span>
      
      <div class="product-view">
        <div class="product-photo">
          <img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one">
        </div>

        <div class="product-detail">
          <h2 class="product-head">Cycle Name</h2>
          <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores veniam minima harum blanditiis voluptas optio ipsum quibusdam molestiae ea voluptate tempore, amet dolorum aliquam incidunt natus voluptatem, molestias voluptates. Dolores illo unde quae repudiandae dolorum, quam consequatur impedit nobis obcaecati.</p>
          

          <div class="product-review">
            
            <div class="review-high">
            <h4 class="review-user">Top user</h4>

              <div class="review-top">
                <img src="photo/user.png" alt="top" class="top-img">
                <h5 class="review-name">Name1</h5>
              </div>

              <div class="review-top">
                <img src="photo/user.png" alt="top" class="top-img">
                <h5 class="review-name">Name2</h5>
              </div>
            </div>

            <div class="review-low">
            <h4 class="review-user">Aveage user</h4>

              <div class="review-short">
                <img src="photo/user.png" alt="short" class="review-img">
                <h5 class="review-name">Name3</h5>
              </div>

              <div class="review-short">
                <img src="photo/user.png" alt="short" class="review-img">
                <h5 class="review-name">Name4</h5>
              </div>
            

            </div>
          </div>
        
          <div class="product-booking">
			<div class="booking-date">		
				<div class="datetime-picker">
					<div class="date-picker">
						<input id="date-input" class="date-input" placeholder="Choose a hire date" readonly>
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
            <h5 class="product-price">Rs 1,000</h5>
            <button type="submit" id="book-now-button"><h3 class="product-book">Book Now</h3></button>
          </div>

		  </div>
      </div>
    </div>
  </div>

  </div>
	
  </section>
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


function openModal(element) {
      var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      if (width > 780) {
        var modal = element.nextElementSibling;
        if (modal && modal.classList.contains("product-modal")) {
          modal.style.display = "flex";
        }
      } else {
        window.location.href = "productmobile.php";
      }
    }

    function closeModal(element) {
      var modal = element.parentElement;
      if (modal && modal.classList.contains("product-modal")) {
        modal.style.display = "none";
      }
    }

    var modals = document.querySelectorAll(".product-modal");

    window.addEventListener("click", function (event) {
      modals.forEach(function (modal) {
        if (event.target === modal || event.target.classList.contains("product-close")) {
          modal.style.display = "none";
        }
      });
    });

    // Add this event listener to the "Book Now" button
document.getElementById('book-now-button').addEventListener('click', () => {
  window.location.href = 'product.php';
});

	</script>
	
</body>
</html>

<?php include "footer.php";
?>