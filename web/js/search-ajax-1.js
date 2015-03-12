// search-ajax-1.js
// Search functionality using XMLHttpRequest object directly.

(function() {
  'use strict';

  var search = {

    searchResultsUrl: 'search-results.php',
    searchResultsListHtml: '',

    init: function() {
      this.bindEvents();
    },

    bindEvents: function() {
      // Add "click" event handler to the "Search" button.
      document.getElementById('search-button')
        .addEventListener('click', this.handleSearch);
    },

    handleSearch: function() {
      var name = document.getElementById('name').value;
      var url = search.searchResultsUrl + '?name=' + name;
      var request = search.createXMLHttpRequest();

      if (request != null) {
        // Use "document" response type, so we can find elements in DOM later.
        request.responseType = 'document';

        request.onreadystatechange = function() {
          switch (request.readyState) {
            case 0: // UNSENT
              break;
            case 1: // OPENED
              break;
            case 2: // HEADERS_RECEIVED
              break;
            case 3: // LOADING
              break;
            case 4: // DONE
              if (request.status === 200) {
                search.searchResultsListHtml =
                  request.response.getElementById('search-results-list').outerHTML;

                search.updateUiSearchResults();
              } else {
                console.log('ERROR');
                console.log(request.response);
              }

              break;
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }
    },

    // Supports multiple ways for creating an XMLHttpRequest object.
    // REF: "Lecture05 - SEIS752 - Version Control & AJAX.pptx"
    createXMLHttpRequest: function() {
      var request = null;

      try {
        request = new XMLHttpRequest();
      } catch (ex1) {
        try {
          request = new window.ActiveXObject('Microsoft.XMLHTTP');
        } catch (ex2) {
          try {
            request = new window.ActiveXObject('Msxml2.XMLHTTP');
          } catch (ex3) {
            // Give up, return "null" request.
          }
        }
      }

      return request;
    },

    updateUiSearchResults: function() {
      var searchResultsContainer = document.getElementById('search-results');
      var searchResultsListContainer =
        document.getElementById('search-results-list-container');

      searchResultsListContainer.innerHTML = this.searchResultsListHtml;
      searchResultsContainer.style.display = 'block';
    }

  };

  search.init();
}());
