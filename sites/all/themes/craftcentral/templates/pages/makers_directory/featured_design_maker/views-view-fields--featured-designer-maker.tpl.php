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
 $maker_design_fid = $row->webform_submitted_data_webform_submissions_data;
 $maker_design_file = file_load($maker_design_fid) ;
 // Generate Resized Image from webform file id
 if(!empty($maker_design_file)) {
   $maker_design_uri = $maker_design_file->uri ;
   $maker_design_url = image_style_url("featured_design_maker", $maker_design_uri);
 }
 $user_id = $row->uid;
?>

<div class="row">
  <div class="col-xs-12 row">
    <!-- Featured Design Maker Image -->
    <div class="col-xs-4">
      <?php if(!empty($maker_design_url)) : ?>
        <img src="<?php print $maker_design_url; ?>" class="shadow" />
      <?php endif; ?>
    </div>
    <!-- Featured Design Maker Details -->
    <div class="col-xs-8">
      <!-- Print Designer Name  -->
      <div class="col-xs-12">
        <h3 class="designer-name margin-vertical-10"><?php print $fields['first_name']->content . " " . $fields['last_name']->content ; ?></h3>
      </div>
      <!-- Print Designer Specialist  -->
      <div class="col-xs-12">
        <h4 class="designer-specialism uppercase"><?php print $fields['specialism_13']->content ; ?></h4>
      </div>
      <!-- Print Designer Bio  -->
      <div class="col-xs-12">
        <p class="designer-bio main-paragraph"><?php print $fields['bio_10']->content ?></p>
      </div>
      <!-- View Profile -->
      <div class="col-xs-12">
        <?php print l(t("View Profile"),"user/".$user_id, array("attributes" => array("class" => array("uppercase", "btn", "view-profile", "margin-top-60", "transition")))) ; ?>
      </div>
    </div>
  </div>
</div>
