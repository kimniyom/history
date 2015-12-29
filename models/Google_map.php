<?php

namespace app\models;

class Google_map {

    public $center;
    public $zoom;
    public $area;
    public $marker;
    public $maptype;

    function Render() {
        //$path_img = Url::to('@web/images/Map-icon-red.png', true);
        //var image = "' . $path_img . '";icon: image


        $str = '<script type="text/javascript">
        function initialize(lat, long) {
        var myLatlng = new google.maps.LatLng(lat, long);
        var mapProp = {
            center: myLatlng,
            zoom: ' . $this->zoom . ',
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.' . $this->maptype . '
        };
        var map = new google.maps.Map(document.getElementById("googleMapmain"), mapProp);';    
        $str .= $this->marker;
        $str .= $this->area;
        $str.= '   
    }

    function set_center() {
        initialize(' . $this->center . ');
    }
    
    google.maps.event.addDomListener(window, "load", set_center);

</script>';

        return $str;
    }

    function SetCenter($center = '') {
        $this->center = $center;
    }

    function SetArea($kml = '') {

        $str = "
            var kml = '$kml';
            var parser = new geoXML3.parser({map: map, processStyles: true});
            parser.parse('$kml');
                /*
            var ctaLayer = new google.maps.KmlLayer({
                    url: kml
                });
                */
                //ctaLayer.setMap(map);";
        $this->area = $str;
    }

    function SetMarker($id = '', $lat = '', $long = '', $content = '', $images = '') {
        if ($images == "") {
            $img = "";
        } else {
            $img = ",icon: '" . $images . "'";
        }
        $str = 'var Latlngmarker' . $id . ' = new google.maps.LatLng(' . $lat . ',' . $long . ');';
        $str .= '
                var infowindow' . $id . ' = new google.maps.InfoWindow({
                content: "' . $content . '"
        });
        
        var marker' . $id . ' = new google.maps.Marker({
            position: Latlngmarker' . $id . ',
            map: map,
            title: "พิกัด"' . $img . '
        });

        google.maps.event.addListener(marker' . $id . ', "click", function () {
            infowindow' . $id . '.open(map, marker' . $id . ');
        });';

        return $str;
    }

    function Marker($Marker = '') {
        $this->marker = $Marker;
    }

    function Zoom($zoom = '') {
        $this->zoom = $zoom;
    }

    function Maptype($Maptype = '') {
        if ($Maptype == '') {
            $Type = "ROADMAP ";
        } else {
            $Type = $Maptype;
        }

        $this->maptype = $Type;
    }

}
