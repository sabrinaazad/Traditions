<?php get_header(); ?>
<?php
$args = array(
    'p' => 315,
    'post_type' => 'any'
);
$page_fields = new WP_Query($args); ?>

<script>
	let locations = [];
	let shownLocations = [];
	let stateFilter = 'All States';
	let serviceTypeFilter = 'All Service Types';
	let serviceTypes = [];
</script>

<?php $postArgs = array(
    	'post_type'   => 'locations',
	    'orderby'     => 'title',
		'order'       => 'ASC',
		'numberposts' => -1,
);

$locations = get_posts($postArgs);
$states = array();
$serviceTypes = array();

foreach($locations as $location): ?>
	
	<?php if (have_rows('modules', $location->ID)) : while (have_rows('modules', $location->ID)) : the_row();
		if (get_row_layout() == 'hero_location'):
			$title = $location->post_title;
			$link = get_permalink($location->ID);
			$email = strval(get_sub_field('email', $location->ID));
			$fax = strval(get_sub_field('fax', $location->ID));
			$phone = strval(get_sub_field('phone', $location->ID));
			$address = json_encode(get_sub_field('address', $location->ID));

			$pulledStates = get_the_terms( $location->ID , 'state' );
			foreach ($pulledStates as $pulledSt):
				$tempState = $pulledSt->name;
				if (!in_array($pulledSt->name, $states)):
					array_push($states, $pulledSt->name);
				endif;
			endforeach; ?>

			<script>
				loc = {
					title: '<?php echo $title ?>',
					link: '<?php echo $link ?>',
					email: '<?php echo $email ?>',
					fax: '<?php echo $fax ?>',
					phone: '<?php echo $phone ?>',
					address: <?php echo $address ?>,
					state: '<?php echo $tempState ?>',
					serviceTypes: []
				};

				<?php $pulledTypes = get_the_terms( $location->ID , 'locations-service-types' );
					foreach ($pulledTypes as $pulledType): ?>
					loc.serviceTypes.push('<?php echo $pulledType->name ?>');
					<?php if (!in_array($pulledType->name, $serviceTypes)):
						array_push($serviceTypes, $pulledType->name);
					endif;
				endforeach; ?>
				locations.push(loc);
			</script>
		<?php endif;
	endwhile;
	endif;
	?>
<?php endforeach; ?>

<?php sort($states) ?>

<?php if ($page_fields->have_posts()) : while ($page_fields->have_posts()) : $page_fields->the_post(); ?>
    <?php if (have_rows('modules')) : while (have_rows('modules')) : the_row();
        if (get_row_layout() == 'hero_banner') :
            get_template_part('modules/hero-banner');
        endif;
    endwhile; else : endif; ?>
    <section class="section section--locations-map">
        <div class="section-wrapper">
            <div class="content-wrapper">
                <div class="left">
                <?php $heading = get_field('heading');
                if ($heading) : ?>
                    <h2 class="heading"><?php echo $heading; ?></h2>
                <?php endif; ?>
                <select name="states" id="states" onchange="selectHighlightShape(this)"> 
                    <option value="" disabled selected>SELECT YOUR STATE</option>
					<option value="All States">All States</option>
					<?php foreach ($states as $st): ?>
						<option data-imp-image-map-name="TraditionsMap" data-imp-highlight-shape-on-mouseover="<?php echo $st ?>" value="<?php echo $st ?>"><?php echo $st ?></option>
						<script>
						jQuery(document).ready(function($) {
							setTimeout(() => {
								$("polygon[data-shape-title='<?php echo $st ?>']").removeClass('disabled');
							}, 600);
						})
						</script>
					<?php endforeach; ?>
                </select>
                <select name="servicetype" id="servicetype" onchange="selectServiceType(this)"> 
					<option value="" disabled selected>SERVICE TYPE</option>
					<option value="All Service Types">All Service Types</option>
                </select>
                <div class="button-wrapper">
                    <a class="btn btn-primary" href="#result">Search</a>
                </div>
                </div>
                <div class="right">
                   <div class="image-wrapper"> 
						<div><?php echo do_shortcode("[TraditionsMap]"); ?></div>
                   </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?>

