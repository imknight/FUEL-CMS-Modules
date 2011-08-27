<?php if ($this->fuel_auth->has_permission('flash_news/view_news')) : ?>
<div class="dashboard_pod" style="width: 400px;">
	<h3><?=lang('dashboard_latest_news')?></h3>
	<ul class="nobullets">
		<?php foreach($latest_news as $k => $val) : ?>
		<li><strong><?=english_date($val['date_added'], false)?>:</strong> [<?=$val['category']?>] - <?=$val['news']?></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
