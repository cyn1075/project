window.initMap = function () {
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 37.271735, lng: 127.013979 },
      zoom: 10,
    });

    const malls = [
        { label: "학원", name: "학원", lat: 37.271735, lng: 127.013979 }
    ];

    const infowindow = new google.maps.InfoWindow();


    malls.forEach(({ label, name, lat, lng }) => {
        const marker = new google.maps.Marker({
          position: { lat, lng },
          label,
          map,
        });
        marker.addListener("click", () => {
            map.panTo(marker.position);
            infowindow.setContent(name);
            infowindow.open({
              anchor: marker,
              map,
            });
          });
      });
  };