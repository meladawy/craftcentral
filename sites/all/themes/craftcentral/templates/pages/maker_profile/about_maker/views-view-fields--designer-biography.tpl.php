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

 $specialism = !empty($fields['specialism_13']->raw) ? $fields['specialism_13']->content : "" ;
 $profile_image = !empty($fields['field_profile_biography_image']->raw) ? $fields['field_profile_biography_image']->content : "" ;
 $bio = !empty($fields['bio_10']->raw) ? $fields['bio_10']->content : "" ;
 $mail = !empty($fields['mail_12']->raw) ? $fields['mail_12']->raw : $row->users_mail ;
 $website = !empty($fields['website_11']->raw) ? $fields['website_11']->raw : "" ;
?>
<div class="row">
  <!-- Specialism -->
  <div class="col-xs-12">
    <h3 class="designer-profile-specialism margin-bottom-45">
    <?php print $specialism ; ?>
    </h3>
  </div>
  <!-- Profile Image  -->
  <div class="col-md-2 col-xs-12 rounded-image designer-profile-image">
    <?php print $profile_image ; ?>
  </div>
  <!-- Biography  -->
  <div class="col-md-7 col-xs-12">
    <div class="designer-profile-biography">
      <label class="profile-label"><?php print t("Biography") ; ?></label>
      <div class="main-paragraph">
        <?php print $bio ; ?>
      </div>
    </div>
  </div>
  <!-- Contact Information -->
  <div class="col-md-3 col-xs-12 designer-connect">
    <div class="designer-profile-website">
    <label class="profile-label"><?php print t("Connect") ; ?></label>
    <?php if(!empty($website)) : ?>
      <div class="connect-item">
      <i class="fa fa-globe" aria-hidden="true"></i>
      <?php print l(t("Visit website"), $website) ; ?>
      </div>
    <?php endif ;?>
    </div>

    <div class="designer-profile-mail">
    <?php if(!empty($mail)) : ?>
        <div class="connect-item">
        <i class="fa fa-envelope-o" aria-hidden="true"></i>
        <?php print l(t("Contact this design maker"), "mailto:" . $mail) ; ?>
        </div>
    <?php endif ;?>
    </div>
  </div>
</div>
