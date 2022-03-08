<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PesananModel;

class LaporanController extends Controller{

    /**
     * instance of the main request object
     * 
     * @var HTTP\incomIngrequest
     */
    protected $request;

    function __construct()
    {
        $this->laporan= new PesananModel();
    }

    public function tampil()
    {
        $data['data']= $this->laporan->findAll();
        return view('DetailPesananList',$data);
    }
    public function delete($id)
    {
        $this->laporan->delete($id);
        return redirect('laporan')->with('success','Data Berhasil Dihapus');
    }
}