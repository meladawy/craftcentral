<?php
/**
 * @file
 * The primary PHP file for this theme.
 */



 /**
  * I'm just lazy to create a custom module for this function
  * Retrieves a CiviCRM contact by Drupal user ID.
  */
 function civicrm_custom_user_profile_get_contact($uid) {
   $contacts = &drupal_static(__FUNCTION__);
   if (isset($contacts[$uid])) {
     return $contacts[$uid];
   }
   if (!isset($contacts)) {
     $contacts = array();
   }
   $contacts[$uid] = FALSE;
   civicrm_initialize();
   require_once 'api/api.php';
   $res = civicrm_api('uf_match', 'get', array('uf_id' => $uid, 'version' => 3));
   if ($res['is_error'] || empty($res['id']) || empty($res['values'][$res['id']])) {
     return FALSE;
   }
   $id = $res['values'][$res['id']]['contact_id'];
   $res = civicrm_api('contact', 'get', array('contact_id' => $id, 'version' => 3));
   if ($res['is_error']) {
     return FALSE;
   }
   $contacts[$uid] = $res['values'][$res['id']];
   return $contacts[$uid];
 }
