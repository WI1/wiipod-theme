<?php if(user_edit_access($account)): ?>
<div id="balance-user-edit"><span class="famfam active balance-node-edit"></span><?php print l(t('Edit'), 'user/' . $account->uid . '/edit') ?></div>
<?php endif; ?>

<div class="vcard card">
    <div class="info">
		<span class="fn"><?php print implode(' ', array($account->profile_title, $account->profile_firstname, $account->profile_middlename, $account->profile_lastname)); ?></span>
        <!--(<span class="username"><?php print $account->name; ?></span>)-->
    </div>
    <div class="contact">
<?php if(isset($account->addresses)): ?>
        <span class="street-address"><?php print $account->addresses['street']; ?></span><br />
        <span class="postal-code"><?php print $account->addresses['postal_code']; ?></span> <span class="locality"><?php print $account->addresses['city']; ?></span><br />
        <span class="country"><?php print $account->addresses['country_name']; ?></span><br />
<?php endif ?>
        <span class="email"><?php print l($account->mail, 'mailto:' . $account->mail); ?></span><br /><br />
	</div>
</div>
<ul>
	<?php if($account->profile_facebook): ?><li><?php print l('Facebook Account', sprintf('http://www.facebook.com/profile.php?id=%s', $account->profile_facebook)); ?></li><?php endif; ?>
	<?php if($account->profile_researchgate): ?><li><?php print l('ResearchGATE Account', sprintf('http://www.researchgate.net/profile/%s', $account->profile_researchgate)); ?></li><?php endif; ?>
	<?php if($account->profile_twitter): ?><li><?php print l('Twitter Account', sprintf('http://twitter.com/%s', $account->profile_twitter)); ?></li><?php endif; ?>
	<?php if($account->profile_xing): ?><li><?php print l('XING Account', sprintf('http://www.xing.com/profile/%s', $account->profile_xing)); ?></li><?php endif; ?>
</ul>
<?php 
 $related_groups = $account->og_groups;
if($related_groups): ?>
<h3><?php print phptemplate_owner($account->profile_firstname); ?> Workshops</h2>
<?php 
// Quick fix for the problem, should actually be put into a function with the possibility to set different arguments for each group node type
foreach($related_groups as $group) {
  $group_obj = (object) $group;
  if ($group_obj->type == 'conftoolgroup' || $group_obj->type == 'workshop') {
	 print '<div class="group-list-item">' . phptemplate_group_list_item($group_obj) . '</div>';
	}
}
?>
<?php endif; ?>