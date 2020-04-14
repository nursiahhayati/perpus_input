<?php
require('MPerpus.php');
class mahasiswa {
    public $id_buku;
    public $id_kategori;
    public $judul_buku;
    public $kategori;
    public $penerbit;
    
    public function _construct(
        $id_buku="Belum diketahui",
        $id_kategori="Belum Diketahui",
        $judul_buku="Belum Diketahui",

        $kategori="Belum Diketahui",
		$penerbit="Belum Diketahui",
       $a="aaaa"
								)
    {
    $this->id_buku=$id_buku;
    $this->id_kategori=$id_kategori;
    $this->judul_buku=$judul_buku;
    $this->kategori=$kategori;
    $this->penerbit=$penerbit;
  
    } 
    public function cetaklist()
    {  
        $modelMmahasiswa= new MPerpus; 
        $query_list=$modelMmahasiswa->getAll();
        require('VPerpus/daftar_buku.php');
    }
    public function detail()
    {
        $modelMmahasiswa= new MPerpus(); 
        $query_list=$modelMmahasiswa->getDetail();
        $id_buku=$_GET['id_buku'];
        require('VPerpus/detail.php');
    }
    public function hapus()
    {
        $modelMmahasiswa= new MPerpus(); 
        $query_list=$modelMmahasiswa->getHapus();
        $id_buku=$_GET['id_buku'];
        header('location: index.php');
    }
     public function update($id_buku)
     {
        if (!isset($_POST['tombol']))
        {
        $modelMmahasiswa= new MPerpus(); 
        $query_list=$modelMmahasiswa->getDetail($id_buku);
        $row=mysqli_fetch_array($query_list);

         require('VPerpus/formupdate.php');
            
        } else {
           // $this->id_kategori=$_POST['id_kategori'];
		   
			$this->judul_buku=$_POST['judul_buku'];
			$this->kategori=$_POST['kategori'];
			
			if($this->kategori=="Sastra"){
				//$a="Sastra";
            $this->id_kategori='k001';
			}
			if($this->kategori=="Sains"){
				//$a="Sains";
            $this->id_kategori='k002';
			}
			if($this->kategori=="Sosial"){
				//$a="Sosial";
            $this->id_kategori='k003';
			}
			if($this->kategori=="Komik"){
				//$a="Komik";
            $this->id_kategori='k004';
			}
			$a="fhg";

            $this->penerbit=$_POST['penerbit'];



            $modelMmahasiswa= new MPerpus(); 
            $exe=$modelMmahasiswa->getUpdate($this);
            if ($exe>0) {
            header ('location: index.php');    
            }else{
                echo "gagal";
            }      
        }
     }
public function inputmahasiswa()
    {
        if (!isset($_POST['tombol']))
        {
         include('VPerpus/forminput.php');
        } else {
            $this->id_buku=$_POST['id_buku'];
			$this->id_kategori=$_POST['id_kategori'];
			$this->judul_buku=$_POST['judul_buku'];
            $this->kategori=$_POST['kategori'];
            $this->penerbit=$_POST['penerbit'];
            $modelPerpus = new MPerpus(); 
            $query_list = $modelPerpus->inputdata($this);
            header('location: index.php');   
        }
    }
    }
?>