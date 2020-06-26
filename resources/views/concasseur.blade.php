@extends('layouts.app')

@section('navigation_links')
  {{--  RECAP--}}
  <li class="nav-item dropdown">
    <a id="recapDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
      Recap <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="recapDropdown">
      <a class="dropdown-item" href="#">
        Graphe
      </a>
      <a class="dropdown-item" href="#">
        Prix de revient
      </a>
    </div>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="#">Gestion d'utilisateurs</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#">Production</a>
  </li>

  {{-- PERSONNEL --}}
  <li class="nav-item dropdown">
    <a id="personnelDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
      Personnel <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="personnelDropdown">
      <a class="dropdown-item" href="{{ route('concasseur.personnel-gtr.index') }}">
        Personnel GTR
      </a>
      <a class="dropdown-item" href="{{ route("concasseur.personnel-interimaire.index") }}">
        Personnel Interimaire
      </a>
    </div>
  </li>

  {{-- ENGINS --}}
  <li class="nav-item dropdown">
    <a id="enginDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
      Engin <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="enginDropdown">
      <a class="dropdown-item" href="#">
        Engin GM
      </a>
      <a class="dropdown-item" href="#">
        Engin Location
      </a>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#">Transport</a>
  </li>

@endsection

@section('map')
  <style>

    #map {
      height: 100%;
    }
    .map-container {
      position: relative;
      height: calc(100% - 71px);
    }
    .markers-toggle {
      position: absolute;
      top: 5px;
      left: 5px;
      z-index: 999;
    }
  </style>
  <div class="map-container">
    <div role="group">
      <button id="mapDropdown" type="button" class="btn btn-warning markers-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-map"></i></button>
      <div class="dropdown-menu" aria-labelledby="mapDropdown">
        <button class="dropdown-item marker-location" data-coordinates="28.434733,-11.055582"><i class="text-danger fas fa-map-marker-alt"></i> Installation de chantier</button>
        <button class="dropdown-item marker-location" data-coordinates="28.522532,-10.928473"><i class="text-danger fas fa-map-marker-alt"></i> Concasseurs</button>
      </div>
    </div>

    <div id="map"></div>
  </div>

@endsection

@section('footer')
  <script>
    function initMap() {
      // Styles a map in night mode.
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 28.434733, lng: -11.055582},
        zoom: 15,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: false,
        styles: [
          {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
          {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
          {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
          {
            featureType: 'administrative.locality',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'geometry',
            stylers: [{color: '#263c3f'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#6b9a76'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#38414e'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry.stroke',
            stylers: [{color: '#212a37'}]
          },
          {
            featureType: 'road',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9ca5b3'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#746855'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#1f2835'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [{color: '#f3d19c'}]
          },
          {
            featureType: 'transit',
            elementType: 'geometry',
            stylers: [{color: '#2f3948'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [{color: '#17263c'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#515c6d'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#17263c'}]
          }
        ]
      });

      window.map = map;

      var markers = [];

      markers.push(new google.maps.Marker({
        position: {lat: 28.434733, lng: -11.055582},
        map: map,
        title: 'Installation de chantier'
      }));
      markers.push(new google.maps.Marker({
        position: {lat: 28.522532, lng: -10.928473},
        map: map,
        title: 'Concasseurs'
      }));
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsXMR5yy4da4JYt4RrTfsH84o6rJ2tYG0&callback=initMap"
          async defer></script>
  <script>
    (function () {
      $('.marker-location').click(function () {
        // this.preventDefault();
        var coord = this.dataset.coordinates.split(',').map(e => Number(e));
        var pt = new google.maps.LatLng(coord[0], coord[1]);
        window.map.panTo(pt);
      })
    })();
  </script>
@endsection
