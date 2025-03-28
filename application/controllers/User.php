<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->library('session'); 



	}


//-------------------------CHANGE LANGUAVAGE ---------------------------------------------------------------------

	public function change_language($lang = "english")
	{

		$this->session->set_userdata('site_language', $lang);
		redirect($_SERVER['HTTP_REFERER']); // Redirect back to the previous page
	}


//-----------------------------------GET USER DATA ----------------------------------------------------------------
	public function get_userdata($user_id)
	{

		if (!$user_id) {
			show_error("User is not logged in", 401);
			return null;
		}

		$api_url = "http://localhost/jyotisika_api/User/User_Auth/getuser_info";


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["session_id" => $user_id]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_error = curl_error($ch);
		curl_close($ch);

		
		if ($http_code !== 200) {
			show_error($response . $http_code, 500);
			return null;
		} else if ($http_code == 200) {

			$data['userdata'] = json_decode($response, true);

			if (!$data['userdata'] || !isset($data['userdata']['status']) || $data['userdata']['status'] !== "success") {
				show_error("Invalid user data received from API", 500);
				return null;
			} else if ($data['userdata']['status'] == "success") {
				$data["userinfo"] = $data['userdata']['data'];
				return $data["userinfo"];
			} else {
				return null;
			}

		}

	}



//------------------------------------------- USER  SELF PAGES---------------------------------------------------------------------

	public function Home()
	{
		$user_id = $this->session->userdata('user_id');
		$data = [];

		if (!empty($user_id)) {
			$getdata = $this->get_userdata($user_id);

			if ($getdata != null) {
				$data["userinfo"] = $getdata;
			} else {
				redirect("UserLoginSignup/Login");
			}
		}


		$language = $this->session->userdata('site_language') ?? 'english';


		$this->lang->load('message', $language);
		$this->load->view('User/Home', $data);
	}



	public function UserProfile()
	{
		$user_id = $this->session->userdata('user_id');

		if (!$user_id) {

			$this->load->view("UserLoginSignup/Login");
		} else {
			$data["userinfo"] = $this->get_userdata($user_id);

			if (!$data["userinfo"]) {
				show_error("Failed to fetch user profile", 500);
				$this->load->view("User/Login");
			}

			$this->load->view("User/UserProfile", $data);
		}
	}








	


// ------------------------------------------USER API PAGES -------------------------------------------------------------
	public function FreeKundli()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view('User/FreeKundli');
	}

	

	public function KundliMatching()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view('User/KundliMatching');
	}
	public function Panchang()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view('User/Panchang');
	}

	public function KP()
	{


		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$this->load->view('User/KP');
	}




//------------------------------------------USER FESTIVAL PAGES---------------------------------------------------------

	public function Festival()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view('User/Festival');
	}


	public function FestivalReadmore()
	{
		$this->load->view('User/FestivalReadmore');
	}




	
//------------------------------------------JYOTISIKA MALL---------------------------------------------------------------------------
	public function JyotisikaMall()
	{
		$this->load->view('User/JyotisikaMall');
	}

	
	public function ProductDetails()
	{
		$this->load->view('User/ProductDetails');
	}

	public function ProductPayment()
	{
		$this->load->view('User/ProductPayment');
	}







//-------------------------------- HOROSCOPE PAGES ------------------------------------------------------------------
	public function TodayHoroscope()
	{
		$this->load->view('User/TodayHoroscope');
	}

	public function HoroscopeReadmore()
	{
		$this->load->view('User/HoroscopeReadmore');
	}





	//----------------------------------ASTROLOGERS PAGES ---------------------------------------------------------
	public function Astrologers()
	{
		$this->load->view('User/Astrologers');
	}

	public function ViewAstrologer()
	{
		$this->load->view('User/ViewAstrologer');
	}

	public function AstrologyServices()
	{
		$this->load->view('User/AstrologyServices');
	}

	public function Following()
	{
		$this->load->view('User/Following');
	}




//---------------------------------------Book PUJA AND PUJARI SECTION ---------------------------------------------------


	public function BookPooja()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view('User/BookPooja');
	}

	public function PoojaInfo()
	{
		$this->load->view('User/PoojaInfo');
	}



	public function OfflinePoojaris()
	{
		$this->load->view('User/OfflinePoojaris');
	}




	public function PoojarViewMore()
	{
		$this->load->view('User/PoojarViewMore');
	}


	public function OnlinePoojaris()
	{
		$this->load->view("user/OnlinePoojaris");
	}

	

	
	

	


	public function Poojaris()
	{
		$this->load->view('User/Poojaris');
	}



	





//---------------------------------------USER NOTIFICATION SECTION  -----------------------------------------------
	public function ServiceDetails()
	{
		$this->load->view('User/ServiceDetails');
	}




	public function Orders()
	{
		$this->load->view('User/Orders');
	}

	
	public function Notification()
	{
		$this->load->view('User/Notification');
	}



	public function CustomerSupport()
	{
		$this->load->view('User/CustomerSupport');
	}

	
	//----------------------------------------USER MOB PUJA --------------------------------------------------

	public function MobPooja()
	{
		$this->load->view('User/MobPooja');
	}





//----------------------------------------------------SOME OTHER PAGES-------------------------------------

public function WhyUs()
{
	$this->load->view('User/WhyUs');
}



	// ------------------------USER OTHER PARTS -------------------------------------------------------------
	public function ShowFreeKundli()
	{
		$this->load->view('User/ShowFreeKundli');
	}



	

	public function Recharge()
	{
		$this->load->view('User/Recharge');
	}

	public function getdata()
	{

	}

	public function Demo()
	{
		$this->load->view('User/Demo');
	}
}
