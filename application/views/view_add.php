<!DOCTYPE html>
<html lang="en">
  <body>
 
    <div class="container">
      <h1><center>Tambah Data Promo</center></h1>
        <div class="align-items-center justify-content-center container-fluid">
          <div class="line"></div>
        <form action="<?php echo site_url('promo/addpromo');?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6 mt-2">
            <label>Kode Promo</label>
            <input type="text" class="form-control" name="kode_promo" id="kodeuppercase" placeholder="Kode Promo">
            </div>
            <div class="form-group col-md-6">
            <label>Media</label>
            <input type="text" class="form-control" name="media" list="media" placeholder="Media">
            <datalist id="media">
              <option value="Website">Website</option>
              <option value="Offline Kasir">Offline Kasir</option>
              <option value="Customer Tools">Customer Tools</option>
            </datalist>
            </div>
          </div>  
          <div class="form-row">
            <div class="form-group col-md-6">
            <label>Start Date</label>
            <input type="datetime-local" class="form-control" name="start_date" placeholder="Start Date">
            </div>
            <div class="form-group col-md-6">
            <label>End Date</label>
            <input type="datetime-local" class="form-control" name="end_date"  placeholder="End Date">
            </div>
          </div>
          <div class="form-group">
          <div class="form-group col-md-1 mt-2 text-right">
          <button type="submit"  class="btn btn-primary" id="simpan" name="simpan">Simpan</button>
          </div>
          <div class="form-group col-md-1 mt-2 text-left">
          <a href="<?php echo site_url('promo') ?>" class="btn btn-warning">Kembali</a>
          </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
