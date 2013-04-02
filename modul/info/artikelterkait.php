<?php

// koneksi ke database
include('../conn/config.php');

function artikelTerkait($id)
{
    // batas threshold 40%
    $threshold = 40;
    // jumlah maksimum artikel terkait yg ditampilkan 3 buah
    $maksArtikel = 3;

    // array yang nantinya diisi judul artikel terkait
    $listArtikel = Array();

    // membaca judul artikel dari ID tertentu (ID artikel acuan)
    // judul ini nanti akan dicek kemiripannya dengan artikel yang lain
    $query = "SELECT judul FROM artikel WHERE id = '$id'";
    $hasil = mysql_query($query);
    $data  = mysql_fetch_array($hasil);
    $judul = $data['judul'];

    // membaca semua data artikel selain ID artikel acuan
    $query = "SELECT id, judul FROM artikel WHERE id <> '$id'";
    $hasil = mysql_query($query);
    while ($data = mysql_fetch_array($hasil))
    {
        // cek similaritas judul artikel acuan dengan judul artikel lainnya
        similar_text($judul, $data['judul'], $percent);
        if ($percent >= $threshold)
        {
            // jika prosentase kemiripan judul di atas threshold
            if (count($listArtikel) <= $maksArtikel)
            {
               // jika jumlah artikel belum sampai batas maksimum, tambahkan ke dalam array
               $listArtikel[] = "<li><a href='artikel.php?id=".$data['id']."'>".$data['judul']."</a></li>";
            }
        }
    }	

    // jika array listartikel tidak kosong, tampilkan listnya
    // jika kosong, maka tampilkan 'tidak ada artikel terkait'
    if (count($listArtikel) > 0)
    {
        echo "<ul>";
        for ($i=0; $i<=count($listArtikel)-1; $i++)
        {
            echo $listArtikel[$i];
        }
        echo "</ul>";
    }
    else echo "<p>Tidak ada artikel terkait</p>";
}
?>
