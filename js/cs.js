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
