<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Kullanıcı Tablosu</h1>

<table id="customers">
    <tr>
        <th>İsim</th>
        <th>Soyisim</th>
        <th>Email</th>
        <th>Cep Telefonu</th>
        <th>Sifresi</th>
        
      </tr>
  
</table>
<br><br>
<h1>Mesaj Tablosu</h1>
<table id="customers">
    <tr>
      <th>İsim</th>
      <th>Email</th>
      <th>Cep Telefonu</th>
      <th>Konu Başlığı</th>
      <th>Mesaj</th>
    </tr>
    <?php

session_start();
if($_SESSION["user"]=="")
{
  echo "<script> window.location.href='cikis.php'</script>";
}
else 
{
  include("baglanti.php");
  $sec="SELECT * FROM iletisim";
  $sonuc=$baglan->query($sec);
  if($sonuc->num_rows>0){
    while($cek=$sonuc->fetch_assoc())
    {
      echo"
      <tr>
      <td>".$cek['isim']."</td>
      <td>".$cek['email']."</td>
      <td>".$cek['konu']."</td>
      <td>".$cek['cep']."</td>
      <td>".$cek['mesaj']."</td>
      </tr>
      ";
    }
  
  }
  else
  {
  echo "Veritabanında Hiçbir veri bulunamadı.";
  }
}


?>
    
  </table>
  

</body>
</html>

