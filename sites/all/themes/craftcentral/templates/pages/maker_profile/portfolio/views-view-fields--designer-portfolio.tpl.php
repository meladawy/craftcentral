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
   $maker_design_url = image_style_url("designer_portfolio", $maker_design_uri);
 }
 // Portfolio Data
 $design_name = !empty($fields['data_1']->raw) ? $fields['data_1']->content : "" ;
 $design_description = !empty($fields['data_2']->raw) ? $fields['data_2']->raw : "" ;

?>


<div class="background-white design-maker-item designer-portolio-item shadow transition">
  <?php if(!empty($maker_design_url)) : ?>
    <?php print '<img src="' . $maker_design_url . '" />' ; ?>
  <?php endif; ?>

  <h3 class="design-name text-left margin-vertical-10"><?php print $design_name ; ?></h3>

  <div class="main-paragraph text-left"> <?php print $design_description ; ?> </div>
</div>
