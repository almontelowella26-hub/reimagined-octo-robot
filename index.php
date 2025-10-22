<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Duwidapdap National High School Attendance System</title>
<style>
  :root {
  --red: #8b0000;
  --white: #ffffff;
  --light-red: #b22222;
  --gray: #f8f8f8;
}

/* Universal Reset */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
}

/* Layout */
.container {
  display: flex;
  height: 100vh;
  background-color: var(--gray);
}

/* SIDEBAR */
.sidebar {
  width: 250px;
  background-color: var(--red);
  color: var(--white);
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px 10px;
}

/* Logo section remains the same */
.logo-section {
  text-align: center;
  margin-bottom: 10px; /* space between logo and school name */
  display: flex;
  flex-direction: column;
  align-items: center;
}

.logo-section img {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 3px solid var(--white);
  margin-bottom: 15px; /* space between logo and main school name */
}

.logo-section h2 {
  margin: 0;
  font-size: 1.2rem;
  color: var(--white);
}

.school-subtitle {
  font-size: 0.9rem;
  color: #fff;
  margin-top: 5px;
  font-weight: 400;
  text-align: center;
}

/* NAVIGATION */
.nav-links {
  display: flex;
  flex-direction: column;
  width: 100%;
  margin-top: 30px; /* moves nav buttons down from school name */
}

.nav-links button {
  background: transparent;
  color: var(--white);
  border: none;
  text-align: left;
  padding: 15px 20px; /* increased padding for more spacing */
  font-size: 1rem;
  cursor: pointer;
  border-radius: 8px;
  transition: background 0.3s ease;
  margin-bottom: 10px; /* adds vertical spacing between buttons */
}

.nav-links button:hover,
.nav-links button.active {
  background: var(--white);
  color: var(--red);
}


.logo-section {
  text-align: center;
  margin-bottom: 40px;
}

.logo-section img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 3px solid var(--white);
  margin-bottom: 10px;
}

.logo-section h2 {
  font-size: 1.1rem;
  font-weight: 600;
  color: var(--white);
}

/* Navigation */
.nav-links {
  display: flex;
  flex-direction: column;
  width: 100%;
}

