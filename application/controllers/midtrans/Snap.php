<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods:GET,OPTIONS");

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-N9EiBhn0Cm5Ds-Y8ea02I3E7', 'production' => false);
		$this->load->library('midtrans');
		$this->load->Model('M_pembayaran');
		$this->load->Model('M_status_pembayaran');
		$this->midtrans->config($params);
		$this->load->helper('url');	
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{
		

		$nis = $this->input->post('nis');
		$nama_santri = $this->input->post('nama_santri');
		$nama_kelas = $this->input->post('nama_kelas');
		$no_hp_ortu = $this->input->post('no_hp_ortu');
		$pesan = $this->input->post('pesan');
		$bulan = $this->input->post('bulan');
		$jumlah_bayar = $this->input->post('jumlah_bayar');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$tanggal_upload = date('Y-m-d h:i:s');


		$cek_bulan = date('F',strtotime($bulan));
		// Required
		$transaction_details = array(
			'order_id' => rand(),
		  'gross_amount' => $jumlah_bayar, // no decimal allowed for creditcard
		  'nis' => $nis,
		  'nama_santri' => $nama_santri,
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $jumlah_bayar,
			'quantity' => 1,
			'name' => "Pembayaran SPP Bulan".$cek_bulan
		);



		// Optional
		$item_details = array ($item1_details);

		// Optional
		// $billing_address = array(
		// 	'first_name'    => $nama_santri,
		// 	'address'       => $alamat,
		// 	'phone'         => $no_hp_ortu,
		// 	'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		// 	'first_name'    => $nama_santri,
		// 	'address'       => $alamat,
		// 	'phone'         => $no_hp_ortu,
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
			'first_name'    => $nama_santri


			// 'billing_address'  => $billing_address,
			// 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O",$time),
			'unit' => 'minute', 
			'duration'  => 120
		);

		$transaction_data = array(
			'transaction_details'=> $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		$get_order_id = $transaction_details['order_id'];

		$data = array(
			'nis' => $nis,
			'order_id' => $get_order_id,
			'nama_santri' => $nama_santri,
			'nama_kelas' => $nama_kelas,
			'no_hp_ortu' => $no_hp_ortu,
			'pesan' 	=> $pesan,
			'jumlah_bayar' => $jumlah_bayar,
			'email' => $email,
			'alamat' => $alamat,
			'bulan' => $cek_bulan,
			'tanggal_upload' => $tanggal_upload
		);


		$input = $this->M_pembayaran->input_data($data, 'tbl_pembayaran');

		error_log(json_encode($transaction_data));
		// $this->M_pembayaran->input_data($data,'tbl_pembayaran');
		$snapToken = $this->midtrans->getSnapToken($transaction_data);

		

		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'),true);
		// echo "<pre>";
		// var_dump($result);
		// echo "</pre>";
		// die();
		$nama_santri = $this->input->post('nama_santri');
		$nama_kelas = $this->input->post('nama_kelas');
		$tahun_angkatan = $this->input->post('tahun_angkatan');
		$nis = $this->input->post('nis');
		$no_hp_ortu = $this->input->post('no_hp_ortu');
	

		//$bulan =  date('F');
		$tanggal_upload =  date('Y-m-d h:i:s');

		$bulan = $this->input->post('bulan');



		$cek_bulan = date('F',strtotime($bulan));

		$tahun  =date('Y');
		$cek_pembayaran_bulan = $this->M_pembayaran->cek_pembayaran_siswa_bulan($cek_bulan,$nis);
		
		if ($cek_pembayaran_bulan) {
			
			echo $this->session->set_flashdata('msg', 'warning-sudah');
			redirect('Admin/Pembayaran/pembayaran_santri/');
		}
		$data  = [

			'order_id' => $result['order_id'],	
			'nis' => $nis,
			'nama_santri' => $nama_santri,
			'nama_kelas' => $nama_kelas,
			'bulan' => $cek_bulan,
			'tahun' => $tahun,
			'tanggal_upload' => $tanggal_upload,
			'tahun_angkatan' => $tahun_angkatan,
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'bank' => $result['va_numbers'][0]["bank"],
			'va_number' => $result['va_numbers'][0]["va_number"],
			'pdf_url' => $result['pdf_url'],
			'status_code' => $result['status_code']
		];

		$simpan = $this->M_status_pembayaran->input_data($data,'tbl_status_pembayaran');


		$curl = curl_init();
		$token = "ytTsN7yw6Xh3z8S1IJe8GKyO4gFT1F9J2ukCSObdu8y0xusoFGr0V5Nqk7kbykBu";
		$data = [
			'phone' => $no_hp_ortu,
			'message' => 'Terimaskih Telah Melakukan Pembayaran Bulan, '.$cek_bulan,
		];
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				"Authorization: $token",
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL,  "https://jogja.wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo $this->session->set_flashdata('msg', 'success-bayar');
		redirect('Admin/Pembayaran/pembayaran_santri/');
	}
}
