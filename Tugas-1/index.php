<?php
trait Hewan
{
    public $nama, $darah = 50, $jumlahKaki, $keahlian;
    public function atraksi()
    {
        echo ("$this->nama sedang $this->keahlian\n");
    }
}
trait Fight
{
    public $attackPower, $defencePower;

    public function serang($data = null)
    {
        if ($data) {
            echo ("$this->nama sedang menyerang $data->nama\n");
            $data->darah = $data->darah - ($this->attackPower / $data->defencePower);
        } else echo ("$this->nama gagal menyerang\n");
    }
    public function diserang($data)
    {
        if ($data) {
            echo ("$this->nama sedang diserang\n");
            $this->darah = $this->darah - ($data->attackPower / $this->defencePower);
        } else echo ("Serangan tidak kena\n");
    }
}

class status
{
    public function getInfoHewan()
    {
        echo ("Nama \t\t: $this->nama\n");
        echo ("Darah \t\t: $this->darah\n");
        echo ("Jumlah Kaki \t: $this->jumlahKaki\n");
        echo ("Keahlian \t: $this->keahlian\n");
        echo ("Attack Power \t: $this->attackPower\n");
        echo ("Defence Power \t: $this->defencePower\n");
    }
}

class Elang extends status
{
    use Hewan, Fight;
    public function __construct($data = "wiu")
    {
        $this->nama = $data;
        $this->jumlahKaki = 2;
        $this->keahlian = "Terbang Tinggi";
        $this->attackPower = 10;
        $this->defencePower = 5;
    }
}
class Harimau extends status
{
    use Hewan, Fight;
    public function __construct($nama = "miau")
    {
        $this->nama = $nama;
        $this->jumlahKaki = 4;
        $this->keahlian = "Lari Cepat";
        $this->attackPower = 7;
        $this->defencePower = 8;
    }
}


$elang = new Elang;
$harimau = new Harimau;

$elang->atraksi();
$elang->serang($harimau);
$elang->diserang($harimau);
$elang->getInfoHewan();
$harimau->getInfoHewan();
