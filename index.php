<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html images/lang="en">
<head>
  <title>May doc sach Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudfimages/lare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="style/css_footer.css">

<style>
* {box-sizing: border-box;}
td {padding-right:8px;width:20%;}
td:hover{font-weight:bold;cursor:pointer;}
.product {
  padding: 0 20px;
  width: 270px;
  word-wrap: break-word;
}
img{border-radius:8px;}
.product:hover{
	border:1px solid #ccc;
}

.nameProduct{font-weight:bold;margin:10px 0;}
.nameProduct a {color:#474c51;text-decoration:none;}
.nameProduct a:hover{color:#007aff;}
.imgProduct{transition:1s;}
.imgProduct:hover{transform:scale(1.02);}
@media screen and (max-width: 1200px) {
  .titleQc {display: none;}
  }
.btnBuy {visibility: hidden;}
</style>
<script>
  $(document).ready(function(){
    $(".product").hover(function(){
      $(this).children(".btnBuy").css("visibility", "visible");
    },
    function(){
      $(this).children(".btnBuy").css("visibility", "hidden");
    });
  });
</script>
</head>
<body> 

<?php include '_header.html';?>
<?php include 'dbUtils.php';?>
<?php $listHotProduct = array();
  $listHotProduct = getHotProduct();
?>
	
<div class="container mt-3" style="border:1px solid #ccc;">
  <div style="padding:10px;font-size:18px;">
    <span style="font-weight:bold;">SẢN PHẨM NỔI BẬT</span>
	<span style="float:right;"><a href="#">Xem tất cả</a></span>
  </div>
  <div class="d-flex flex-wrap">
  <?php if($listHotProduct != ""){
   foreach($listHotProduct as $product){ ?>
    <div class="product">
	    <div><a href="detailProduct.php?id=<?php echo $product->get_id();?>&name=<?php echo $product->get_name();?>"><img class="imgProduct" src="<?php echo $product->get_image(); ?>" width="100%" height="214px"></a></div>
	    <div class="nameProduct"><a href="detailProduct.php?id=<?php echo $product->get_id();?>&name=<?php echo $product->get_name();?>"><?php echo $product->get_name(); ?></a></div>
	    <div style="font-size:18px;" class="badge badge-pill badge-danger"><?php echo number_format($product->get_price(),0,',','.'); ?> <u> đ</u></div>
	    <div class="btnBuy mt-3"><a class="btn btn-danger" href="detailProduct.php?id=<?php echo $product->get_id();?>&name=<?php echo $product->get_name();?>">MUA NGAY</a></div>
	</div>
  <?php }} ?>
  </div>
</div>
<?php include '_footer.html'?>

</body>
</html>
