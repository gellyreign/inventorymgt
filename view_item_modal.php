<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Item Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table" id="example">
          <thead>
            <tr>
              <th class="text-center">Product Number</th>
              <th class="text-center">Product Name</th>
              <th class="text-center">Brand</th>
              <th class="text-center">Description</th>
              <th class="text-center">Stock</th> 
              <th class="text-center">Quantity</th>
              <th class="text-center">Selling Price</th>  
              <th class="text-center">Action</th> 
            </tr>
          </thead>
          <tbody>
            <?php include 'view_item.php';?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     </div>
   </div>
 </div>
</div>

<script type="text/javascript">

  var table= $('#example').DataTable();
  var tableBody = '#example tbody';

  $(tableBody).on('click', 'tr', function () {
var cursor = table.row($(this));//get the clicked row
var data=cursor.data();// this will give you the data in the current row.
$('form').find("input[name='sn'][type='text']").val(data[0]);
$('form').find("input[name='pics'][type='text']").val(data[1]);
$('form').find("input[name='brand'][type='text']").val(data[2]);
$('form').find("input[name='desc'][type='text']").val(data[3]);

$('form').find("input[name='quan'][type='text']").val(data[5]);
$('form').find("input[name='cost'][type='text']").val(data[6]);
} );
</script>

