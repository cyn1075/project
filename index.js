window.initMap = function () {
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 37.271735, lng: 127.013979 },
      zoom: 10,
    });

    const malls = [
        { label: "학원", name: "학원", lat: 37.271735, lng: 127.013979 }
    ];

    const bounds = new google.maps.LatLngBounds();
    const infoWindow = new google.maps.InfoWindow();
  
    malls.forEach(({ label, name, lat, lng }) => {
      const marker = new google.maps.Marker({
        position: { lat, lng },
        label,
        map
      });
      bounds.extend(marker.position);
  
      marker.addListener("click", () => {
        map.panTo(marker.position);
        infoWindow.setContent(name);
        infoWindow.open({
          anchor: marker,
          map
        });
      });
    });
  
    map.fitBounds(bounds);
  };