<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class GoogleMaps extends Field
{
    /**
     * Column name.
     *
     * @var array
     */
    protected $column = [];
    protected $view = 'admin.googlemaps';
    protected $defaultLocation = [
      'lat' => '12.922846',
      'lng' => '100.883273',
    ];

    /**
     * Get assets required by this field.
     *
     * @return array
     */
    public static function getAssets()
    {
        $js = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key='.env('GOOGLE_API_KEY');
        return compact('js');
    }

    public function __construct($column, $arguments)
    {
        $this->column['lat'] = $column;
        $this->column['lng'] = $arguments[0];

        array_shift($arguments);

        $this->label = $this->formatLabel($arguments);
        $this->id = $this->formatId($this->column);
        
        /*
         * Google map is blocked in mainland China
         * people in China can use Tencent map instead(;
         */
        $this->useGoogleMap();
    }

    public function useGoogleMap()
    {
        // 12.926390930770966
        // 100.95266711163333
        
        $this->script = <<<EOT
        var label_lat = $('#label_{$this->id['lat']}');
        var label_lng = $('#label_{$this->id['lng']}');
        
        $('#label_{$this->id['lat']}, #label_{$this->id['lng']}').on('change', function () {
          var self = $(this);
          var id = self.attr('id');
          var value = self.val();
          var lat = $('#{$this->id['lat']}');
          var lng = $('#{$this->id['lng']}');
          var default_lat = '12.922846';
          var default_lng = '100.883273';
          
          if (id == 'label_lat') {
            lat.attr('value', value);
          }
          
          if (id == 'label_lng') {
            lng.attr('value', value);
          }
          
          initGoogleMap('{$this->id['lat']}{$this->id['lng']}');
        });
        
        function initGoogleMap(name) {
            var lat = $('#{$this->id['lat']}');
            var lng = $('#{$this->id['lng']}');
            
            if (lat.val() == '') {
              lat.attr('value', '12.922846');
              label_lat.attr('value', '12.922846');
            }
            if (lng.val() == '') {
              lng.attr('value', '100.883273');
              label_lng.attr('value', '100.883273');
            }
            
            var LatLng = new google.maps.LatLng(lat.val(), lng.val());

            var options = {
                zoom: 11,
                center: LatLng,
                panControl: false,
                zoomControl: true,
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var container = document.getElementById("map_"+name);
            var map = new google.maps.Map(container, options);

            var marker = new google.maps.Marker({
                position: LatLng,
                map: map,
                title: 'Drag Me!',
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function (event) {
                lat.val(event.latLng.lat());
                lng.val(event.latLng.lng());
                label_lat.val(event.latLng.lat());
                label_lng.val(event.latLng.lng());
            });
        }

        initGoogleMap('{$this->id['lat']}{$this->id['lng']}');
        
        
EOT;
    }
}
