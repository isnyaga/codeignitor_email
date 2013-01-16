//Place this in the helper file.
//To call this helper in your application $this->load->helper('NAME_OF_THIS_FILE');
//to call the function $this->gmail(EMAIL,SUBJECT,MESSAGE);


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('gmail'))
{
      function gmail($email = '',$subject = '',$message = ''){
      
        $config = Array(
    'protocol' => 'mail', //others include SMTP, sendmail
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 587,
    'smtp_user' => 'YOUR_EMAIL_ADDRESS',
    'smtp_pass' => 'PASSWORD'
      );
      $CI =& get_instance();
     
     $CI->load->library('email', $config);
     $CI->email->set_newline("\r\n");
        
       
        $CI->email->from('YOUR_EMAIL_ADDRESS','YOUR_NAME');
        $CI->email->to($email);
        $CI->email->subject($subject);
        $CI->email->message($message);
        
        if($CI->email->send()){
          echo 'email sent';
       }else{
          echo show_error($this->email->print_debugger());
       }
       
    
    }
}
?>
