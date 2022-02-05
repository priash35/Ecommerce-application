  //<![CDATA[
var marker;
var myCoordsLenght = 6;
var map1;
var ftfmarkers = [];
var geocoder;

  $(document).ready(function()
  {

    var latlng = new google.maps.LatLng(18.5133366,73.8538487);
    var options = 
    {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
      
    //var map = new google.maps.Map(document.getElementById("map_canvas"), options);
    map1 = new google.maps.Map(document.getElementById("map_ftf"), options);
    
    geocoder = new google.maps.Geocoder();
    google.maps.event.addListener(map1, "click", function(event)
    {
        addFtfMarker(event);
    });        

    google.maps.event.addListener(map, "click", function(event) 
	{
      marker = new google.maps.Marker(
	  {
        position: event.latLng,
        map: map
      });
 	  var latlng = marker.getPosition();
 	  //alert(latlng.lat());
 	  document.getElementById('latitude').value=latlng.lat();
 	  document.getElementById('longitude').value=latlng.lng();
 	  //var media_id=document.getElementById('media_id').value;
	  
	    document.getElementById('saveCoordinates-tempcenterlat').value=latlng.lat();
		document.getElementById('saveCoordinates-tempcenterlng').value=latlng.lng();			 
    });
    
    return false;
});

function addFtfMarker(event)
{
 //var media_id=document.getElementById('media_id').value;
 var markerCnt = parseInt($("#marker_count").val());
 markerCnt =parseInt(markerCnt)+1;
 if(markerCnt<=2)
 {
  if(markerCnt==1)
    var markerimg = "http://maps.google.com/mapfiles/markerA.png";

  if(markerCnt==2)
    var markerimg = "http://maps.google.com/mapfiles/markerB.png";


   var ftfmarker = new google.maps.Marker({
          position: event.latLng,
          map: map1,
          icon:markerimg,
          draggable: true,
          title: 'Drag me!',

        });
     var ftflatlng = ftfmarker.getPosition();
    ftfmarkers.push(ftfmarker);
 }
 else
  alert("You can add only Two Points");
 $("#marker_count").val(markerCnt);

  if(markerCnt==2)
  {
    
   var markerA = ftfmarkers[0].getPosition();
   alert(markerA.lat());
   document.getElementById("from_lat").value=markerA.lat();
   document.getElementById("from_lng").value=markerA.lng();
   
    var markerB = ftfmarkers[1].getPosition();
    document.getElementById("to_lat").value=markerB.lat();
    document.getElementById("to_lng").value=markerB.lng();
    
    var markerAaddress;
    var markerBaddress;     
   
    geocoder.geocode({'latLng': markerA}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
            
                markerAaddress = results[1].formatted_address;
                document.getElementById("saveFtflat-markerAaddress").value=markerAaddress;

            } else {
              return false;
            }
          } else {
            alert('Geocoder failed due to: ' + status);
          }
        }
    );
    
    geocoder.geocode({'latLng': markerB}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
            
                markerBaddress = results[1].formatted_address;
                document.getElementById("saveFtflat-markerBaddress").value=markerBaddress;
                
            } else {
              return false;
            }
          } else {
            alert('Geocoder failed due to: ' + status);
          }
        }
    );
  }
}