.nav-links button {
  background: transparent;
  color: var(--white);
  border: none;
  text-align: left;
  padding: 12px 20px;
  font-size: 1rem;
  cursor: pointer;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.nav-links button:hover,
.nav-links button.active {
  background: var(--white);
  color: var(--red);
}

/* ===== MAIN CONTENT ===== */
.main-content {
  flex: 1;
  margin-left: 250px;
  background-color: var(--white);
  color: var(--red);
  padding: 30px;
  overflow-y: auto;
}

header {
  border-bottom: 3px solid var(--red);
  margin-bottom: 20px;
  padding-bottom: 10px;
}

h1 {
  font-size: 1.8rem;
  color: var(--red);
}

/* Page Transition */
.page {
  display: none;
  animation: fadeIn 0.4s ease;
}

.page.active {
  display: block;
}

/* ===== HOME PAGE ===== */
.home-content {
  text-align: center;
}

/* Dashboard cards */
.dashboard {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
  margin-top: 20px;
}

.card {
  background: var(--white);
  border: 2px solid var(--red);
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
  width: 220px;
  text-align: center;
  font-weight: 600;
  transition: 0.3s ease;
}

.card:hover {
  background: var(--red);
  color: var(--white);
  transform: scale(1.05);
}

/* Announcements Section */
.announcement {
  background: var(--gray);
  border-left: 5px solid var(--red);
  border-radius: 10px;
  padding: 20px;
  margin: 30px auto;
  width: 80%;
  text-align: left;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.announcement h3 {
  color: var(--red);
  margin-bottom: 10px;
}

.announcement ul {
  list-style: none;
}

.announcement li {
  padding: 8px 0;
  border-bottom: 1px solid #ddd;
}

/* ===== CALENDAR ===== */
.calendar-container {
  margin: 30px auto;
  width: 80%;
  background: var(--white);
  border: 2px solid var(--red);
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

.calendar-container iframe {
  width: 100%;
  height: 400px;
  border: none;
}

/* Animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

/*classes page*/
:root {
  --red: #8b0000;
  --white: #ffffff;
  --light-red: #b22222;
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
}

.container {
  display: flex;
  height: 100vh;
  background-color: var(--white);
}

/* Sidebar */
.sidebar {
  width: 250px;
  background-color: var(--red);
  color: var(--white);
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px 10px;
}

.logo-section {
  text-align: center;
  margin-bottom: 30px;
}

.logo-section img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 3px solid var(--white);
  margin-bottom: 10px;
}

.logo-section h2 {
  font-size: 1.1rem;
  font-weight: 600;
}

/* Navigation */
.nav-links {
  display: flex;
  flex-direction: column;
  width: 100%;
}

.nav-links button {
  background: transparent;
  color: var(--white);
  border: none;
  text-align: left;
  padding: 12px 20px;
  font-size: 1rem;
  cursor: pointer;
  border-radius: 8px;
  transition: background 0.3s ease;
}

.nav-links button:hover,
.nav-links button.active {
  background: var(--white);
  color: var(--red);
}

/* Main Content */
.main-content {
  flex: 1;
  background-color: var(--white);
  color: var(--red);
  padding: 30px;
  overflow-y: auto;
}

header {
  border-bottom: 3px solid var(--red);
  margin-bottom: 20px;
  padding-bottom: 10px;
}

/* Dashboard Cards */
.dashboard {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

.card {
  background-color: var(--white);
  border: 2px solid var(--red);
  border-radius: 8px;
  padding: 20px;
  text-align: center;
  width: 180px;
  color: var(--red);
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
}

.card span {
  display: block;
  font-weight: bold;
  font-size: 1.2rem;
  margin-top: 5px;
}

/* Announcements */
.announcement {
  background: var(--white);
  border: 2px solid var(--red);
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
}

.announcement h3 {
  margin-bottom: 10px;
}

.announcement ul {
  list-style: none;
}

.announcement li {
  padding: 8px 0;
  border-bottom: 1px solid #ddd;
  color: #333;
}

/* Classes */
.add-class-form {
  display: flex;
  gap: 10px;
  margin-bottom: 15px;
}

.add-class-form input {
  flex: 1;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.add-class-form button {
  background: var(--red);
  color: var(--white);
  border: none;
  padding: 10px 15px;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
}

.add-class-form button:hover {
  background: var(--light-red);
}

/* Table */
.class-table {
  width: 100%;
  border-collapse: collapse;
}

.class-table th,
.class-table td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: center;
}

.class-table th {
  background-color: var(--red);
  color: var(--white);
}

.class-table tr:hover {
  background-color: #f9f9f9;
}

/* Animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

</style>
</head>
<body>

  <div class="container">
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="logo-section">
        <img src="duwidapdap.school.png" alt="School Logo" class="logo" />
        <h2>Duwidapdap National High  School</h2>
      </div>

      <nav class="nav-links">
  <button onclick="showSection('home')" class="active">Home</button>
  <button onclick="showSection('students')">Students</button>
  <!-- <button onclick="showSection('students')">Students</button> --> <!-- removed -->

    <button class="menu-button" onclick="window.location.href='attendance.php'">Attendance</button>
  <button onclick="showSection('subject')">Subject</button>
  <button onclick="showSection('Teacher')">Teacher</button>
  <button onclick="showSection('settings')">Settings</button>
</nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
      <header>
        <h1>Student Attendance System</h1>
      </header>

      <!-- HOME PAGE -->
      <section id="home" class="page active">
        <div class="home-content">
          <h2>Welcome, Ms. Dmahal!</h2>

          <div class="dashboard">
            <div class="card">Manage Classes</div>
            <div class="card">Mark Attendance</div>
            <div class="card">Generate Reports</div>
            <div class="card">Add Announcements</div>
          </div>

          <div class="announcement">
            <h3>📢 Announcements</h3>
            <ul>
              <li>Faculty meeting on Monday, 9 AM.</li>
              <li>Submit attendance reports by Friday.</li>
              <li>School event on October 25. </li>
            </ul>
          </div>

          <!-- Calendar -->
          <div class="calendar-container">
            <h3>🗓 School Calendar</h3>
            <iframe 
              src="https://calendar.google.com/calendar/embed?src=en.philippines%23holiday%40group.v.calendar.google.com&ctz=Asia%2FManila"
              style="border:0"
              frameborder="0"
              scrolling="no">
            </iframe>
          </div>
        </div>
      </section>

      <!-- CLASSES PAGE -->
      <section id="classes" class="page">
        <h2>Manage Classes</h2>
        <p>Create, update, or delete class records.</p>
      </section>

      <!-- STUDENTS PAGE -->
      <section id="students" class="page">
        <h2>View Students</h2>
        <input type="text" id="studentName" placeholder="Enter student name" />
        <button onclick="addStudent()">Add Student</button>
        <ul id="studentList"></ul>
      </section>

      <!-- ATTENDANCE PAGE -->
      <section id="attendance" class="page">
        <h2>Mark Attendance</h2>
        <p>Record daily attendance by class or student.</p>
      </section>

      <!-- REPORTS PAGE -->
      <section id="reports" class="page">
        <h2>Generate Reports</h2>
        <p>View daily, weekly, or monthly attendance summaries.</p>
      </section>

      <!-- SETTINGS PAGE -->
      <section id="settings" class="page">
        <h2>Settings</h2>
        <p>Adjust teacher profile and preferences.</p>
      </section>

    </main>
  </div>

  <script > function showSection(id) {
  document.querySelectorAll(".page").forEach(sec => sec.classList.remove("active"));
  document.getElementById(id).classList.add("active");

  document.querySelectorAll(".nav-links button").forEach(btn => btn.classList.remove("active"));
  document.querySelector(`.nav-links button[onclick="showSection('${id}')"]`).classList.add("active");
}

function addStudent() {
  const nameInput = document.getElementById("studentName");
  const name = nameInput.value.trim();
  if (name === "") return;

  const list = document.getElementById("studentList");
  const li = document.createElement("li");
  li.textContent = name;

  const delBtn = document.createElement("button");
  delBtn.textContent = "Delete";
  delBtn.onclick = () => li.remove();

  li.appendChild(delBtn);
  list.appendChild(li);
  nameInput.value = "";

  function showSection(id) {
  document.querySelectorAll(".page").forEach(sec => sec.classList.remove("active"));
  document.getElementById(id).classList.add("active");

  document.querySelectorAll(".nav-links button").forEach(btn => btn.classList.remove("active"));
  document.querySelector(`.nav-links button[onclick="showSection('${id}')"]`).classList.add("active");
}

// Removed addStudent function entirely

}
</script>
</body>
</html>
