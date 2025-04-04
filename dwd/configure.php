<?php

    $connect = mysqli_connect('localhost','root','','dwd');

    function query($query)
    {
        global $connect;

        $row = [];
        $process_query = mysqli_query($connect,$query);

        while($row = mysqli_fetch_array($process_query))
        {
            $rows[] = $row;
        }
        return $rows;
    }

    function create_user($data)
    {
        global $connect;

        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $password_confirm = htmlspecialchars($data['password_confirm']);

        if($password !== $password_confirm){
            echo "  <script>
                        alert('Password yang Anda input tidak sama!');
                    </script>";
        }
        
        $password = password_hash($password, PASSWORD_ARGON2ID);
        
        $query = "INSERT INTO users VALUES ('','$username', '$email','$password', NOW())";

        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function tambahBarang($data)
    {
        global $connect;

        $kode = $data['tkode'];
        $nama = $data['tnama'];
        $asal = $data['tasal'];
        $jumlah = $data['tjumlah'];
        $satuan = $data['tsatuan'];
        $tanggal = $data['ttanggal'];
        
        $query = "  INSERT INTO tabel_barang
                    VALUES('','$kode', '$nama', '$asal', '$jumlah', '$satuan', '$tanggal', NOW())";

        $query = mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }

    function editBarang($data)
    {
        global $connect;
        
        $id = $data['id'];
        $kode = $data['tkode'];
        $nama = $data['tnama'];
        $asal = $data['tasal'];
        $jumlah = $data['tjumlah'];
        $satuan = $data['tsatuan'];
        $tanggal = $data['ttanggal'];
        
        
        $query = "  UPDATE tabel_barang SET
                    kode_barang = '$kode', 
                    nama_barang = '$nama', 
                    asal = '$asal', 
                    jumlah = '$jumlah', 
                    satuan = '$satuan', 
                    tanggal_diterima = '$tanggal'
                    WHERE id_barang = '$id'"; 
                

        $query = mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }

    function hapusBarang($data)
    {
        global $connect;
        
        $id = $data['id'];
             
        $query = "  DELETE FROM tabel_barang
                    WHERE id_barang = '$id'"; 
                

        $query = mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }