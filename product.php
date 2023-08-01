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
    <?php

include "dbconnect.php";
$q="select * from tbl_inventory";
$result=mysqli_query($con,$q);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){      
  echo '
  <div class="product-v">
      <a class="product-pop-detail" onclick="openModal(this)">
          <figure class="product-button">
              <img src="photo/' . $row['photo'] . '" alt="' . $row['name'] . ' Photo">
              <figcaption><h4>' . $row['name'] . '</h4> <p>' . $row['price'] . '</p></figcaption>
          </figure>
      </a>
      <div class="product-modal">
          <div class="product-container product-animated">
              <span onclick="closeModal(this)" class="product-close">&times;</span>
              <div class="product-view">
                  <div class="product-photo">
                      <img src="photo/' . $row['photo'] . '" alt="' . $row['name'] . ' Photo">
                  </div>
                  <div class="product-wapper">
                  <div class="product-detail">
                      <h2 class="product-head">' . $row['name'] . '</h2>
                      <p class="product-desc">' . $row['description'] . '</p>
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
                              <h4 class="review-user">Average user</h4>
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
                                      <input class="date-input" placeholder="Choose a Booking date" readonly>
                                      <div class="calendar">
                                          <div class="calendar-header">
                                              <button class="prev-btn date-btn" onclick="prevMonth(this)">&lt;</button>
                                              <span class="current-month-year"></span>
                                              <button class="next-btn date-btn" onclick="nextMonth(this)">&gt;</button>
                                          </div>
                                          <div class="calendar-body">
                                              <!-- Days of the week labels will be added dynamically in JavaScript -->
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <h5 class="product-price">' . $row['price'] . '</h5>
                          <button type="submit" class="product-book-now-button" onclick=\"return confirm("Are you sure to delete?")\"><h3 class="product-book">Book Now</h3></button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  ';
}
      
      ?>
      </section>
  </div>

  <script>
    const currentDateArr = [];
    const dateInputs = document.querySelectorAll('.date-input');
    const calendars = document.querySelectorAll('.calendar');
    const bookNowButtons = document.querySelectorAll('.product-book-now-button');
    const dayOfWeekNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    function toggleCalendar(calendar) {
      calendar.style.display = calendar.style.display === 'block' ? 'none' : 'block';
    }

    function handleDateSelection(selectedDate, input, calendar) {
      const formattedSelectedDate = new Date(selectedDate);
      if (!isDateDisabled(formattedSelectedDate)) {
        formattedSelectedDate.setUTCHours(0, 0, 0, 0);
        input.value = formattedSelectedDate.toISOString().slice(0, 10);
        createCalendar(calendar, formattedSelectedDate);
      }
      toggleCalendar(calendar);
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

    function createCalendar(calendar, selectedDate) {
      const year = selectedDate.getFullYear();
      const month = selectedDate.getMonth();
      const daysInMonth = getDaysInMonth(year, month);
      const firstDayOfMonth = getFirstDayOfMonth(year, month);
      const monthName = new Intl.DateTimeFormat('en-US', { month: 'long' }).format(selectedDate);

      calendar.querySelector('.current-month-year').textContent = `${monthName} ${year}`;

      let calendarContent = '';

      for (const dayName of dayOfWeekNames) {
        calendarContent += `<div class="calendar-day day-of-week">${dayName}</div>`;
      }

      for (let i = 0; i < firstDayOfMonth; i++) {
        calendarContent += '<div class="calendar-day disabled"></div>';
      }

      for (let i = 1; i <= daysInMonth; i++) {
        const formattedDate = new Date(Date.UTC(year, month, i));
        const isDisabled = isDateDisabled(formattedDate) ? 'disabled' : '';
        const isToday = selectedDate.toDateString() === formattedDate.toDateString() ? 'today' : '';
        const isSelected = dateInputs[Array.from(calendars).indexOf(calendar)].value === formattedDate.toISOString().slice(0, 10) ? 'selected' : '';

        const clickHandler = isDisabled ? '' : `onclick="handleDateSelection('${formattedDate.toISOString().slice(0, 10)}', this.parentNode.parentNode.previousElementSibling, this.parentNode.parentNode)"`;
        calendarContent += `<div class="calendar-day ${isDisabled} ${isToday} ${isSelected}" ${clickHandler}>${i}</div>`;
      }

      calendar.querySelector('.calendar-body').innerHTML = calendarContent;
    }

    function prevMonth(button) {
      const index = Array.from(bookNowButtons).indexOf(button);
      currentDateArr[index].setMonth(currentDateArr[index].getMonth() - 1);
      createCalendar(calendars[index], currentDateArr[index]);
    }

    function nextMonth(button) {
      const index = Array.from(bookNowButtons).indexOf(button);
      currentDateArr[index].setMonth(currentDateArr[index].getMonth() + 1);
      createCalendar(calendars[index], currentDateArr[index]);
    }

    dateInputs.forEach((input, index) => {
      input.addEventListener('click', () => {
        toggleCalendar(calendars[index]);
      });

      document.addEventListener('click', (event) => {
        if (!calendars[index].contains(event.target) && event.target !== input) {
          calendars[index].style.display = 'none';
        }
      });

      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
          calendars[index].style.display = 'none';
        }
      });

      currentDateArr[index] = new Date();
      createCalendar(calendars[index], currentDateArr[index]);
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

    // Add this event listener to the "Book Now" buttons
    bookNowButtons.forEach((button) => {
      button.addEventListener('click', () => {
        window.location.href = 'product.php';
      });
    });
  </script>

</body>
</html>

<?php include "footer.php"; ?>
