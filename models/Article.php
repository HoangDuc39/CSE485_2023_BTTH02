<?php
class Article{
    // Thuộc tính
    private $ma_bviet;
    private $tieude;
    private $ten_bhat;
    private $ten_tloai;
    private $tomtat;
    private $noidung;
    private $ten_tgia;
    private $hinhanh;

    public function __construct($ma_bviet,$tieude, $ten_bhat,$ten_tloai,$tomtat,$noidung,$ten_tgia,$hinhanh){
        $this->ma_bviet = $ma_bviet;
        $this->tieude = $tieude;
        $this->ten_bhat = $ten_bhat;
        $this->ten_tloai = $ten_tloai;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->ten_tgia = $ten_tgia;
        $this->hinhanh = $hinhanh;
    }

    // Setter và Getter
    public function getMa_bviet(){
        return $this->ma_bviet;
    }
    public function getTieude(){
        return $this->tieude;
    }
    public function getTen_bhat(){
        return $this->ten_bhat;
    }
    public function getTen_tloai(){
        return $this->ten_tloai;
    }
    public function getTomtat(){
        return $this->tomtat;
    }
    public function getNoidung(){
        return $this->noidung;
    }
    public function getTen_tgia(){
        return $this->ten_tgia;
    }
    public function getHinhanh(){
        return $this->hinhanh;
    }
}