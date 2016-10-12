Drupal.behaviors.sidebarToggle = {
  attach : function(context) {
    jQuery("#menu-toggle, .sidebar-toggle").click(function(e) {
        e.preventDefault();
        jQuery("#wrapper").toggleClass("toggled");
    });
  },
  detach: function(context, settings, trigger) { //this function is option
    jQuery("#menu-toggle, .sidebar-toggle").unbind("click"); //or do whatever you want;
  }
}
