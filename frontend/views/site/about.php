<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About' ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        <dt>Admin</dt></a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
        <p>Email : Admin@spectaservis.com</p>
        <p>HP : 089819998333</p>

      </div>
    </div>
  </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
          <dt>Cara Servis</dt></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          <p>-> Untuk melakukan pemesanan silahkan daftar terlebih dahulu</p>
          <p>-> Setelah daftar silahkan langsung ke form servis dan deskipsikan sejelas mungkin tentang kerusakan komputer</p>
          <p>-> Pelanggan yang telah melakukan pemesanan dapat melihat status servis nya pada form servis</p>
          <p>-> Waktu servis diproses paling lambat adalah 24 jam setelah melakukan servis </p>
          <p>-> Teknisi akan menuju ke tempat anda apabila servis sudah diproses oleh admin </p>
          <p>-> Teknisi akan melakukan pengecekan singkat jika bisa diperbaiki ditempat maka bisa langsung dibereskan servisnya</p>
          <p>-> Komputer yang memerlukan pemeriksaan lebih lanjut akan dibawa oleh teknisi menuju toko</p>
          <p>-> Waktu pengerjaan paling lambat adalah 3x24 jam setelah komputer dibawa ke toko</p>
          <p>-> Admin akan mengkonfirmasi servisan anda baik via hp maupun email atau anda bisa cek di form servis tentang status servis anda</p>
          <p>-> Servisan yang telah selesai wajib dibayar paling lambat 3 hari setelah ada konfirmasi</p>
          <p>-> Setelah melakukan pembayaran anda wajib untuk konfirmasi kembali kepada admin dengan menyatumkan bukti pembayaran </p>
          <p>-> Setelah pembayaran diproses oleh admin maka komputer yang telah diservis akan diantarkan kembali ke tempat pelanggan</p>

        </div>
      </div>
    </div>



  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        <dt>Tarif Servis</dt> </a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body"><h1>Tarif Servis</h1>

        <table style="width:100%">
            <tr>
          <th>Kerusakan</th>
          <th>Tarif</th>
            </tr>
          <tr>
            <td>Ringan</td>
            <td>Rp 75000 </td>
          </tr>
          <tr>
            <td>Berat</td>
            <td>Rp 150000</td>
          </tr>
        </table>
        <h6>*Harga diatas belum termasuk barang ganti</h6>
        <div id="demo" class="collapse">
      </div>
</div>
    </div>
  </div>

</div>




</div>
