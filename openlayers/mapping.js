function init_map() {
    "use strict";
    var map = new OpenLayers.Map({
        div: "map",
        projection: new OpenLayers.Projection("EPSG:900913"),
        displayProjection: new OpenLayers.Projection("EPSG:4326"),
        units: "m",
        maxResolution: 156543.0339,
        theme: null,
        maxExtent: new OpenLayers.Bounds(
            -20037508, -20037508, 20037508, 20037508
        ),
        controls: [
            new OpenLayers.Control.Navigation({dragPan: new OpenLayers.Control.DragPan()}),
            new OpenLayers.Control.PanZoomBar()

        ]
    });
    var layers = [];
    layers.push(new OpenLayers.Layer.Google("Google Layer", {
        sphericalMercator: true,
        displayInLayerSwitcher: false
    }));

    var geo_url = './test_dw.json';//geo_url = '/get_geojson/' + project_id;

        var entity_type = 'my data';
        var image_url = '../media/images/pin_entity_1.png';
        add_layer(entity_type, image_url, geo_url);

    
    add_layer('test 2', '../media/images/pin_entity_4.png', './test_dw_2.json');
    
    var legends = new OpenLayers.Control.LayerSwitcher({ascending: false});
    map.addControl(legends);
    map.addLayers(layers);
    var proj = new OpenLayers.Projection("EPSG:4326");
    var point = new OpenLayers.LonLat(73.6962890625, 26.941659545381516);
    point.transform(proj, map.getProjectionObject());
    map.setCenter(point, 2);
    legends.maximizeControl();


    function add_layer(name, image, url) {
        name = '<img src="' + image + '">' + name;
        var vector = new OpenLayers.Layer.Vector(name, {
            strategies: [new OpenLayers.Strategy.Fixed()],
            projection: new OpenLayers.Projection("EPSG:4326"),
            protocol: new OpenLayers.Protocol.HTTP({
                url: url,
                format: new OpenLayers.Format.GeoJSON()
            }),
            styleMap: new OpenLayers.StyleMap({
                "default": {
                    externalGraphic: image,
                    graphicWidth: 48, graphicHeight: 43,
                    graphicXOffset:-14, graphicYOffset:-37,  //tip of pin in icon is at 14,6 offset y is height - tipY
                    pointRadius: 8}
            })
        });
        layers.push(vector);
    }
}


