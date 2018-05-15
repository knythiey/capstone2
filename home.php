<?php include "partials/header.php"; ?>
	
	<?php 
		session_start();
		function getTitle(){
			echo "Home Page";
		}
		require "lib/connect.php";
		$product_query = "SELECT * FROM products";
		$product_result = mysqli_query($conn, $product_query); 
	?>
</head>
<body>
	<?php include "partials/navbar.php"; ?>
	<div class="main-wrapper">
		
		<h1> Home Page</h1>
		
		<div class="container">
			<div class="row">
				<div class="card-group">
					<?php foreach ($product_result as $key) { ?>	
						<div class="col-md-4">
							<div class="card">
								<a href="item.php?id=<?php echo $key['id'] ?>"><img class="card-img-top home-prod-img img-thumbnail img-fluid" src="<?php echo $key['product_image'] ?>" alt="Card image cap"></a>
								<div class="card-body">
									<h5 class="card-title"><?php echo $key['product_name'] ?></h5>
									<p class="card-text show-read-more"><?php echo $key['description'] ?></p>
									<a href="item.php?id=<?php echo $key['id'] ?>" class="btn btn-info">Product Details</a>
									<button class="btn btn-success form">Add to Cart</button>
								</div>
							</div> <!--card -->
						</div>
					<?php } ?>
				</div><!--card-group -->
			</div>
		</div>
	
	</div>
	<?php include "partials/footer.php"; ?>
<?php include "partials/foot.php"; ?>