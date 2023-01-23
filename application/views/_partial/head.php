<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Promo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
      function hapus(){
        var del=confirm("Menghapus data");
        if (del==true){
          alert ("Terhapus")
        }
        return del;
      };
      $(function(){
        $('#kodeuppercase').keyup(function(){
          this.value = this.value.toUpperCase();
        });
      });
      function openForm() {
        document.getElementById("editform").style.display = "block";
      }

      function closeForm() {
        document.getElementById("editform").style.display = "none";
      }
    </script>
  </head>
</html>