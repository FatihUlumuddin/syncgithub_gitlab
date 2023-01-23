<!DOCTYPE html>
<html lang="en">
  <body>
 
    <div class="form-popup" id="editform">
      <h1><center>Edit Data Promo</center></h1>
        <div class="col-md-6 offset-md-3">
        <form action="<?php echo site_url('promo/editpromo');?>" method="post">
          <div class="form-group">
            <label>Kode Promo</label>
            <input type="hidden" class="form-control" name="id_promo" value="<?php echo $editpromo->id_promo; ?>" placeholder="Kode Promo">
            <input type="text" class="form-control" name="kode_promo" value="<?php echo $editpromo->kode_promo; ?>" placeholder="Kode Promo">
          </div>
          <div class="form-group">
            <label>Start Date</label>
            <input type="datetime-local" class="form-control" name="start_date" value="<?php echo $editpromo->start_date; ?>" placeholder="Start Date">
          </div>
          <div class="form-group">
            <label>End Date</label>
            <input type="datetime-local" class="form-control" name="end_date"  value="<?php echo $editpromo->end_date; ?>" placeholder="End Date">
          </div>
          <div class="form-group">
            <label>Media</label>
            <input type="text" class="form-control" name="media" list="media" value="<?php echo $editpromo->media; ?>" placeholder="Media">
            <datalist id="media">
              <option>Website</option>
              <option>Offline Kasir</option>
              <option>Customer Tools</option>
            </datalist>
          </div>
          <button type="submit"  class="btn btn-primary" id="edit" name="edit">Simpan</button>
        </form>
      </div>
    </div>
  </body>
</html>
