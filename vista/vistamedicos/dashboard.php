<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Médico - Agenda Médica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 
</head>
<body>


<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">👨‍⚕️ Dashboard Médico</a>
    <span class="text-white">Bienvenido, Dr. Pérez</span>
  </div>
</nav>

<div class="container mt-4">
  <h3 class="text-center mb-4">📅 Mis Citas de Hoy</h3>
  
  <div class="card shadow">
    <div class="card-body">
      <table class="table table-bordered text-center align-middle" id="appointmentsTable">
        <thead>
          <tr>
            <th>Paciente</th>
            <th>Hora</th>
            <th>Motivo</th>
            <th>Estado</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <!-- Ejemplos de citas -->
          <tr>
            <td>Ana López</td>
            <td>09:00 AM</td>
            <td>Chequeo general</td>
            <td><span class="badge bg-warning">Pendiente</span></td>
            <td><button class="btn btn-success btn-sm" onclick="marcarRealizada(this)">Marcar como realizada</button></td>
          </tr>
          <tr>
            <td>Carlos Méndez</td>
            <td>10:30 AM</td>
            <td>Dolor de cabeza</td>
            <td><span class="badge bg-warning">Pendiente</span></td>
            <td><button class="btn btn-success btn-sm" onclick="marcarRealizada(this)">Marcar como realizada</button></td>
          </tr>
          <tr>
            <td>María Torres</td>
            <td>01:00 PM</td>
            <td>Consulta pediátrica</td>
            <td><span class="badge bg-warning">Pendiente</span></td>
            <td><button class="btn btn-success btn-sm" onclick="marcarRealizada(this)">Marcar como realizada</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal éxito -->
<div class="modal fade" id="doneModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <h4 class="text-success fw-bold">✅ Cita actualizada</h4>
      <p>La cita fue marcada como realizada.</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function marcarRealizada(btn){
  const row = btn.closest("tr");
  const estadoCell = row.querySelector("td:nth-child(4)");
  estadoCell.innerHTML = '<span class="badge bg-success">Realizada</span>';
  btn.remove(); 

  
  const modal = new bootstrap.Modal(document.getElementById("doneModal"));
  modal.show();
}
</script>

</body>
</html>
