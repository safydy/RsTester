function init_map() {
    "use strict";
    var coord = [131.044922, -25.363882];
    var exampleLoc = ol.proj.transform(
    [131.044922, -25.363882], 'EPSG:4326', 'EPSG:3857');

    var view = new ol.View({
      // make sure the view doesn't go beyond the 22 zoom levels of Google Maps
      maxZoom: 21
    });
    view.setCenter([0, 0]);
    view.setZoom(1);
    
    var map = new ol.Map({
      target: 'olmap',
      renderer: 'canvas',
      view: view,
      layers: [
        new ol.layer.Tile({source: new ol.source.MapQuest({layer: 'osm'})})
      ]
    });
    
    var my_tooltip = $('<img src="../media/images/pin_entity_1.png">')
//            .tooltip({title: 'Hello, world!', trigger: 'click', 
//        template :'<div class="tooltip" role="tooltip"><div class="tooltip-arrow">Test test</div><div class="tooltip-inner"></div></div>'})
            .css({marginTop: '-200%', cursor: 'pointer',marginLeft: '-25%'})//marginTop: '-200%', marginLeft: '-50%', 
            ;
    
//    var info = new ol.Overlay({
//        position: exampleLoc,
//        autoPan: true,
//        element: my_tooltip[0]
//      });
//    $('#popup').click(function(evt) {
//        alert('click');
//    });

    var pin = new ol.Overlay({
        position: exampleLoc,
        autoPan: true,
        element: my_tooltip[0]
      });
    
        var popup = new ol.Overlay.Popup({insertFirst: false});
        map.addOverlay(popup);
        
    my_tooltip.click(function(evt) {
        // Create a new popup instance each time the map is clicked, set the
        // ol.Overlay `insertFirst` option to false so that each new popup is
        // appended to the DOM and hence appears above any existing popups
        
        var prettyCoord = ol.coordinate.toStringHDMS(ol.proj.transform(exampleLoc, 'EPSG:3857', 'EPSG:4326'), 2);
        popup.show(exampleLoc, '<div><h2>Coordinates</h2><p>' + prettyCoord + '</p></div>');
    });

    map.addOverlay(pin);
}
