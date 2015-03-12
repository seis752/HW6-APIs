// search-ajax-2.js
// Search functionality using jQuery.

(function() {
  'use strict';

  var search = {

    searchResultsUrl: 'search-results.php',
    searchResultsListHtml: '',

    init: function() {
      this.bindEvents();
    },

    bindEvents: function() {
      var _this = this;

      // Add "click" event handler to the "Search" button.
      $('#search-button').on('click', function() {
        _this.handleSearch();
      });
    },

    handleSearch: function() {
      var _this = this;
      var name = $('#name').val();
      var url = _this.searchResultsUrl + '?name=' + name;

      $.ajax({
        dataType: 'html',
        url: url
      })
        .done(function(data) {
          _this.searchResultsListHtml = $(data).find('#search-results-list');
          _this.updateUiSearchResults();
        })
        .fail(function() {
          console.log('ERROR');
        })
        .always(function() {
          // Do nothing
        });
    },

    updateUiSearchResults: function() {
      var $searchResultsContainer = $('#search-results');
      var $searchResultsListContainer = $('#search-results-list-container');

      $searchResultsListContainer.html(this.searchResultsListHtml);
      $searchResultsContainer.css('display', 'block');
    }

  };

  $(document).ready(function() {
    search.init();
  });
}());
