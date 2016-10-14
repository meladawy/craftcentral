<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

 $user_id = $row->uid;
 // Get the image of the latest submitted design
 module_load_include('inc', 'webform', 'includes/webform.submissions');
 $design_submittion = webform_get_submissions(array('uid' => $user_id, 'nid' => 1),  NULL, 1) ;
 $design_submittion = !empty($design_submittion) ? reset($design_submittion) : "" ;
 $maker_design_fid = !empty($design_submittion) ? $design_submittion->data[7][0] : "" ;
 $maker_design_file = file_load($maker_design_fid) ;
 // Generate Resized Image from webform file id
 if(!empty($maker_design_file)) {
   $maker_design_uri = $maker_design_file->uri ;
   $maker_design_url = image_style_url("featured_design_maker", $maker_design_uri);
 }
?>

<div class="row">
  <!-- Print Designer Name & Latest Design Image -->
  <div class="col-xs-12">
    <div class="background-white design-maker-item shadow hover-shadow transition">
      <?php if(!empty($maker_design_url)) : ?>
        <?php print l('<img src="' . $maker_design_url . '" />', 'user/' . $user_id, array('html' => TRUE)) ;  ?>
      <?php endif; ?>

      <h3 class="designer-name margin-vertical-10"><?php print l($fields['first_name']->content . " " . $fields['last_name']->content, 'user/' . $user_id, array('html' => TRUE)) ; ?></h3>
    </div>
  </div>
</div>
