<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
 $account = menu_get_object('user');
 $civicrm_profile_data = !empty($account->uid) ? civicrm_custom_user_profile_get_contact($account->uid)  : "";
 // Override page title
 if(!empty($civicrm_profile_data['display_name'])) {
   $title = $civicrm_profile_data['display_name'] ;
   drupal_set_title($civicrm_profile_data['display_name']) ;
 }

?>


<div id="wrapper" class="transition">

<!-- Sidebar -->
<?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
<div id="sidebar-wrapper" class="transition">
  <a href="#menu-toggle" id="menu-toggle-close" class="sidebar-toggle text-size-30 text-color-pink"><i class="fa fa-times" aria-hidden="true"></i></a>
  <?php if (!empty($primary_nav)): ?>
    <?php print render($primary_nav); ?>
  <?php endif; ?>
  <?php if (!empty($secondary_nav)): ?>
    <?php print render($secondary_nav); ?>
  <?php endif; ?>
  <?php if (!empty($page['navigation'])): ?>
    <?php print render($page['navigation']); ?>
  <?php endif; ?>
</div>
<?php endif; ?>
<!-- /#sidebar-wrapper -->

<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="<?php print $container_class; ?>">
    <div class="row">
    <div class="header-left col-md-8">
      <!-- Sidebar button & region header left -->
      <div class="row">
        <div class="col-xs-12 line-height-30">
        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <a href="#menu-toggle" id="menu-toggle" class="sidebar-toggle pull-left text-size-30 text-color-pink"><i class="fa fa-bars" aria-hidden="true"></i></a>
        <?php endif; ?>

        <?php if(!empty($page['header_left'])) : ?>
          <div class="region-header-left pull-left">
            <?php print render($page['header_left']) ; ?>
          </div>
        <?php endif ; ?>
        </div>
      </div>
      <!-- Bread Crumb -->
      <div class="row">
        <div class="col-sm-11 col-sm-offset-1 col-xs-12 col-xs-offset-0 breadcrumb-wrapper">
          <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
        </div>
      </div>
    </div>

    <div class="navbar-header col-md-4">
      <?php if ($logo): ?>
        <a class="logo navbar-btn pull-right" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if (!empty($site_name)): ?>
        <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>
    </div>
  </div>
  </div>
</header>


<header role="banner" id="page-header">
  <?php if (!empty($site_slogan)): ?>
    <p class="lead"><?php print $site_slogan; ?></p>
  <?php endif; ?>

  <?php print render($page['header']); ?>
</header> <!-- /#page-header -->

<!-- Page title -->
<div class="container-fluid background-pink">
  <div class="container">
    <div class="col-xs-12">
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header pink-wrapped"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
    </div>
  </div>
</div>
<!-- End of : Page title  -->

<!-- Region full width -->
<?php if (!empty($page['region_full_width'])): ?>
<div class="container-fluid region-full-width">
  <div class="row">
    <div class="col-xs-12">
      <?php print render($page['region_full_width']); ?>
    </div>
  </div>
</div>
<?php endif ; ?>
<!-- End of : Region full width  -->

<!-- Region full width Gray -->
<?php if (!empty($page['region_full_width_gray'])): ?>
<div class="container-fluid region-full-width-gray background-gray">
  <div class="row">
    <div class="col-xs-12">
      <?php print render($page['region_full_width_gray']); ?>
    </div>
  </div>
</div>
<?php endif ; ?>
<!-- End of : Region full width Gray  -->

<div id="page-content-wrapper" class="transition">
<div class="main-container <?php print $container_class; ?>">
  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <a id="main-content"></a>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

<!-- Region full width Gray 2 -->
<?php if (!empty($page['region_full_width_gray_2'])): ?>
<div class="container-fluid region-full-width-gray-2 background-gray">
  <div class="row">
    <div class="col-xs-12">
      <?php print render($page['region_full_width_gray_2']); ?>
    </div>
  </div>
</div>
<?php endif ; ?>
<!-- End of : Region full width Gray 2 -->

<?php if (!empty($page['footer'])): ?>
  <footer class="footer">
    <?php print render($page['footer']); ?>
  </footer>
<?php endif; ?>
</div>
</div>
<!-- End of : #wrapper -->
