			</div>
		</div>
		<?php if ( $_SERVER[ 'HTTP_HOST' ] === 'workshops.dev' ): ?>
			<script src="/assets/js/jquery.js"></script>
			<script src="/assets/js/suitcase.js"></script>
		<?php else: ?>
			<script src="/assets/js/packaged.js"></script>
		<?php endif; ?>
	</body>
</html>