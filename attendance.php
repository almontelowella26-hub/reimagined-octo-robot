<?php
// attendance.php
include 'db.conn.php'; // make sure file name is correct

// Fetch attendance data with computed total_absent
$query = "
  SELECT *,
    ((date_090125='Absent') + (date_090225='Absent') +
     (date_090325='Absent') + (date_090425='Absent') +
     (date_090525='Absent')) AS total_absent
  FROM attendance
";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Attendance System</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
      display: flex;
      height: 100vh;
    }

    .container {
      display: flex;
      width: 100%;
    }

    .sidebar {
      background-color: #8b0000;
      color: white;
      width: 250px;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-shadow: 2px 0 8px rgba(0,0,0,0.2);
    }

    .logo-section {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .nav-links button {
      display: block;
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      background-color: #a30000;
      border: none;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      font-size: 15px;
    }

    .nav-links button.active {
      background-color: #ff4d4d;
    }

    .main-content {
      flex: 1;
      padding: 30px;
      overflow-y: auto;
    }

    header h1 {
      color: #8b0000;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #8b0000;
      color: #fff;
    }

    tr.selected {
      background-color: #f8d7da !important;
    }

    button {
      background-color: #8b0000;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      opacity: 0.9;
    }

    .bottom-controls {
      text-align: right;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo-section">
        <img src="duwidapdap.school.png" alt="School Logo" class="logo" />
        <h2>Duwidapdap National High School</h2>
      </div>
      <nav class="nav-links">
        <button class="menu-button" onclick="window.location.href='index.php'">Home</button>
        <button class="active">Attendance</button>
      </nav>
    </aside>

    <main class="main-content">
      <header>
        <h1>Attendance Record</h1>
      </header>

      <table class="class-table" id="attendanceTable">
        <thead>
          <tr>
            <th><button onclick="addNewRow()">➕</button></th>
            <th>Fullname</th>
            <th>09/01/25</th>
            <th>09/02/25</th>
            <th>09/03/25</th>
            <th>09/04/25</th>
            <th>09/05/25</th>
            <th>Total Absent</th>
            <th>
              <button onclick="enableEdit()">✎ Edit</button>
              <button onclick="toggleDeleteMode()">🗑</button>
            </th>
          </tr>
        </thead>
        <tbody id="attendanceBody">
          <?php
          $count = 1;
          while ($row = $result->fetch_assoc()):
          ?>
          <tr data-id="<?= $row['attendance_id'] ?>">
            <td><?= $count++ ?></td>
            <td contenteditable="false"><?= htmlspecialchars($row['fullname']) ?></td>
            <td contenteditable="false"><?= htmlspecialchars($row['date_090125']) ?></td>
            <td contenteditable="false"><?= htmlspecialchars($row['date_090225']) ?></td>
            <td contenteditable="false"><?= htmlspecialchars($row['date_090325']) ?></td>
            <td contenteditable="false"><?= htmlspecialchars($row['date_090425']) ?></td>
            <td contenteditable="false"><?= htmlspecialchars($row['date_090525']) ?></td>
            <td><?= $row['total_absent'] ?></td>
            <td></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>

      <div class="bottom-controls" id="bottomControls"></div>
    </main>
  </div>

  <script>
    // ✅ Your existing JS functions remain unchanged
    let editMode = false;
    let deleteMode = false;

    function addNewRow() {
      const tbody = document.getElementById('attendanceBody');
      const newIndex = tbody.rows.length + 1;
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${newIndex}</td>
        <td contenteditable="true">New Student</td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td contenteditable="true"></td>
        <td>0</td>
        <td></td>
      `;
      tbody.appendChild(tr);
      tr.addEventListener('input', () => computeTotal(tr));
      tr.addEventListener('blur', () => saveRow(tr, "add"), true);
    }

    function enableEdit() {
      editMode = !editMode;
      document.querySelectorAll('#attendanceBody td[contenteditable]').forEach(td => {
        td.contentEditable = editMode;
      });
      if (editMode) alert('Edit mode enabled. Click on any cell to modify.');
      else saveAll();
    }

    function toggleDeleteMode() {
      deleteMode = !deleteMode;
      if (deleteMode) {
        alert("Click on any row to mark for deletion.");
        document.querySelectorAll('#attendanceBody tr').forEach(row => {
          row.addEventListener('click', selectRowToDelete);
        });

        const btn = document.createElement('button');
        btn.textContent = 'Confirm Delete';
        btn.id = 'confirmDeleteBtn';
        btn.onclick = confirmDelete;
        document.getElementById('bottomControls').appendChild(btn);
      } else {
        document.querySelectorAll('#attendanceBody tr').forEach(row => {
          row.classList.remove('selected');
          row.removeEventListener('click', selectRowToDelete);
        });
        document.getElementById('confirmDeleteBtn')?.remove();
      }
    }

    function selectRowToDelete() {
      this.classList.toggle('selected');
    }

    function confirmDelete() {
      const selected = document.querySelectorAll('.selected');
      if (selected.length === 0) {
        alert('No rows selected!');
        return;
      }
      if (confirm(`Delete ${selected.length} selected record(s)?`)) {
        selected.forEach(row => {
          const id = row.dataset.id;
          fetch('attendance_process.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ action: 'delete', id })
          }).then(() => row.remove());
        });
      }
      document.getElementById('confirmDeleteBtn')?.remove();
    }

    function computeTotal(row) {
      let count = 0;
      for (let i = 2; i <= 6; i++) {
        if (row.cells[i].innerText.trim().toLowerCase() === 'absent') count++;
      }
      row.cells[7].innerText = count;
    }

    function saveRow(row, action) {
      const data = {
        action,
        id: row.dataset.id,
        fullname: row.cells[1].innerText.trim(),
        d1: row.cells[2].innerText.trim(),
        d2: row.cells[3].innerText.trim(),
        d3: row.cells[4].innerText.trim(),
        d4: row.cells[5].innerText.trim(),
        d5: row.cells[6].innerText.trim(),
        total: row.cells[7].innerText.trim()
      };
      fetch('attendance_process.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
      });
    }

    function saveAll() {
      document.querySelectorAll('#attendanceBody tr').forEach(row => {
        saveRow(row, "update");
      });
      alert('All changes saved!');
    }

    document.querySelectorAll('#attendanceBody tr').forEach(row => {
      row.addEventListener('input', () => computeTotal(row));
    });
  </script>
</body>
</html>
