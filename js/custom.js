$(function(){
  
  var $container = $('#container'),
      $filterLinks = $('#filters a');
  
  $container.isotope({
    itemSelector: '.item-img',
    filter: '*'
  });

  $('.portfolio_menu ul li').click(function(){
  $('.portfolio_menu ul li').removeClass('active_prot_menu');
  $(this).addClass('active_prot_menu');
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