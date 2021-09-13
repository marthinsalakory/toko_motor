<!DOCTYPE HTML>
<html>
    <head>
        <title>form pemesanan</title>
        <link rel="stylesheet" href="styleform.css">
    </head>
   
    <body>
        <div class="container">
          <h1>Form Pembelian</h1>

         <form>
             <form action="input_data.php" method="post">
            
                <label id="Nama_Pembeli">Nama Pembeli</label>
            <br>
                <input type="text" name="Nama_Pembeli">
            <br>
                <label id="Alamat">Alamat</label>
            <br>
                <input type="text" name="Alamat">
            <br>
				<label id="Kota/Kecamatan">Kota/Kecamatan</label>
            <br>
                <input type="text" name="Kota/Kecamatan">
            <br>
				<label id="No_Hp">No Hp</label>
            <br>
                <input type="text" name="No_Hp">
            <br>
				<label id="Tipe_Motor">Tipe Motor</label>
            <br>
                <input type="text" name="Tipe_Motor">
            <br>
				<label id="Harga_Barang">Harga Barang</label>
            <br>
                <input type="text" name="Harga_Barang">
            <br>
                <button type="submit" name="input">kirim</button>
            </form>
        </form>
        </div>     
    </body>
</html>