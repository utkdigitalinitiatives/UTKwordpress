(function($) {
  $(document).ready(function() {
      var url          = url_object.templateDirectory;
      var siteId       = url_object.siteId;
      var contentArray = url_object.contentArray;


      // constructs the suggestion engine
      var content = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('content'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: contentArray,
        sorter:function(a, b) {
          var InputString =   $('.twitter-typeahead > pre').text();
          // console.log(a.title);
          // console.log(b.title);
          // move exact matches to top
          if(InputString == a.title){ 
            return -1;
          }
          
          if(InputString == b.title){
            return 1;
          }

          //close match without case matching
          if(InputString.toLowerCase() == a.title.toLowerCase()){ 
            return -1;
          }
          
          if(InputString.toLowerCase() == b.title.toLowerCase()){
            return 1;
          } 

          if( (InputString != a.title) && (InputString != b.title)){

                if (a.title < b.title) {
                   return -1;
                }
                else if (a.title > b.title) {
                   return 1;
                }
                else return 0;
           }
        },
      });
       
      // kicks off the loading/processing of `local` and `prefetch`
      content.initialize();
       
      var myTypeahead = $('.supersearch').typeahead({
        highlight: true,
        autoselect: true
      },
      {
        name: 'search-content',
        displayKey: 'title',
        async: false,
        source: content.ttAdapter(),
        templates:{
          header: '<h3 class="typeaheadTitle">Filtering Content...</h3>',
          empty: [
                '<div class="noResults">',
                'No Results',
                '</div>'
              ].join('\n'),
          suggestion: Handlebars.compile('<li class="searchListItem"><a href="{{link}}" class="searchLink" aria-label="{{title}}">{{title}}</a></li>'),
        }
      },
      {
          name: 'default-search',
          source: function(query, callback) {
              callback([{searchlink: query , value: '<a class="search">Search Site</a>'}]);
          }
      }

      );
      
      myTypeahead.on('typeahead:selected', function($e, datum) {
        if(datum.searchlink) {
          var link = datum.searchlink;
          window.location='/?s='+link;
        } else {
          window.location=(datum["link"]);
        }
      });

      myTypeahead.on('typeahead:cursorchanged', function(e, datum){
        if(datum.searchlink) {
         $('.twitter-typeahead .tt-hint').val('');
         $('.twitter-typeahead .tt-input').val(datum.searchlink);
        } else {
          $(this).html(datum["value"]);
        }
        // var focused = $( document.activeElement )
        // var submenuHighlight = focused.parent().find('.tt-cursor');
        // submenuHighlight.attr('tabindex', 1);
        // console.log('Suggestion text: '+submenuHighlight.text());
      });

      myTypeahead.on('typeahead:closed', function($e, datum) {
        $(this).html("");
      });

      // Add aria dialog role
      $('.tt-dataset-search-content').attr({
        'role': 'dialog',
        'aria-live': 'assertive',
        'aria-relevant':'additions'
      });

  });

})(jQuery);