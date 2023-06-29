  <input type="text" id="discnt" class="form-control" onkeyup="subt();" name="c" placeholder="Discount">
  <input type="text" id="val" class="form-control" name="d" placeholder="0.00">
  <input type="text" id="ttlamnt" class="form-control" name="e" placeholder="0.00">
 <input type="text" id="vat" class="form-control" name="e" onkeyup="subt();" placeholder="VAT">
 
<script>
  function subt(){

   var a = document.getElementById("discnt").value;
   var b = document.getElementById("val").value;
   var c = document.getElementById("vat").value;
   //var c = document.getElementById("ttlamnt").value;

   if(a!=0){
     var discount = parseFloat(a)/100;
    var total = discount*parseFloat(b);
   var ttl = b-total;
   }else{
    var discount = parseFloat(c)/100;
    var total = discount*parseFloat(b);
    var ttl = parseFloat(b)+parseFloat(total);
   }


  
   //var ttl = total-document.getElementById("overall").value;
   document.getElementById("ttlamnt").value=ttl;
   //document.getElementById("ttlamnt").value = 
 }



</script>
