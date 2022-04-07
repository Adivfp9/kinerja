<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class mpdf {
   
    function m_pdf()
    {
        $CI = & get_instance();
    }
    function load($param=NULL)
    {
        include_once APPPATH.'/helpers/mpdf/mpdf.php';
       
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';        
        }
       
        return new mPDF($param);
    }
}