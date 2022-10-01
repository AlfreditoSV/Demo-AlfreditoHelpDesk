const total_ticket = document.querySelectorAll(".total-ticket");
function totalTicket(user_id, user_rol) {
  const total = new FormData();
  total.append("user_id", user_id);
  total.append("rol_id", user_rol);
  total.append("opcion", "mostrarTotalTicket");
  fetch("../../controller/tickets.php", {
    method: "POST",
    body: total,
  })
    .then((response) => response.json())
    .then((response) => {
      response.forEach((data) => {
        total_ticket[0].textContent = data.TOTAL;
      });
    });
}
function totalTicket_Abierto(user_id, user_rol) {
  const total = new FormData();
  total.append("user_id", user_id);
  total.append("rol_id", user_rol);
  total.append("opcion", "mostrarTotalTicket_Abierto");
  fetch("../../controller/tickets.php", {
    method: "POST",
    body: total,
  })
    .then((response) => response.json())
    .then((response) => {
      response.forEach((data) => {
        total_ticket[1].textContent = data.TOTAL;
      });
    });
}
function totalTicket_Cerrado(user_id, user_rol) {
  const total = new FormData();
  total.append("user_id", user_id);
  total.append("rol_id", user_rol);
  total.append("opcion", "mostrarTotalTicket_Cerrado");
  fetch("../../controller/tickets.php", {
    method: "POST",
    body: total,
  })
    .then((response) => response.json())
    .then((response) => {
      response.forEach((data) => {
        total_ticket[2].textContent = data.TOTAL;
      });
    });
}

function GraficoTicket(user_id, user_rol) {
  const total = new FormData();
  total.append("user_id", user_id);
  total.append("rol_id", user_rol);
  total.append("opcion", "graficoTicket");
  fetch("../../controller/tickets.php", {
    method: "POST",
    body: total,
  })
    .then((response) => response.json())
    .then((response) => {
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $("#donutChart").get(0).getContext("2d");
      var donutData = {
        labels: [
          response[0].Nombre,
          response[1].Nombre,
          response[2].Nombre,
          response[3].Nombre,
          response[4].Nombre,
        ],
        datasets: [
          {
            data: [
              response[0].Total,
              response[1].Total,
              response[2].Total,
              response[3].Total,
              response[4].Total,
            ],
            backgroundColor: [
              "#f56954",
              "#00a65a",
              "#f39c12",
              "#00c0ef",
              "#007bff",
            ],
          },
        ],
      };
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      };
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: "doughnut",
        data: donutData,
        options: donutOptions,
      });
    });
}

window.addEventListener("load", () => {
  const user_id = document.getElementById("user_idSession").value;
  const user_rol = document.getElementById("rol_idSession").value;

  totalTicket(user_id, user_rol);
  totalTicket_Abierto(user_id, user_rol);
  totalTicket_Cerrado(user_id, user_rol);
  GraficoTicket(user_id, user_rol);
});
