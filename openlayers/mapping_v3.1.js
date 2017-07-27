function init_map() {
    "use strict";
    var gmap = new google.maps.Map(document.getElementById('gmap'), {
      disableDefaultUI: true,
      keyboardShortcuts: false,
      draggable: false,
      disableDoubleClickZoom: true,
      scrollwheel: false,
      streetViewControl: false
    });

    var view = new ol.View({
      // make sure the view doesn't go beyond the 22 zoom levels of Google Maps
      maxZoom: 21
    });
    view.on('change:center', function() {
        var center = ol.proj.transform(view.getCenter(), 'EPSG:3857', 'EPSG:4326');//EPSG:3857', 'EPSG:4326, GMap : 900913
        gmap.setCenter(new google.maps.LatLng(center[1], center[0]));
    });
    view.on('change:resolution', function() {
      gmap.setZoom(view.getZoom());
    });



    var L1 = add_layer('my data', '../media/images/pin_entity_1.png', './test_dw.json');
    var L2 = add_layer('test 2', '../media/images/pin_entity_4.png', './test_dw_2.json');
        
    var olmap = new ol.layer.Vector({
        source: new ol.source.Vector({
                url: 'http://openlayers.org/en/v3.0.0/examples/data/geojson/countries.geojson',
                format: new ol.format.GeoJSON({
                    projection: "EPSG:3857"
                })
            }),        
        style: new ol.style.Style({
            fill: new ol.style.Fill({
              color: 'rgba(255, 255, 255, 0.6)'
            }),
            stroke: new ol.style.Stroke({
              color: '#319FD3',
              width: 1
            })
        })
    });
    view.setCenter([0, 0]);
    view.setZoom(1);
    
    var olMapDiv = document.getElementById('olmap');
    var map = new ol.Map({
      layers: [olmap,L1],
      interactions: ol.interaction.defaults({
        altShiftDragRotate: false,
        dragPan: false,
        rotate: false
      }).extend([new ol.interaction.DragPan({kinetic: null})]),
      target: olMapDiv,
      view: view
    });

//    var overlay = new ol.Overlay({
//      position: new ol.proj.transform([45.1363669923, -23.0399440733], 'EPSG:4326', 'EPSG:3857'),
//      element: $('<img src="../media/images/pin_entity_1.png">')
//          .css({marginTop: '-200%', marginLeft: '-50%', cursor: 'pointer'})
//          .tooltip({title: 'Hello, world!', trigger: 'click'})
//    });
//    map.addOverlay(overlay);
    
    olMapDiv.parentNode.removeChild(olMapDiv);
    gmap.controls[google.maps.ControlPosition.TOP_LEFT].push(olMapDiv);
    
    
    function add_layer(name, image, url) {
        name = '<img src="' + image + '">' + name;
        var source = new ol.source.Vector({
                url: url,
                format: new ol.format.GeoJSON({
                    projection: "EPSG:3857"
                })
            });
        console.debug("source : " + JSON.stringify(source));
        console.debug("a : " + source.getProperties('prop0'));
        var vector = new ol.layer.Vector({
            name: name,
            source: source
//            style:new ol.style.Style({
//                // ...
//              })
        });
//        var vector = new ol.Layer.Vector({
//            title: name,
//            strategies: [new ol.Strategy.Fixed()],
//            projection: new ol.Projection("EPSG:4326"),
//            protocol: new ol.Protocol.HTTP({
//                url: url,
//                format: new ol.Format.GeoJSON()
//            }),
//            styleMap: new ol.StyleMap({
//                "default": {
//                    externalGraphic: image,
//                    graphicWidth: 48, graphicHeight: 43,
//                    graphicXOffset:-14, graphicYOffset:-37,  //tip of pin in icon is at 14,6 offset y is height - tipY
//                    pointRadius: 8}
//            })
//        });
//        layers.push(vector);
        return vector;
    }
}
