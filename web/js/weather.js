// weather.js

(function() {
  'use strict';

  var weather = {

    weather: null,

    init: function() {
      this.load();
    },

    // REF: http://openweathermap.org/current
    load: function() {
      var _this = this;
      var $panel = $('.panel-weather').eq(0);
      var lat = $panel.data('lat');
      var lon = $panel.data('lon');
      var url = 'http://api.openweathermap.org/data/2.5/weather';

      if (lat === '' || lon === '') {
        _this.updateUi();
        return;
      }

      url = url + '?lat=' + lat + '&lon=' + lon + '&units=imperial';

      $.ajax({
        dataType: 'json',
        url: url
      })
        .done(function(data) {
          _this.weather = data;
          _this.updateUi();
        })
        .fail(function() {
          console.log('ERROR');
        })
        .always(function() {
          // Do nothing
        });
    },

    updateUi: function() {
      var $panel = $('.panel-weather');

      if (this.weather !== null) {
        $panel.find('.name').text(this.weather.name);
        $panel.find('.temperature .value').text(this.weather.main.temp);
        $panel.find('.humidity .value').text(this.weather.main.humidity);

        $panel.find('.loading').fadeOut(function() {
          $panel.find('.weather').fadeIn();
        });
      } else {
        $panel.find('.loading').fadeOut(function() {
          $panel.find('.unavailable').fadeIn();
        });
      }
    }

  };

  $(document).ready(function() {
    weather.init();
  });
}());
