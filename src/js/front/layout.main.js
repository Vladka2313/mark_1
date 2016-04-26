/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(function() {
    $('a[pop]').on('click', function() {   
        $.ajax({
        	url: 'index.php',
        	type: 'get',
        	async: false,
        	cache: false,
        	data:
        	{
        		r: 'city/vote',
        		id: $(this).attr('pop'),
        	},
        });
    });
    
});
    $('#search-form').on('submit', function() {
    	return !!$('#search').val();
    });
var map;
 function initialize(address) {
        var geocoder=new google.maps.Geocoder();

        
  
     geocoder.geocode( { 'address': address}, function(results, status) {
         
    if (status == google.maps.GeocoderStatus.OK) {
        var cord=results[0].geometry.location;
        var bound=results[0].geometry.bounds;
        
        var mapOptions = {
            center: cord,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };    
      
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
            map.fitBounds(bound);
            //alert(bound);
        } else {
        alert('Geocode was not successful for the following reason: ' + status);
        }
  });
        

      }


