<html>
<body> 
<div container>
    <h3><center>Kode Promo</center><h3>
    <div class="container d-flex justify-content-end">
        <a href="<?php echo site_url('promo/vaddpromo') ?>" class="btn btn-success mb-2">Tambah Data</a>
	</div>
</div>
<div class="container ">
<table id="dataTable1" class="display table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Promo</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Media</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
</div>

<!-- Modal start -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_promo"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Promo</label>
                            <div class="col-md-9">
                                <input name="kode_promo" placeholder="Kode Promo" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Start Date</label>
                            <div class="col-md-9">
                                <input name="start_date" placeholder="Start Date" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">End Date</label>
                            <div class="col-md-9">
                                <input name="end_date" placeholder="End Date" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Media</label>
                            <div class="col-md-9">
                                <select name="media" class="form-control">
                                    <option value="">--Select Media--</option>
                                    <option value="male">Website</option>
                                    <option value="female">Offline Event</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal end -->

<script type="text/javascript">
  var save_method;

    $(document).ready(function(){

        $('#dataTable1').DataTable({
            ajax : {
                url     : '<?php echo site_url('promo/ambildata'); ?>',
                type    : 'POST'
            },
            columnDefs  : [
                {
                    targets     : [0,1,2,3,4,5],
                    className   : "dt-center",
                },
            ],
            processing  : true,
            serverSide  : true
        });
    });

    function edit_promo(id_promo)
    {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.ajax({
            url     : "<?php echo site_url('promo/ajax_edit/')?>/" + id_promo,
            type    : "GET",
            dataType: "JSON",
            success : function(data)
            {
                $('[name="id_promo"]').val(data.id_promo);
                $('[name="kode_promo"]').val(data.kode_promo);
                $('[name="start_date"]').val(data.start_date);
                $('[name="end_date"]').val(data.end_date);
                $('[name="media"]').val(data.media);
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save()
    {
        $('#btnSave').text('saving...');
        $('#btnSave').attr('disabled',true);
        var url;

        if(save_method == 'add'){
            url = "<?php echo site_url('promo/addpromo')?>";
        } else {
            url = "<?php echo site_url('promo/editpromo')?>";
        }

       $.ajax({
            url   : url,
            type  : "POST",
            data  : $('#form').serialize(),
            dataType: "JSON",
            success : function(data)  
            {
                if(data.status) 
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }else{
                   for(var i = 0; i < data.inputerror.length; i++)
                   {
                    $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                   } 
                }
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled',false);
            }
        })
    }

/*$(document).ready( function () {
    $('#dataTable1').DataTable({
        "ajax" : "<?php echo base_url('index.php/promo/ambildata'); ?>",
        "order": [],
    });
});*/
</script>
</html>