$(function(){
  
  var $container = $('#feature'),
      $filterLinks = $('#filters a');
  
  $container.isotope({
    itemSelector: '.item',
    filter: '.red'
  });
  
  $filterLinks.click(function(){
    var $this = $(this);
    
    // don't proceed if already selected
    if ( $this.hasClass('selected') ) {
      return;
    }
    
    $filterLinks.filter('.selected').removeClass('selected');
    $this.addClass('selected');
    
    // get selector from data-filter attribute
    selector = $this.data('filter');
    
    $container.isotope({
      filter: selector
    });
    
    
  });
  
});