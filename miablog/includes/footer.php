	</div><!-- /.blog-main -->
		<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
			<div class="sidebar-module sidebar-module-inset">
				<h4>About</h4>
				<p><?php echo $site_description; ?></p>
			</div>
			
		<div class="sidebar-module">
			<h4>Categoriers</h4>
			<?php if ($categories) : ?>
				<ol class="list-unstyled">
					<?php while($row = $categories->fetch_assoc()) : ?>
						<li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
					<?php endwhile ?>
				</ol>
			<?php else : ?>
				<p>There are no categories yet</p>
			<?php endif; ?>
		</div>

		</div><!-- /.blog-sidebar -->

	</div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Mia's Blog &copy; 2015</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>