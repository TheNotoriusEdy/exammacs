<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Agenda Médica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background: url("https://th.bing.com/th/id/R.9aa0d307d677cbcd849e103d494be2f8?rik=HMblGaMQjBfrwA&pid=ImgRaw&r=0") no-repeat center center/cover;
      position: relative;
    }

   
    body::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      z-index: 0;
    }

    .login-card {
      max-width: 380px;
      width: 100%;
      background: rgba(255, 255, 255, 0.97);
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.4);
      padding: 30px;
      z-index: 1;
    }

    .login-card h4 {
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>

<div class="login-card">
  <h4 class="text-center mb-4">Agenda Médica</h4>
  <form id="loginForm">
    <div class="mb-3">
      <label class="form-label">Usuario</label>
      <input type="text" id="username" class="form-control" placeholder="Ingresa tu usuario" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Contraseña</label>
      <input type="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Rol</label>
      <select id="role" class="form-select" required>
        <option value="">Selecciona tu rol</option>
        <option value="patient">Paciente</option>
        <option value="doctor">Médico</option>
        <option value="admin">Administrador</option>
      </select>
    </div>
    <button class="btn btn-primary w-100">Ingresar</button>
  </form>
</div>


<div class="modal fade" id="welcomeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <h1 id="welcomeMessage" class="text-success fw-bold"></h1>
      <p class="lead">Redirigiendo al sistema...</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("loginForm").addEventListener("submit", function(e){
  e.preventDefault();
  const user = document.getElementById("username").value.trim();
  const pass = document.getElementById("password").value.trim();
  const role = document.getElementById("role").value;

  if(user && pass && role){
   
    document.getElementById("welcomeMessage").textContent = "¡Bienvenido " + user + "!";
    const modal = new bootstrap.Modal(document.getElementById("welcomeModal"));
    modal.show();

    setTimeout(()=>{
  if(role === "paciente") window.location.href = "vistauser/dashboard.php?role=paciente";
  if(role === "medico")  window.location.href = "vistamedicos/dashboard.php?role=medico";
  if(role === "administrador")   window.location.href = "vistaadmin/dashboard.php?role=administrador";
},2500);
  } else {
    alert("Completa todos los campos");
  }
});
</script>

</body>
</html>