<?php wp_reset_postdata() ?>

<section class="section section--locations-result" id="result">
	<div class="section-wrapper" id='all-locations'></div>
</section>

<script type='text/javascript'>
	jQuery('document').ready(function($) {
		var shapeNames = [];
		setTimeout(function() {
			var arr = $(".imp-shape").not(".disabled");
			for (var i = 0; i < arr.length; i++) {
				var shapeName = arr[i].getAttribute('data-shape-title');
				shapeNames.push(shapeName);
				arr[i].onclick = createClickHandler(shapeName);
			}
		}, 1000);
		
		highlightShape = function(name) {

			let element = document.getElementById('states');
			element.value = name;
			stateFilter = name;

			var arr = $(".imp-shape-highlighted");
			for (var i = 0; i < arr.length; i++) {
				var unhighlightName = arr[i].getAttribute('data-shape-title');
				if (unhighlightName !== name) {
					$.imageMapProUnhighlightShape('TraditionsMap', unhighlightName);
				}
			}
			
			$.imageMapProHighlightShape('TraditionsMap', name);

			filterLocations();
		}
	});

	var createClickHandler = function(arg) {
		return function() {
			highlightShape(arg);
		};
	}
	
	function setLocationHtml(locationArr) {
		console.log(locationArr);
		let html = '';
		
		for (let location of locationArr) {
			let terms = '';
			for (let term of location.serviceTypes) {
				terms = terms + '<span>' + term + '</span>';
			}
			html = html + '<div class="location"><div class="col"><h4 class="subheading uppercase">' + location.title + '</h4><div class="service-types">' + terms + '</div></div><div class="col"><div class="address">' + location.address + '</div></div><div class="col"><div class="phone">Phone: <a href="tel:' + location.phone + '">' + location.phone + '</a></div><div class="fax">Fax: <a href="' + location.fax + '"' + location.fax + '>' + location.fax + '</a></div></div><div class="col"><a class="btn btn-primary" href="' + location.link + '">View Location</a></div></div>';
		}

		document.getElementById('all-locations').innerHTML = html;
	}
	
	setTimeout(function() {
		setLocationHtml(locations);
		setServiceTypes(locations);
	}, 1000);

	function selectHighlightShape(e) {
		highlightShape(e.value);
	}
	
	function selectServiceType(e) {
		serviceTypeFilter = e.value;
		filterLocations();
	}
	
	function filterLocations() {
		let filteredLocations = locations;
		
		if (stateFilter !== 'All States') {
			filteredLocations = filteredLocations.filter((location) => {return location.state === stateFilter});
		}
		
		if (serviceTypeFilter !== 'All Service Types') {
			filteredLocations = filteredLocations.filter((location) => {return location.serviceTypes.includes(serviceTypeFilter)});
		}
		
		setServiceTypes(filteredLocations);
		setLocationHtml(filteredLocations);
	}
	
	function setServiceTypes(locs) {
		let serviceTypes = [];
		$("#servicetype").empty();
		$('#servicetype')
				.append($("<option></option>")
                    .attr("value", '')
					.attr("disabled", true)
                    .text('SERVICE TYPE'));
		$('#servicetype')
				.append($("<option></option>")
                    .attr("value", 'All Service Types')
                    .text('All Service Types'));

		for (let location of locs) {
			serviceTypes = serviceTypes.concat(location.serviceTypes);
		}
		serviceTypes = [...new Set(serviceTypes)];
		
		for (let type of (serviceTypes)) {
			if (type === serviceTypeFilter) {
				$('#servicetype')
					.append($("<option></option>")
							.attr("value", type)
							.attr("selected", true)
							.text(type));
			} else {
				$('#servicetype')
					.append($("<option></option>")
							.attr("value", type)
							.text(type)); 
			}
		}		
	}
</script>

<?php wp_reset_postdata() ?>
<?php get_footer(); ?>
