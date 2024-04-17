// Geolocalizzazione
function getLocation() {
    // Ottiene la posizione del dispositivo
    if (navigator.geolocation) {
        var options = { enableHighAccuracy: true };
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        document.getElementById('map').innerHTML = "Geolocalizzazione non supportata dal tuo browser.";
    }

    // Inizializzazione mappa in base alla posizione
    function showPosition(position) {
        var latitude = position.coords.latitude - (632 / 111111);
        var longitude = position.coords.longitude + (274 / 111111);

        var mapOptions = {
            center: { lat: latitude, lng: longitude },
            zoom: 13.90
        };

        // Crea mappa
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Aggiunge il marker della posizione attuale
        var marker = new google.maps.Marker({
            position: { lat: latitude, lng: longitude },
            map: map,
            title: 'La tua posizione'
        });

        // Aggiunge il popup al marker della posizione attuale
        var infowindow = new google.maps.InfoWindow({
            content: 'Tu sei qui'
        });

        // Aggiungi un evento click al marker per aprire l'infowindow
        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
        // Richiama funzione per l'aggiunta dei marker
        addMarker(map);
    }
}
/*
function initMap() {
    var mapOptions = {
        center: { lat: 43.5258, lng: 13.2435 },
        zoom: 13.90
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
}
*/
// Controllo errori
function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            document.getElementById("demo").innerHTML = "L'utente ha rifiutato la richiesta di geolocalizzazione."
            break;
        case error.POSITION_UNAVAILABLE:
            document.getElementById("demo").innerHTML = "Le informazioni sulla posizione non sono disponibili."
            break;
        case error.TIMEOUT:
            document.getElementById("demo").innerHTML = "La richiesta di geolocalizzazione è scaduta."
            break;
        case error.UNKNOWN_ERROR:
            document.getElementById("demo").innerHTML = "Si è verificato un errore sconosciuto."
            break;
    }
}

// Funzione aggiunta marker
function addMarker(map) {
    // Array lista posizioni per i marker
    var markerList = [{ position: { lat: 43.5258, lng: 13.2435 }, content: 'dfksj' },
    { position: { lat: 43.5205, lng: 13.2381 }, content: '<div style="color: blue; font-size: 16px;">Contenuto personalizzato dell\'infowindow</div>' },
    { position: { lat: 43.5279, lng: 13.2804 }, content: 'sono quaggiù' },
    { position: { lat: 43.5233, lng: 13.2687 }, content: 'ehila' },
    { position: { lat: 43.5179, lng: 13.2482 }, content: 'ciao' },];

    // Aggiungi marker
    for (var i = 0; i < markerList.length; i++) {
        addMarkerWithInfowindow(markerList[i])
    }
    //Funzione per aggiungere un marker insieme al rispettivo popup
    function addMarkerWithInfowindow(markerInfo) {
        var marker = new google.maps.Marker({
            position: markerList[i].position,
            map: map,
            title: 'Posizione del marker',
            icon: {
                url: 'idrante-senzasfondo.png',
                scaledSize: new google.maps.Size(30, 60)
            }
        });

        // Definisci un'infowindow
        var infowindow = new google.maps.InfoWindow({
            content: markerInfo.content
        });

        // Aggiungi un evento click al marker per aprire l'infowindow
        marker.addListener('click', function () {
            // infowindow.open(map, marker);
            document.getElementById('informazioniIdrante').style.display = 'inline';
        });
        
        // Aggiungi un evento click per nascondere l'infowindow quando si preme sulla mappa
        map.addListener('click', function () {
            document.getElementById('informazioniIdrante').style.display = 'none';
        });
    }
}

//ricerca NON FUNZIONA
/*
document.getElementById('cerca').addEventListener('click', function () {
    var query = document.getElementById('cercaLuogo').value;
    ricercaLuogo(query);
});
*/

document.getElementById('cerca').addEventListener('click', function() {
    var city = document.getElementById('cercaLuogo').value;
    searchCity(city);
});


// Funzione per la ricerca tramite il luogo
/*
function ricercaLuogo(query) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: query }, function (results, status) {
        if (status === 'OK') {
            var location = results[0].geometry.location;
            map.setCenter(location);
            // Aggiungi un marker per il luogo trovato
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: query
            });
            // Apri l'infowindow del marker
            var infowindow = new google.maps.InfoWindow({
                content: query
            });
            infowindow.open(map, marker);
        } else {
            alert('Nessun risultato trovato per: ' + query);
        }
    });
}
*/

function searchCity(city) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: city }, function(results, status) {
        if (status === 'OK' && results[0]) {
            var location = results[0].geometry.location;
            var latitude = location.lat();
            var longitude = location.lng();
            map.setCenter(latitude,longitude);
            map.setZoom(10); // Imposta il livello di zoom della mappa
            document.getElementById('prova').value = "risultato trovato per: ";
        } else {
            document.getElementById('prova').value = "Nessun risultato trovato per: ";
        }
        document.getElementById('prova').value = "fuori";
    });
    document.getElementById('prova').value = "fuori fuori";
}
