<?php
/*
 * Template Name: Edu- Glossary Page
 * 
 */
	get_header();
?>

<div class="inner-wrap">
	<div class="title-box underline-dark">
		<h2>Education</h2>
	</div>
	<div id="edu-sidenav">

		<?php wp_nav_menu( array( 'theme_location' => 'edu-sidenav', 'container_id' => 'cssmenu' ) ); ?>

	</div> <!-- END OF #edu-sidenav -->
	<div class="edu-container">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="edu-text clearfix">
						<?php the_content(); ?>
					</div>

				<?php endwhile; endif; ?>

			<div id="edu-glos-search">
				<form action="">
					<input class="input-text" type="text" placeholder="Search">
					<input class="input-submit" type="submit" value="Go">
				</form>
			</div>
			<div id="letters" class="clearfix">
				<ul>
					<li data-letter-group="#|a|b"># - b</li>
					<li data-letter-group="c|d|e">c - e</li>
					<li data-letter-group="f|g|h">f - h</li>
					<li data-letter-group="i|j|k">i - k</li>
					<li data-letter-group="l|m|n">l - n</li>
					<li data-letter-group="o|p|q">o - q</li>
					<li data-letter-group="r|s|t">r - t</li>
					<li data-letter-group="u|v|w">u - w</li>
					<li data-letter-group="x|y|z">x - z</li>
				</ul>
			</div>

			<div id="glossary-list">

			<?php
				function fixPostsArray($allArticles)
				{
					$orphans = array();

					foreach($allArticles as $key=>$arr)
					{
						$pattern = '/^[^a-zA-Z]/i';
						$match = preg_match($pattern, $key);

						if($match)
						{
							foreach($arr as $obj)
							{
								array_push($orphans, $obj);
							}
						}
					}

					for($idx = count($orphans)-1; $idx >= 0; $idx--)
					{
						//$index = $idx-1;
						array_unshift($allArticles['a'], $orphans[$idx]);
					}

					return $allArticles;
				}

				$queryParams = array('post_type' => 'glossary', 'posts_per_page' => -1, 'order' => 'ASC');
				$glossaryPosts = new WP_Query($queryParams);
				$allArticles = array();

				while($glossaryPosts->have_posts())
				{
					$glossaryPosts->the_post();
					$rawTitle = the_title('', '', false);
					$firstCharTitle = strtolower(substr($rawTitle, 0, 1));
					$allArticles["$firstCharTitle"][] = $glossaryPosts->post;
				}

				$allArticles = fixPostsArray($allArticles);
				$rulesArr = array('#|a|b', 'c|d|e', 'f|g|h', 'i|j|k', 'l|m|n', 'o|p|q', 'r|s|t', 'u|v|w', 'x|y|z');

				foreach($rulesArr as $rule)
				{
					$ruleCases = explode('|', $rule);
					echo "<div class='ds' data-glossary-group='$rule'>";

					foreach($ruleCases as $ruleCase)
					{
						foreach($allArticles as $key => $caseArrticles)
						{
							if($key == $ruleCase)
							{
								foreach($caseArrticles as $article)
								{
									$postTitle = $article->post_title;
									$termID = str_replace(array(' ', '_', '-', '.', ',', '&', '%', '/', '(', ')'), '', $postTitle);
									$postContent = $article->post_content;
									echo "<div id='term-$termID' class='' data-title='$postTitle'><h2>$postTitle</h2>";
									echo "<div><p>$postContent</p></div></div>";
								}
							}
						}
					}

					echo '</div>';
				} // END of foreach
			?>

		</div>
	</div> <!-- END OF .edu-container -->
</div> <!-- END OF .inner-wrap -->

<script>
	function toggleTheseKeywords(glossaryPostList, glossaryList, keyword) {
		glossaryPostList.each(function(index) {
			var thisItem  = $(glossaryPostList[index]),
				thisTitle = $(this).data('title').toLowerCase();

			glossaryList.fadeIn(200);

			if (thisTitle.indexOf(keyword.toLowerCase()) !== -1) {
				thisItem.fadeIn(200);
			}
			else {
				thisItem.hide();
			}
		});
	}

	jQuery(document).ready(function($) {
		var glossaryList = $("#glossary-list").children(),
			glossaryPostList = glossaryList.children();

		$('#letters li').on('click', function() {
			var thisElement = $(this),
				thisElementData = thisElement.data("letter-group");

			glossaryList.each(function() {
				var glossaryListData = $(this).data("glossary-group");

				if (thisElementData === glossaryListData) {
					$(this).fadeIn(200);
				} else {
					$(this).hide();
				}
			});
		});

		$('#edu-glos-search .input-submit').on('click', function(e) {
			e.preventDefault();

			var keyword = $(this).siblings('.input-text').val();
			
			toggleTheseKeywords(glossaryPostList, glossaryList, keyword);
		});
	});
</script>

<?php get_footer(); ?>