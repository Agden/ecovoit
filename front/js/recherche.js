// --- carte + autocompletion + résultat de recherche
const map = L.map("carte").setView([48.8566, 2.3522], 12);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: "© OpenStreetMap contributors",
}).addTo(map);

let marker;
let currentRoute;
const apiKeyORS = "5b3ce3597851110001cf62487986bc5d0ec44130b4a80dc37c940ac6";

const zoneResultats = document.getElementById("zone-resultats");

// --- Tracage de l'itineraire
function tracerItineraireRoute(depart, arrivee) {
  const url = "https://api.openrouteservice.org/v2/directions/driving-car/geojson";

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Authorization": apiKeyORS,
    },
    body: JSON.stringify({
      coordinates: [
        [depart.lng, depart.lat],
        [arrivee.lng, arrivee.lat],
      ],
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (currentRoute) {
        map.removeLayer(currentRoute);
      }

      if (!data || !data.features || data.features.length === 0) {
        alert("Aucun itinéraire trouvé.");
        return;
      }

      currentRoute = L.geoJSON(data.features[0], {
        style: {
          color: "rgb(119, 173, 49)",
          weight: 5,
        },
      }).addTo(map);

      map.fitBounds(currentRoute.getBounds());
    })
    .catch((error) => {
      console.error("Erreur de routage :", error);
    });
}

// --- Auto complétion de villes
function setupAutocomplete(inputId, suggestionsId) {
  const input = document.getElementById(inputId);
  const suggestions = document.getElementById(suggestionsId);

  input.addEventListener("input", () => {
    const query = input.value.trim();

    if (query.length < 2) {
      suggestions.style.display = "none";
      return;
    }

    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=5`)
      .then((res) => res.json())
      .then((data) => {
        suggestions.innerHTML = "";

        if (data.length > 0) {
          data.forEach((result) => {
            const ville = result.display_name;

            const div = document.createElement("div");
            div.textContent = ville;
            div.classList.add("suggestion-item");

            div.addEventListener("click", () => {
              input.value = ville;
              input.dataset.lat = result.lat;
              input.dataset.lng = result.lon;
              suggestions.style.display = "none";
            });

            suggestions.appendChild(div);
          });

          suggestions.style.display = "flex";
          suggestions.style.flexDirection = "column";
        } else {
          suggestions.style.display = "none";
        }
      })
      .catch(() => {
        suggestions.style.display = "none";
      });
  });

  document.addEventListener("click", (e) => {
    if (!suggestions.contains(e.target) && e.target !== input) {
      suggestions.style.display = "none";
    }
  });
}

// --- DOMContentLoaded
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("searchBtn");
  const departInput = document.getElementById("depart");
  const arriveeInput = document.getElementById("arrivee");

  setupAutocomplete("depart", "suggestions-depart");
  setupAutocomplete("arrivee", "suggestions-arrivee");

  if (btn) {
    btn.addEventListener("click", () => {
      let departCoordsPromise;

      if (departInput.value.trim() === "") {
        departCoordsPromise = new Promise((resolve, reject) => {
          navigator.geolocation.getCurrentPosition(
            (position) => {
              resolve({
                lat: position.coords.latitude,
                lng: position.coords.longitude,
                label: "Ma position",
              });
            },
            () => reject()
          );
        });
      } else {
        departCoordsPromise = Promise.resolve({
          lat: parseFloat(departInput.dataset.lat),
          lng: parseFloat(departInput.dataset.lng),
          label: departInput.value,
        });
      }

      const arriveeCoords = {
        lat: parseFloat(arriveeInput.dataset.lat),
        lng: parseFloat(arriveeInput.dataset.lng),
        label: arriveeInput.value,
      };

      departCoordsPromise.then((departCoords) => {
        if (!departCoords || isNaN(arriveeCoords.lat) || isNaN(arriveeCoords.lng)) {
          alert("Veuillez sélectionner une adresse valide.");
          return;
        }

        tracerItineraireRoute(departCoords, arriveeCoords);

        if (marker) map.removeLayer(marker);

        const markerDepart = L.marker([departCoords.lat, departCoords.lng])
          .bindPopup(`<strong>Départ :</strong> ${departCoords.label}`)
          .addTo(map);

        const markerArrivee = L.marker([arriveeCoords.lat, arriveeCoords.lng])
          .bindPopup(`<strong>Arrivée :</strong> ${arriveeCoords.label}`)
          .addTo(map);

        marker = L.layerGroup([markerDepart, markerArrivee]).addTo(map);
      });
    });
  }

  // --- Tracer la carte automatiquement si une recherche a déjà été faite
  const donnees = document.getElementById("donnees-recherche");
  if (donnees) {
    const depart = donnees.dataset.depart;
    const arrivee = donnees.dataset.arrivee;

    if (depart && arrivee) {
      Promise.all([
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(depart)}&limit=1`).then(r => r.json()),
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(arrivee)}&limit=1`).then(r => r.json())
      ]).then(([dataDepart, dataArrivee]) => {
        if (dataDepart.length && dataArrivee.length) {
          const departCoords = { lat: parseFloat(dataDepart[0].lat), lng: parseFloat(dataDepart[0].lon) };
          const arriveeCoords = { lat: parseFloat(dataArrivee[0].lat), lng: parseFloat(dataArrivee[0].lon) };
          tracerItineraireRoute(departCoords, arriveeCoords);
        }
      });
    }
  }
});