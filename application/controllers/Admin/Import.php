<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

    // public function index()
    // {
    //     $data['title'] = 'Import Excel';
    //     $data['mahasiswa'] = $this->db->get('mahasiswa')->result();
    //     $this->load->view('import/index', $data);
    // }

    public function create()
    {
        $data['title'] = "Upload File Excel";
        $this->load->view('import/create', $data);
    }

    public function excel()
    {
        // var_dump("ini import");
        // die();
        if(isset($_FILES["file"]["name"])){
                  // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size =$_FILES['file']['size'];
            $file_type=$_FILES['file']['type'];
                // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach($object->getWorksheetIterator() as $worksheet){

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for($row=4; $row<=$highestRow; $row++){

                    $nis = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $password = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nama_santri = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nama_kelas = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $tahun_angkatan = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $jenis_kelamin = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $no_hp = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $nama_ayah = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $nama_ibu = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $no_hp_ortu = $worksheet->getCellByColumnAndRow(11, $row)->getValue();

                    $tanggal_upload = date('Y-m-d h:i:s');
                    $hak_akses  = 'santri';

                    $data[] = array(
                        'nis'          => $nis,
                        'password'    => md5($password),
                        'hak_akses' =>  $hak_akses,
                        'nama_santri'         => $nama_santri,
                        'nama_kelas'         => $nama_kelas,
                        'tahun_angkatan' => $tahun_angkatan,
                        'jenis_kelamin'         => $jenis_kelamin,
                        'no_hp'         => $no_hp,
                        'email' => $email,
                        'alamat' => $alamat,
                        'nama_ayah'         =>$nama_ayah,
                        'nama_ibu'         =>$nama_ibu,
                        'no_hp_ortu'      =>$no_hp_ortu,
                        'tanggal' => $tanggal_upload
                    );

                    // var_dump($data);
                    // die();

                } 

            }

            $this->db->insert_batch('tbl_santri', $data);

            $message = array(
                'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );

            echo $this->session->set_flashdata('msg','success-excel');
            redirect('Admin/siswa');
        }
        else
        {

            $message = array(
                'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );

            $this->session->set_flashdata($message);
            redirect('Admin/siswa');
        }
    }

}

/* End of file Import.php */
/* Location: ./application/controllers/Import.php */

