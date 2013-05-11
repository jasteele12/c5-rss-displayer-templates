<?php /* blocks/rss_displayer/templates/show_thumbnails/view.php - controller: concrete/core/controllers/blocks/rss_displayer.php */
defined('C5_EXECUTE') or die('Access Denied.');

function show_thumbnails_get_image_url($str) {
	$ret = '';
	if (preg_match('/<img.+?src="(.+?)"/', $str, $matches)) {
		$ret = $matches[1];
	}
	return $ret;
}
?>

<div id="rssSummaryList<?php echo intval($bID); ?>" class="rssSummaryListThumb">
<?php
if ($title) {
?>
	<div class="rssSummaryListThumbTitle"><?php echo $title; ?></div>
<?php
}
if ($errorMsg) {
	echo $errorMsg;
} else {
	$target = ($controller->launchInNewWindow ? ' target="_blank"' : '');
	$dateFormat = (trim($dateFormat) ? $dateFormat : t('F jS'));
	$th = Loader::helper('text');

	foreach($posts as $itemNumber => $item) { 
		if (intval($itemNumber) >= intval($controller->itemsToDisplay))		break;
		$permaLink = $item->get_permalink();
		$titleText = $item->get_title();
		$linkTitle = ($titleText ? ' title="'. $titleText. '" ' : '');
?>
	<div class="rssItemThumb">
		<div class="rssItemThumbImage">
<?php 
		if($img = show_thumbnails_get_image_url($item->get_content())) {
?>
			<img src="<?php echo $img; ?>" />
<?php
		}
?>
		</div>
		<div class="rssItemThumbTitle">
			<a href="<?php echo $permaLink; ?>"<?php echo $linkTitle. $target; ?>><?php echo $titleText; ?></a>
		</div>
		<div class="rssItemThumbDate"><?php echo $item->get_date($dateFormat); ?></div>
<?php
		if ($controller->showSummary) {
?>
		<div class="rssItemThumbSummary">
			<?php echo $th->shortText(strip_tags($item->get_description()), 190); ?><br />
			<a href="<?php echo $permaLink; ?>"<?php echo $linkTitle. $target; ?>><?php echo t('Read More'); ?></a>
		</div>
<?php
		}
?>
      </div>
<?php
	} // /posts
}
?>
</div>