let map, infoWindow;
let locaisBanco = [];

function initMap() {
  infoWindow = new google.maps.InfoWindow(); 
  const myLastLng = { lat: -29.76774060231221, lng:-51.149318632393815 };
  map = new google.maps.Map(document.getElementById("map"), {
    center: myLastLng,
    zoom: 10,
  });

  $.get("/controller/pontos_controller.php?acao=listarJson", function(data, status) {
    locaisBanco = JSON.parse(data);

    locaisBanco.forEach((local) => {
      fetch(`https://maps.googleapis.com/maps/api/geocode/json?address=${local.rua}-${local.cidade}-${local.bairro}-${local.numero}--${local.cep}&key=AIzaSyCij4r1XKpsDDdTul6sa34CkOMsae8b7JM`)
        .then(response => response.json())
        .then(json => {
          const pos = json.results[0].geometry.location;

          const info = new google.maps.InfoWindow({
            content: `${local.nome}<br>${local.cidade}, ${local.rua} ${local.numero} - ${local.bairro}<br>${local.cep}<br>Horário de Funcionamento: ${local.horario}`,
            ariaLabel: local.nome,
          });

          const marker = new google.maps.Marker({
            position: pos,
            map,
            title: `Ponto ${local.nome}`,
          });

          marker.addListener("click", () => {
            info.open({
              anchor: marker,
              map,
            });
          });
        });
    });
  });

  const locationButton = document.getElementById("meuLocal");
  const searchButton = document.getElementById("search");
  const inputAddress = document.getElementById("address");

  searchButton.addEventListener("click", () => {
    fetch(`https://maps.googleapis.com/maps/api/geocode/json?address=${inputAddress.value}&key=AIzaSyCij4r1XKpsDDdTul6sa34CkOMsae8b7JM`)
      .then(response => response.json())
      .then(json => {
        const pos = json.results[0].geometry.location;

        infoWindow.setPosition(pos);
        infoWindow.setContent("Endereço encontrado.");
        infoWindow.open(map);
        map.setCenter(pos);
        map.setZoom(15);
      });
  });

  locationButton.addEventListener("click", () => {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent("Você está aqui!");
          infoWindow.open(map);
          map.setCenter(pos);
          map.setZoom(15);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

window.initMap = initMap;
