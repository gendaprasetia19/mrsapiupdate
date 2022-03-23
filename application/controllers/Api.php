<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->data['module'] = 'API';
    $this->load->helper('url');
  }

  public function dashboard()
	{

		$this->load->view('dashboard');

	}

	public function index()
	{
	      header("Content-Security-Policy: default-src *; style-src 'self' 'unsafe-inline'; font-src 'self' data:; script-src 'self' 'unsafe-inline' 'unsafe-eval'");                    
		    $this->data['title'] = 'API';
            // persiapkan curl
        $ch = curl_init();
        $header = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: Basic bXJzaW5lcmdpdGFzYWRtaW46UEBzc3cwcmQ=';

        $url="http://mrsinergitas.test.oceanxecm.com/api/v2/doc/70/items/";
        $username = 'mrsinergitasadmin';
        $password = 'P@ssw0rd';
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch, CURLOPT_USERPWD , $username . ':' . $password);

        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $json = json_decode($response, true);

        // $output contains the output string
        $this->data['data'] = $json['data'];

        // tutup curl
        curl_close($ch);

		$this->load->view('index', $this->data);

	}

  public function ListData()
	{
	      header("Content-Security-Policy: default-src *; style-src 'self' 'unsafe-inline'; font-src 'self' data:; script-src 'self' 'unsafe-inline' 'unsafe-eval'");                    
		    $this->data['title'] = 'API';
            // persiapkan curl
        $ch = curl_init();
        $header = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: Basic bXJzaW5lcmdpdGFzYWRtaW46UEBzc3cwcmQ=';

        $url="http://mrsinergitas.test.oceanxecm.com/api/v2/doc/70/items/";
        $username = 'mrsinergitasadmin';
        $password = 'P@ssw0rd';
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch, CURLOPT_USERPWD , $username . ':' . $password);

        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $json = json_decode($response, true);

        // $output contains the output string
        $this->data['data'] = $json['data'];

        // tutup curl
        curl_close($ch);

		$this->load->view('listdatarm', $this->data);

	}

  public function getrekammediklist()
	{
    $id = $this->uri->segment(3);

    header("Content-Security-Policy: default-src *; style-src 'self' 'unsafe-inline'; font-src 'self' data:; script-src 'self' 'unsafe-inline' 'unsafe-eval'");                    
    $this->data['title'] = 'API';
        // persiapkan curl
    $ch = curl_init();
    $header = array();
    $header[] = 'Content-length: 0';
    $header[] = 'Content-type: application/json';
    $header[] = 'Authorization: Basic bXJzaW5lcmdpdGFzYWRtaW46UEBzc3cwcmQ=';

    $url="http://mrsinergitas.test.oceanxecm.com/api/v2/doc/$id/items/";
    $username = 'mrsinergitasadmin';
    $password = 'P@ssw0rd';

    // set url
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_USERPWD , $username . ':' . $password);

    // return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);

    $json = json_decode($response, true);

    // $output contains the output string
    $this->data['data'] = $json['data'];

    // tutup curl
    curl_close($ch);

    $this->load->view('listbyrmname', $this->data);

	}

  public function GetFileListRmNo()
	{

    $passRmNo = $this->uri->segment(3);

    header("Content-Security-Policy: default-src *; style-src 'self' 'unsafe-inline'; font-src 'self' data:; script-src 'self' 'unsafe-inline' 'unsafe-eval'");                    
    $this->data['title'] = 'API';
        // persiapkan curl
    $ch = curl_init();
    $header = array();
    $header[] = 'Content-length: 0';
    $header[] = 'Content-type: application/json';
    $header[] = 'Authorization: Basic bXJzaW5lcmdpdGFzYWRtaW46UEBzc3cwcmQ=';
    $url="http://mrsinergitas.test.oceanxecm.com/api/v2/doc/70/items/";
    $username = 'mrsinergitasadmin';
    $password = 'P@ssw0rd';
    // set url
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_USERPWD , $username . ':' . $password);

    // return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $json = json_decode($response, true);
    $data['data'] = $json['data'];

    $newRmNo = "";
    foreach($data['data'] as $key)
    {
      if($passRmNo == substr_replace($key['children_item'],"", -1))
      {
        $newRmNo  = $key['id'];
      }

    }

    header("Content-Security-Policy: default-src *; style-src 'self' 'unsafe-inline'; font-src 'self' data:; script-src 'self' 'unsafe-inline' 'unsafe-eval'");                    
    $this->data['title'] = 'API';
        // persiapkan curl
    $ch = curl_init();
    $header = array();
    $header[] = 'Content-length: 0';
    $header[] = 'Content-type: application/json';
    $header[] = 'Authorization: Basic bXJzaW5lcmdpdGFzYWRtaW46UEBzc3cwcmQ=';
    $url="http://mrsinergitas.test.oceanxecm.com/api/v2/doc/$newRmNo/items/";
    $username = 'mrsinergitasadmin';
    $password = 'P@ssw0rd';
    // set url
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_USERPWD , $username . ':' . $password);

    // return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $jsonRM = json_decode($response, true);
    $this->data['data'] = $jsonRM['data'];

    // tutup curl
    curl_close($ch);

    $this->load->view('listfile', $this->data);
	}

	public function get_image($id)
	{
	    header("Content-Security-Policy: default-src *; style-src 'self' 'unsafe-inline'; font-src 'self' data:; script-src 'self' 'unsafe-inline' 'unsafe-eval'");                    
            // persiapkan curl
        $ch = curl_init();

        $header = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: Basic bXJzaW5lcmdpdGFzYWRtaW46UEBzc3cwcmQ=';

        $url= "http://mrsinergitas.test.oceanxecm.com/api/v2/doc/".$id."/?latest_version=true";
        //$url="http://mrsinergitas.test.oceanxecm.com/api/v2/files/".$id."/preview/?latest_version=true";
        $username = 'mrsinergitasadmin';
        $password = 'P@ssw0rd';
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch, CURLOPT_USERPWD , $username . ':' . $password);

        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $json = json_decode($response, true);

        // $output contains the output string
        file_put_contents('assets/file/'.$id.'.pdf', $response);
        echo $response;

        // tutup curl
        curl_close($ch);

	}

}
