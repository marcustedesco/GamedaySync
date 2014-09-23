<?php
/*
 * Time_model
 *
 */
class Time_model extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   public function getDeadline()
   {
      $id = 1;
      $row = $this->db->get_where('deadlines', array('id' => $id))->row();
      $data['id'] = $row->id;
      $data['milliseconds'] = $row->milliseconds;

      return $data;
   }

   public function setDeadline($userset)
   {
      $data = array(
         'milliseconds' => $userset
      );

      $this->db->where('id', 1);
      $this->db->update('deadlines', $data); 

      return true;
   }
}
