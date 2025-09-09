<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paciente - Agenda Médica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<<<<<<< HEAD
 
</head>
<body>


=======
  <style>
    body {
      background: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }
    .navbar {
      background-color: #0d6efd;
    }
    .navbar-brand {
      font-weight: bold;
      color: #fff !important;
    }
    .table thead {
      background-color: #0d6efd;
      color: #fff;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<!-- Barra superior -->
>>>>>>> origin/Kathy/FrontEnd
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">👤 Paciente</a>
    <span class="text-white">Bienvenido, Ana López</span>
    <form action="/controladores/logout.php" method="post" class="ms-auto">
      <button type="submit" class="btn btn-danger btn-sm ms-2">Cerrar sesión</button>
    </form>
  </div>
</nav>

<div class="container mt-4">
  <div class="row">
<<<<<<< HEAD

=======
    <!-- Formulario para agendar -->
>>>>>>> origin/Kathy/FrontEnd
    <div class="col-md-5">
      <div class="card p-4">
        <h4 class="text-center mb-3">📅 Agendar Cita</h4>
        <form id="appointmentForm">
          <div class="mb-3">
<<<<<<< HEAD
  <label class="form-label">Nombre</label>
  <input type="text" class="form-control" id="patientName" placeholder="Escribe tu nombre" required>
</div>

=======
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" id="patientName" value="Ana López" readonly>
          </div>
>>>>>>> origin/Kathy/FrontEnd
          <div class="mb-3">
            <label class="form-label">Especialidad</label>
            <select class="form-select" id="specialty" required>
              <option value="">Seleccione...</option>
              <option value="Cardiología">Cardiología</option>
              <option value="Pediatría">Pediatría</option>
              <option value="Medicina General">Medicina General</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Médico</label>
            <select class="form-select" id="doctor" required>
              <option value="">Seleccione...</option>
              <option value="Dr. Pérez">Dr. Pérez</option>
              <option value="Dra. Torres">Dra. Torres</option>
              <option value="Dr. Ramírez">Dr. Ramírez</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Hora</label>
            <input type="time" class="form-control" id="time" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Agendar</button>
        </form>
      </div>
    </div>

    <!-- Lista de citas -->
    <div class="col-md-7">
      <div class="card p-4">
        <h4 class="text-center mb-3">🗂 Mis Citas</h4>
        <table class="table table-bordered text-center align-middle" id="myAppointments">
          <thead>
            <tr>
              <th>Especialidad</th>
              <th>Médico</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Estado</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
<<<<<<< HEAD
           
=======
            <!-- Aquí se agregan las citas dinámicamente -->
>>>>>>> origin/Kathy/FrontEnd
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<<<<<<< HEAD
=======
<!-- Modal para reprogramar -->
>>>>>>> origin/Kathy/FrontEnd
<div class="modal fade" id="rescheduleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <h5 class="modal-title">Reprogramar Cita</h5>
      <form id="rescheduleForm">
        <div class="mb-3">
          <label class="form-label">Nueva Fecha</label>
          <input type="date" class="form-control" id="newDate" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Nueva Hora</label>
          <input type="time" class="form-control" id="newTime" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const form = document.getElementById("appointmentForm");
  const table = document.querySelector("#myAppointments tbody");
  let selectedRow = null;

  // Agregar nueva cita
  form.addEventListener("submit", function(e){
    e.preventDefault();
    const specialty = document.getElementById("specialty").value;
    const doctor = document.getElementById("doctor").value;
    const date = document.getElementById("date").value;
    const time = document.getElementById("time").value;

    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${specialty}</td>
      <td>${doctor}</td>
      <td>${date}</td>
      <td>${time}</td>
      <td><span class="badge bg-warning">Pendiente</span></td>
      <td>
        <button class="btn btn-danger btn-sm" onclick="cancelarCita(this)">Cancelar</button>
        <button class="btn btn-secondary btn-sm" onclick="abrirReprogramar(this)">Reprogramar</button>
      </td>
    `;
    table.appendChild(row);

<<<<<<< HEAD
=======
    alert(`⚠️ Cita agendada con ${doctor} el ${date} a las ${time}`); // alerta al agendar
>>>>>>> origin/Kathy/FrontEnd
    form.reset();
  });

  // Cancelar cita
  function cancelarCita(btn){
    const row = btn.closest("tr");
    row.querySelector("td:nth-child(5)").innerHTML = '<span class="badge bg-danger">Cancelada</span>';
<<<<<<< HEAD
    row.querySelector("td:nth-child(6)").innerHTML = '---'; // elimina botones
=======
    row.querySelector("td:nth-child(6)").innerHTML = '---';
    alert(`❌ Cita cancelada`); // alerta al cancelar
>>>>>>> origin/Kathy/FrontEnd
  }

  // Abrir modal reprogramar
  function abrirReprogramar(btn){
    selectedRow = btn.closest("tr");
    const modal = new bootstrap.Modal(document.getElementById("rescheduleModal"));
    modal.show();
  }

  // Guardar cambios reprogramación
  document.getElementById("rescheduleForm").addEventListener("submit", function(e){
    e.preventDefault();
    if(selectedRow){
      const newDate = document.getElementById("newDate").value;
      const newTime = document.getElementById("newTime").value;
      selectedRow.querySelector("td:nth-child(3)").textContent = newDate;
      selectedRow.querySelector("td:nth-child(4)").textContent = newTime;
      selectedRow.querySelector("td:nth-child(5)").innerHTML = '<span class="badge bg-info">Reprogramada</span>';
<<<<<<< HEAD
=======
      alert(`🔄 Cita reprogramada al ${newDate} a las ${newTime}`); // alerta al reprogramar
>>>>>>> origin/Kathy/FrontEnd
    }
    const modal = bootstrap.Modal.getInstance(document.getElementById("rescheduleModal"));
    modal.hide();
  });
</script>

</body>
</html>
