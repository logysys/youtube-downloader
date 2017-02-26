<?php
	$values = explode("v=", $_REQUEST['youtubeurl']);
	$id = $values[1];
	$data = file_get_contents("https://www.youtube.com/get_video_info?video_id={$id}");
	parse_str($data);
	$arr = explode(",", $url_encoded_fmt_stream_map);
	if (isset($arr[0])) 
	{ 
	?>
	<div class="col-md-8 col-md-offset-4 col-sm6-6 col-sm-offset-3 ">
						<table width="100%" border="0">
						<tr>
							<td colspan="3" style="color:#FFFFFF;" ><p><?=$title?><p></td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" border="0">
								<tr>
								  <td width="25%" rowspan="2" style="color:#FFFFFF;"><img src="<?=$thumbnail_url?>" ></td>
								<td width="8%" style="color:#FFFFFF;">Author :</td>
								<td width="67%" style="color:#FFFFFF;"><?=$author?> </td>
								</tr>
								<tr>
								  <td style="color:#FFFFFF;">Viewer :</td>
								<td style="color:#FFFFFF;"><?=$view_count?></td>
								</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="3">
	<?php
	foreach ($arr as $item) {
	parse_str($item);
	$temp = explode(";", $type);
	$extensions = explode("/", $temp[0]);
	$extension = $extensions[1];
	switch ($extension) {
		case '3gpp':
			$icon = "3gp";
			break;
		case 'mp4':
			$icon = "mp4";
			break;
		case 'webm':
			$icon = "webm";
			break;
		case 'x-flv':
			$icon = "flv";
			break;
	}
?>
<a href='<?= $url ?>?title= <?= $title ?>' class="btn btn-info btn-fill"><?= $icon ?> <?=$quality?></a>
<?php
	} 
?>
	</td>
	</tr>
	</table>                 
	</div>
<?php
	} 
?>