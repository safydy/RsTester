function init_map() {
    "use strict";

    var layers = [];
    var my_map = new google.maps.Map(document.getElementById('gmap'), {
        disableDefaultUI: true,
        keyboardShortcuts: false,
        draggable: false,
        disableDoubleClickZoom: true,
        scrollwheel: false,
        streetViewControl: false
    });

    var map_osm = new ol.layer.Tile({
      source: new ol.source.OSM()
    });
    var L1 = add_layer('my data', '../media/images/pin_entity_1.png', './test_dw.json');
    var L2 = add_layer('test 2', '../media/images/pin_entity_4.png', './test_dw_2.json');
    
//    var legends = new ol.Control.LayerSwitcher({ascending: false});
//    map.addControl(legends);
    var layerToAdd = [map_osm, L1, L2];
    var map = new ol.Map({
        target: document.getElementById('map'),
        projection: "EPSG:900913",//new ol.Projection("EPSG:900913"),
        displayProjection: "EPSG:4326", //new ol.Projection("EPSG:4326"),
        units: "m",
        maxResolution: 156543.0339,
        maxExtent: [-20037508, -20037508, 20037508, 20037508],
        controls: ol.control.defaults({attribution: false}).extend([
            new ol.control.MousePosition()
        ]),
        layers:layerToAdd,
        view: new ol.View({
          center: [0,0],
          zoom: 3
        })        
    });
//    
//    map.addLayers(layers);
    var proj = "EPSG:4326";//new ol.Projection("EPSG:4326");
//    var point = new ol.LonLat(73.6962890625, 26.941659545381516);
//    point.transform(proj, map.getProjectionObject());
//    map.setCenter(point, 2);
//    legends.maximizeControl();


    function add_layer(name, image, url) {
        name = '<img src="' + image + '">' + name;
        var vector = new ol.layer.Vector({
            name: name,
            source: new ol.source.Vector({
                url: url,
                format: new ol.format.GeoJSON({
                    projection: "EPSG:4326"
                })
            }),
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
