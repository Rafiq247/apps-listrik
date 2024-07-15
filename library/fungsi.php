<?php
class oop
{

	function simpan($table, array $field)
	{
		global $koneksi;
		$sql = "INSERT INTO $table SET ";
		foreach ($field as $key => $value) {
			$sql .= "$key = '" . mysqli_real_escape_string($koneksi, $value) . "',";
		}
		$sql = rtrim($sql, ',');
		$jalan = mysqli_query($koneksi, $sql);
		if (!$jalan) {
			die("Query gagal: " . mysqli_error($koneksi));
		}
	}

	function tampil($table, $where = '', $cari = '')
	{
		global $koneksi;
		$sql = "SELECT * FROM $table $where $cari";
		$query = mysqli_query($koneksi, $sql);
		while ($data = mysqli_fetch_array($query)) {
			@$jalan[] = $data;
		}
		return @$jalan;
	}

	function edit($table, $where)
	{
		global $koneksi;
		$sql = "SELECT * FROM $table WHERE $where";
		$query = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($query);
		return $data;
	}

	function hapus($table, $where)
	{
		global $koneksi;
		$sql = "DELETE FROM $table WHERE $where";
		$query = mysqli_query($koneksi, $sql);
		return $query;
	}

	function update($table, array $field, $where)
	{
		global $koneksi;
		$sql = "UPDATE $table SET ";
		foreach ($field as $key => $value) {
			$sql .= "$key = '" . mysqli_real_escape_string($koneksi, $value) . "',";
		}
		$sql = rtrim($sql, ',');
		$sql .= " WHERE $where";
		$jalan = mysqli_query($koneksi, $sql);
		if (!$jalan) {
			die("Query gagal: " . mysqli_error($koneksi));
		}
	}

	function caridata($table)
	{
		global $koneksi;
		$sql = "SELECT * FROM $table";
		$query = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($query);
		return $data;
	}

	function cekdata($table)
	{
		global $koneksi;
		$sql = "SELECT * FROM $table";
		$query = mysqli_query($koneksi, $sql);
		$jumlah = mysqli_num_rows($query);
		return $jumlah;
	}

	function pesan($pesan)
	{
		echo "<script>alert('$pesan');</script>";
	}

	function alert($pesan, $alamat)
	{
		echo "<script>alert('$pesan');document.location.href='$alamat'</script>";
	}

	function redirect($alamat)
	{
		echo "<script>document.location.href='$alamat'</script>";
	}

	function no_record($col)
	{
		echo "<tr><td colspan='$col' align='center'>Data Tidak Ada !!!</td></tr>";
	}

	function rupiah($uang)
	{
		echo "Rp. " . number_format($uang, 0, ',', '.') . ",-";
	}

	function bulan($bulan)
	{
		switch ($bulan) {
			case '01':
				$bln = "Januari";
				break;
			case '02':
				$bln = "Februari";
				break;
			case '03':
				$bln = "Maret";
				break;
			case '04':
				$bln = "April";
				break;
			case '05':
				$bln = "Mei";
				break;
			case '06':
				$bln = "Juni";
				break;
			case '07':
				$bln = "Juli";
				break;
			case '08':
				$bln = "Agustus";
				break;
			case '09':
				$bln = "September";
				break;
			case '10':
				$bln = "Oktober";
				break;
			case '11':
				$bln = "November";
				break;
			case '12':
				$bln = "Desember";
				break;
			default:
				$bln = "";
				break;
		}
		echo $bln;
	}

	function bulan_substr($bulan)
	{
		switch ($bulan) {
			case '01':
				$bln = "JAN";
				break;
			case '02':
				$bln = "FEB";
				break;
			case '03':
				$bln = "MAR";
				break;
			case '04':
				$bln = "APR";
				break;
			case '05':
				$bln = "MEI";
				break;
			case '06':
				$bln = "JUN";
				break;
			case '07':
				$bln = "JUL";
				break;
			case '08':
				$bln = "AGU";
				break;
			case '09':
				$bln = "SEP";
				break;
			case '10':
				$bln = "OKT";
				break;
			case '11':
				$bln = "NOV";
				break;
			case '12':
				$bln = "DES";
				break;
			default:
				$bln = "";
				break;
		}
		echo $bln;
	}

	function format_tanggal($tanggal)
	{
		$tahun = substr($tanggal, 0, 4);
		$bulan = substr($tanggal, 5, 2);
		$tgl = substr($tanggal, 8, 2);
		switch ($bulan) {
			case '01':
				$bln = "Januari";
				break;
			case '02':
				$bln = "Februari";
				break;
			case '03':
				$bln = "Maret";
				break;
			case '04':
				$bln = "April";
				break;
			case '05':
				$bln = "Mei";
				break;
			case '06':
				$bln = "Juni";
				break;
			case '07':
				$bln = "Juli";
				break;
			case '08':
				$bln = "Agustus";
				break;
			case '09':
				$bln = "September";
				break;
			case '10':
				$bln = "Oktober";
				break;
			case '11':
				$bln = "November";
				break;
			case '12':
				$bln = "Desember";
				break;
			default:
				$bln = "";
				break;
		}
		echo $tgl . " " . $bln . " " . $tahun;
	}

	function hari($today)
	{
		switch ($today) {
			case '1':
				$hari = "Senin";
				break;
			case '2':
				$hari = "Selasa";
				break;
			case '3':
				$hari = "Rabu";
				break;
			case '4':
				$hari = "Kamis";
				break;
			case '5':
				$hari = "Jumat";
				break;
			case '6':
				$hari = "Sabtu";
				break;
			case '7':
				$hari = "Minggu";
				break;
			default:
				$hari = "";
				break;
		}
		echo $hari;
	}

	function login($table, $username, $password, $alamat)
	{
		global $koneksi;
		@session_start();
		$sql = "SELECT * FROM $table WHERE username = '" . mysqli_real_escape_string($koneksi, $username) . "' AND password = '" . mysqli_real_escape_string($koneksi, $password) . "'";
		$query = mysqli_query($koneksi, $sql);
		$cek = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);
		if ($cek > 0) {
			if ($table == "petugas") {
				@$_SESSION['username_petugas'] = $data['username'];
				@$_SESSION['id_petugas'] = $data['id_petugas'];
				@$_SESSION['nama_petugas'] = $data['nama'];
				@$_SESSION['akses_petugas'] = $data['akses'];
				$this->alert("Login Berhasil, Selamat Datang " . $data['nama'], $alamat);
			} elseif ($table == "agen") {
				@$_SESSION['username_agen'] = $data['username'];
				@$_SESSION['biaya_admin'] = $data['biaya_admin'];
				@$_SESSION['id_agen'] = $data['id_agen'];
				@$_SESSION['nama_agen'] = $data['nama'];
				@$_SESSION['akses_agen'] = $data['akses'];
				$this->alert("Login Berhasil, Selamat Datang " . $data['nama'], $alamat);
			}
		} else {
			$this->pesan("username atau password salah");
		}
	}

	function upload($tempat)
	{
		@$alamatfile = $_FILES['foto']['tmp_name'];
		@$namafile = $_FILES['foto']['name'];
		move_uploaded_file($alamatfile, "$tempat/$namafile");
		return $namafile;
	}
}
