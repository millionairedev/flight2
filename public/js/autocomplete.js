/*const search = document.getElementById('search');
const matchList = document.getElementById('match-list');

// Search the states.json and filter it
const searchStates = async searchText => {
    const res = await fetch('../data/states.json');
    const states = await res.json();

    // Get matches to current text input
    let matches = states.filter(state => {
        const regex = new RegExp(`^${searchText}`, 'gi');
        return state.name.match(regex) || state.abbr.match(regex);
    });

    if (searchText.length == 0) matches = [];

    outputHtml(matches);
}

// show result in Html

const outputHtml = matches => {
    if (matches.length > 0) {
        const html = matches.map(match => `
            <div class="card card-body mb-4">
                <h4>
                    ${match.name} (${match.abbr}) 
                    <span class="text-primary">${match.capital}</span>
                    <small>Lat: ${match.lat} / Long: ${match.long} </small>    
                </h4>
            </div>
        `).join('');

        matchList.innerHTML = html;
    }
}

search.addEventListener('input', () => searchStates(search.value));
*/
$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    $('#search').keyup(function(){
     $('#result').html('');
     $('#state').val('');
     var searchField = $('#search').val();
     var expression = new RegExp(searchField, "i");
     $.getJSON('../data/states.json', function(data) {
      $.each(data, function(key, value){
       if (value.name.search(expression) != -1 )
       {
        $('#result').append('<li class="list-group-item"> '+value.code+' | <span class="text-muted">'+value.name+'</span></li>');
       }
      });   
     });
    });
  
  
    $('#result').on('click', 'li', function() {
     var click_text = $(this).text().split('|');
     $('#search').val($.trim(click_text[0]));
     $("#result").html('');s
    });
   });

   $(document).ready(function(){
    $.ajaxSetup({ cache: false });
    $('#searchdestination').keyup(function(){
     $('#result1').html('');
     $('#state').val('');
     var searchField = $('#searchdestination').val();
     var expression = new RegExp(searchField, "i");
     $.getJSON('../data/states.json', function(data) {
      $.each(data, function(key, value){
       if (value.name.search(expression) != -1 )
       {
        $('#result1').append('<li class="list-group-item"> '+value.code+' | <span class="text-muted">'+value.name+'</span></li>');
       }
      });   
     });
    });
    
    $('#result1').on('click', 'li', function() {
     var click_text = $(this).text().split('|');
     $('#searchdestination').val($.trim(click_text[0]));
     $("#result1").html('');s
    });
   });