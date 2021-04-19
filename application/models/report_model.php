<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_model extends CI_Model {
    function get_all_leads(){
        $query = "SELECT CONCAT(clients.first_name,' ',clients.last_name) AS client_name, count(*) AS number_of_leads
		            FROM leads 
		            INNER JOIN sites ON leads.site_id=sites.site_id
                    INNER JOIN clients ON sites.client_id=clients.client_id
                    GROUP BY clients.client_id
                    ORDER BY clients.client_id ASC";
        return $this->db->query($query)->result_array();
    }
    function get_lead_by_date($date){
        $query = "SELECT CONCAT(clients.first_name,' ',clients.last_name) AS client_name, sites.domain_name AS website, count(*) AS number_of_leads, MONTHNAME      (registered_datetime) AS month_generated
                    FROM leads 
                    INNER JOIN sites ON leads.site_id=sites.site_id
                    INNER JOIN clients ON sites.client_id=clients.client_id
                    WHERE DATE_FORMAT(leads.registered_datetime, '%Y %d %Y') > DATE_FORMAT(?, '%Y %m %d') AND DATE_FORMAT(leads.registered_datetime,'%Y %m %d' ) < DATE_FORMAT(?,'%Y %m %d' )
                    GROUP BY clients.client_id 
                    ORDER BY clients.client_id ASC;";
        $date_from=date("Y-m-d H:i:s",strtotime($date['from']));
        $date_to=date("Y-m-d H:i:s",strtotime($date['to']));
        $values = array(
                    $date_from,
                    $date_to,
                );
        return $this->db->query($query,$values)->result_array();
    }
}