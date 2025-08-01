<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AstrologerUser extends CI_Controller
{

	public function AstrologerDashboard()
	{
		$this->load->view('Astrologer/AstrologerDashboard');
	}
	public function AstrologerNav()
	{
		$this->load->view('Astrologer/AstrologerNav');
	}
	public function AstrologerFooter()
	{
		$this->load->view('Astrologer/AstrologerFooter');
	}
	public function RegisterForm()
	{
		$this->load->view('Astrologer/RegisterForm');
	}
	public function AstrologerAnalyticsandEarning1()
	{
		$this->load->view('Astrologer/AstrologerAnalyticsandEarning1');
	}
	public function AstrologerAnalyticsAndEarning2()
{
    $this->load->library('session');
    $astrologerId = $this->session->userdata('astrologer_id');

    $data = [
        'astrologer_id' => $astrologerId,
        'chatPageUrl' => base_url('AstrologerUser/AstrologerChatUI')
    ];

    $this->load->view('Astrologer/AstrologerAnalyticsAndEarning2', $data);
}

	public function AstrologerEarningsBreakdown()
	{
		$this->load->view('Astrologer/AstrologerEarningsBreakdown');
	}
	public function List()
	{
		$this->load->view('Astrologer/List');
	}
	public function AstrologerMobileNumberAndOTPForm()
	{
		$this->load->view('Astrologer/AstrologerMobileNumberAndOTPForm');
	}
	public function AstrologerMonthlyEarningsBreakdown()
	{
		$this->load->view('Astrologer/AstrologerMonthlyEarningsBreakdown');
	}
	public function AstrologerReg()
	{
		$this->load->view('Astrologer/AstrologerReg');
	}
	public function AstrologerRecentRequest()
	{
		$this->load->view('Astrologer/AstrologerRecentRequest');
	}
	public function AstrogerRegistrationForm()
	{
		$this->load->view('Astrologer/AstrogerRegistrationForm');
	}
	public function AstrologyAndSpiritualServices()
	{
		$this->load->view('Astrologer/AstrologyAndSpiritualServices');
	}
	public function AudioAndVideoCall()
	{
		$this->load->view('Astrologer/AudioAndVideoCall');
	}
	public function AstrologerProfileForm()
	{
		$this->load->view('Astrologer/AstrologerProfileForm');
	}
	public function AstrologerChatUI()
	{

		$this->load->library('session');
		$data['astrologer_id'] = $this->session->userdata('astrologer_id');
		$this->load->view('Astrologer/AstrologerChatUI', $data);
	}


	public function AstrologerTodaysSchedule()
	{
		$this->load->view('Astrologer/AstrologerTodaysSchedule');
	}
	public function AstrologerFeedBackCard()
	{
		$this->load->view('Astrologer/AstrologerFeedBackCard');
	}
	public function ConsultationCards()
	{
		$this->load->view('Astrologer/ConsultationCards');
	}
}
