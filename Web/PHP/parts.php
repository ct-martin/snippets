<?php

/*

This file can be used to render various "parts" that I commonly use.

TODO: Docs

*/

class Parts
{
	public static function renderPart($name, $params = array()) {
		switch($name) {
			case 'cards':
				?>
				        <div class="row">
				<?php foreach ($params as $work) { ?>
							<div class="col-12 col-md-6 col-lg-4">
								<div class="card" style="margin-top:.75rem;">
								<?php if(isset($work['header']) && $work['header']) { ?>
									<div class="card-header">
										<?php echo($work['header']); ?>
									</div>
								<?php }
								if(isset($work['img']) && $work['img'] != "") { ?>
									<img class="card-img-top<?php if(isset($work["imgtweak"]) && $work["imgtweak"]) echo(" card-img-top-tweaks"); ?>" src="<?php if(isset($work["img"]) && $work["img"]!="") echo($work["img"]); ?>"<?php echo((isset($work["imgalt"]) && $work["imgalt"]!="") ? " alt=\"" . $work["imgalt"] . "\"" : ""); ?>>
								<?php } ?>
									<div class="card-body">
										<h4 class="card-title"><?php echo($work["name"]); if(isset($work["tag"]) && $work["tag"]) echo(" <small><span class=\"badge badge-secondary\">".$work["tag"]."</span></small>"); ?></h4>
										<p class="card-text"><?php echo($work['desc']); ?></p>
										<a href="<?php echo($work['url']); ?>" class="btn btn-primary w-100"><?php echo((isset($work['buttonTxt']) ? $work['buttonTxt'] : "View")); ?></a>
									</div>
								</div>
							</div>
				<?php } ?>
						</div>
				<?php
				break;
			case 'gallery':
				?>
										<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding-bottom:1rem;">
				<?php if(count($params) > 1) { ?>
											<ol class="carousel-indicators">
				<?php for($i = 0; $i < count($params); $i++) { ?>
												<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo($i); ?>"<?php if($i==0) echo(" class=\"active\""); ?>></li>
				<?php } ?>
											</ol>
				<?php } ?>
											<div class="carousel-inner">
				<?php for($i = 0; $i < count($params); $i++) { ?>

												<div class="carousel-item<?php if($i==0) echo(" active"); ?>">
													<img class="d-block w-100" src="<?php echo($params[$i]["src"]); ?>" alt="<?php echo((isset($params[$i]["alt"]) || isset($params[$i]["caption"])) ? (isset($params[$i]["alt"]) ? $params[$i]["alt"] : $params[$i]["caption"]) : "Slide " . $i); ?>">
				<?php	if(isset($params[$i]["capheading"]) || isset($params[$i]["caption"])) {
				?>
													<div class="carousel-caption d-none d-md-block"<?php if(isset($params[$i]["textcolor"])) echo(" style=\"color:" . $params[$i]["textcolor"] . ";\""); ?>>
														<?php if(isset($params[$i]["capheading"])) echo("<h3>" . $params[$i]["capheading"] . "</h3>"); ?>
														<?php if(isset($params[$i]["caption"])) echo("<p>" . $params[$i]["caption"] . "</p>"); ?>
													</div>
				<?php	} ?>
												</div>
				<?php } ?>
											</div>
				<?php if(count($params) > 1) { ?>
											<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
												<i class="fa fa-chevron-left" aria-hidden="true"></i>
												<!--<span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
												<span class="sr-only">Previous</span>
											</a>
											<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
												<i class="fa fa-chevron-right" aria-hidden="true"></i>
												<!--<span class="carousel-control-next-icon" aria-hidden="true"></span>-->
												<span class="sr-only">Next</span>
											</a>
				<?php } ?>
										</div>
				<?php
				break;
			case 'pdf':
				?>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="http://docs.google.com/gview?url=<?php echo($params[0]); ?>&embedded=true"></iframe>
					</div>
				<?php
				break;
			default:
				echo('Unknown part: "' . $name . '"');
		}
	}
}
?>