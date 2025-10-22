<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Dashboard — Students</title>
  <link rel="stylesheet" href="student.css">
</head>
<body>
  <div class="container">
    
     <!-- SIDEBAR -->
<aside class="sidebar">
  <div class="logo-section">
    <img src="duwidapdap.school.png" alt="School Logo" class="logo">
    <p class="school-subtitle">Duwidapdap National High School</p> <!-- Added subtitle -->
  </div>
  <nav class="nav-links">
    <button onclick="showSection('home')">Home</button>
    <button onclick="showSection('students')" class="active">Students</button>
    <button onclick="showSection('attendance')" >Attendance</button>
    <button onclick="showSection('subject')" >Subject</button>
    <button onclick="showSection('teacher')" >Teacher</button>
    <button onclick="showSection('settings')" >Settings</button>
  </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <header>
        <h1>Manage Students</h1>
      </header>

      <!-- STUDENTS SECTION -->
      <section id="students" class="page active">
        <!-- Top Controls -->
        <div class="top-controls">
          <input type="text" id="searchStudent" placeholder="🔍 Search student..." onkeyup="searchStudent()">
          <select id="filterClass" onchange="filterStudentByClass()">
            <option value="All">All Classes</option>
          </select>
        </div>

        <!-- Add Student Form -->
        <div class="student-form-grid">
          <input type="text" id="studentFullName" placeholder="Full Name">
          <input type="text" id="studentGrade" placeholder="Grade Level">
          <select id="studentClass">
            <option value="">Select Class</option>
          </select>
          <select id="studentGender">
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
          </select>
          <input type="text" id="studentAddress" placeholder="Address">
          <input type="text" id="guardianName" placeholder="Guardian Name">
          <input type="text" id="guardianContact" placeholder="Contact No.">
          <button onclick="addStudent()">+ Add Student</button>
        </div>

        <!-- Student Table -->
        <table class="class-table" id="studentTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Grade</th>
              <th>Class</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Guardian</th>
              <th>Contact</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="studentList">
            <!-- Dynamic rows will appear here -->
          </tbody>
        </table>
      </section>
    </main>
  </div>

  <script > let students = [];
let classes = JSON.parse(localStorage.getItem("classes")) || [];

// 🧠 Populate class dropdowns dynamically
window.onload = function() {
  const classSelect = document.getElementById("studentClass");
  const filterSelect = document.getElementById("filterClass");

  classes.forEach(cls => {
    const option = document.createElement("option");
    option.value = cls.className;
    option.textContent = cls.className;
    classSelect.appendChild(option);

    const filterOption = option.cloneNode(true);
    filterSelect.appendChild(filterOption);
  });
};

/* ➕ Add New Student */
function addStudent() {
  const name = document.getElementById("studentFullName").value;
  const grade = document.getElementById("studentGrade").value;
  const className = document.getElementById("studentClass").value;
  const gender = document.getElementById("studentGender").value;
  const address = document.getElementById("studentAddress").value;
  const guardian = document.getElementById("guardianName").value;
  const contact = document.getElementById("guardianContact").value;

  if (!name || !grade || !className) {
    alert("⚠️ Please fill in required fields.");
    return;
  }

  const newStudent = { name, grade, className, gender, address, guardian, contact };
  students.push(newStudent);
  localStorage.setItem("students", JSON.stringify(students));
  renderStudents();
  clearStudentForm();
}

/* 🧾 Display Students */
function renderStudents() {
  const tbody = document.getElementById("studentList");
  tbody.innerHTML = "";

  const stored = JSON.parse(localStorage.getItem("students")) || [];
  stored.forEach((s, i) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${s.name}</td>
      <td>${s.grade}</td>
      <td>${s.className}</td>
      <td>${s.gender}</td>
      <td>${s.address}</td>
      <td>${s.guardian}</td>
      <td>${s.contact}</td>
      <td>
        <button class="edit-btn" onclick="editStudent(${i})">✏️</button>
        <button class="delete-btn" onclick="deleteStudent(${i})">🗑</button>
      </td>`;
    tbody.appendChild(tr);
  });
}

/* 🗑 Delete Student */
function deleteStudent(i) {
  if (confirm("Are you sure you want to delete this student?")) {
    const stored = JSON.parse(localStorage.getItem("students")) || [];
    stored.splice(i, 1);
    localStorage.setItem("students", JSON.stringify(stored));
    renderStudents();
  }
}

/* 🔍 Search Student */
function searchStudent() {
  const filter = document.getElementById("searchStudent").value.toLowerCase();
  const rows = document.querySelectorAll("#studentList tr");
  rows.forEach(row => {
    const name = row.cells[0].textContent.toLowerCase();
    row.style.display = name.includes(filter) ? "" : "none";
  });
}

/* 🧭 Filter by Class */
function filterStudentByClass() {
  const selected = document.getElementById("filterClass").value;
  const rows = document.querySelectorAll("#studentList tr");
  rows.forEach(row => {
    const className = row.cells[2].textContent;
    row.style.display = selected === "All" || className === selected ? "" : "none";
  });
}

/* 🧹 Clear form */
function clearStudentForm() {
  document.querySelectorAll(".student-form-grid input").forEach(i => i.value = "");
  document.querySelectorAll(".student-form-grid select").forEach(s => s.value = "");
}
 </script>
</body>
</html>
