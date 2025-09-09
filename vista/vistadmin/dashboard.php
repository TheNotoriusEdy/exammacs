<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel Administrador - Agenda Médica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>


<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">🏥 Agenda Médica - Admin</a>
    <span class="text-white">Bienvenido, Ana López</span>
    <form action="/controladores/logout.php" method="post" class="ms-auto">
      <button type="submit" class="btn btn-danger btn-sm ms-2">Cerrar sesión</button>
    </form>
  </div>
</nav>

<div class="container mt-4">
  <div class="row">

    <div class="col-md-5">
      <div class="form-container">
        <h4 class="text-center mb-3">➕ Agregar Médico</h4>
        <form id="doctorForm">
          <div class="mb-3">
            <label class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="doctorName" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Especialidad</label>
            <input type="text" class="form-control" id="specialty" required>
          </div>
          
          <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="phone" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Horario de atención</label>
            <input type="text" class="form-control" id="schedule" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña de acceso</label>
            <input type="password" class="form-control" id="password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Registrar Médico</button>
        </form>
      </div>
    </div>

  
    <div class="col-md-7">
      <div class="form-container table-container">
        <h4 class="text-center mb-3">📋 Lista de Médicos</h4>
        <table class="table table-bordered align-middle text-center" id="doctorTable">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Especialidad</th>
              <th>Email</th>
              <th>Teléfono</th>
              <th>Horario</th>
            </tr>
          </thead>
          <tbody>
       
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <h4 class="text-success fw-bold">✅ Médico registrado</h4>
      <p>Se ha agregado correctamente al sistema.</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const doctorForm = document.getElementById("doctorForm");
  const doctorTable = document.querySelector("#doctorTable tbody");

  doctorForm.addEventListener("submit", function(e){
    e.preventDefault();

    const doctor = {
      nombre: document.getElementById("doctorName").value,
      especialidad: document.getElementById("specialty").value,
      correo: document.getElementById("email").value,
      telefono: document.getElementById("phone").value,
      horario: document.getElementById("schedule").value,
    };

  
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${doctor.nombre}</td>
      <td>${doctor.especialidad}</td>
      <td>${doctor.correo}</td>
      <td>${doctor.telefono}</td>
      <td>${doctor.horario}</td>
    `;
    doctorTable.appendChild(row);

    const modal = new bootstrap.Modal(document.getElementById("successModal"));
    modal.show();

    doctorForm.reset();
  });
</script>

</body>
</html>
