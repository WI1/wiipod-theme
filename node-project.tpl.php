<?php if(arg(2) === null): ?>
<?php print $node->content['view']['#value']; $node=node_load(arg(1)); drupal_set_title($node->title); ?>
<?php elseif(arg(2) == 'info'): ?>
<dl>
  <dt>Förderkennzeichen (FKZ)</dt>
  <dd><?php print $node->field_projectfkz[0]['view'] ?></dt>

<dt>Projektziele / Angestrebtes Ergebnis</dt>
<dd><?php print $node->field_projektgoals[0]['view'] ?></dd>

<dt>Projektexposé</dt>
 <dd><?php print $node->field_synopsis[0]['view'] ?></dd>

 <dt>Projektsteckbrief</dt>
 <dd><?php print $node->field_steckbrief[0]['view'] ?></dd>

<dt>Homepage</dt>
<dd><?php print $node->field_projecthomepage[0]['view'] ?></dd>


<dt>Beteiligte Institutionen</dt>
<dd>
<!--
 <ul class="field-items">
    <?php foreach ((array)$node->field_projectinstitutions as $item) { ?>
      <li class="field-item"><?php print $item['view'] ?></li>
    <?php } ?>
  </ul>
  -->
   
  <p>Projekmitglieder</p>
  <?php print views_embed_view('bo_project_memberorgs', 'default', $node->nid); ?>
  <p>Umsetzungspartner</p>
  <?php print views_embed_view('bo_project_valuepartner', 'default', $node->nid); ?>
  
</dd>

<dt>Forschungsfragen</dt>
<dd>
  <ul class="field-items">
    <?php foreach ((array)$node->field_researchquestions as $item) { ?>
      <li class="field-item"><?php print $item['view'] ?></li>
    <?php } ?>
  </ul>
</dd>

<dt>Ansprechpartner/-in</dt>
 <dd><?php print phptemplate_business_card($node->field_projectaccount[0]['uid']); ?></dd>

<dt>Theorien / theoretische Grundlagen</dt>
  <dd class="field-items">
<?php print $node->field_projecttheories[0]['view'] ?></dd>

<dt>Vorgehen</dt>
 <dd><?php print $node->field_projectapproach[0]['view'] ?></dd>

<?php if($node->tags[5]): // vid of taxonomy "Methoden" ?>
<dt>Methoden</dt>
  <dd><ul>
<?php foreach($node->tags[5] as $t): ?>
<li><?php print l($t->name, 'taxonomy/term/' . $t->tid); ?></li>
<?php endforeach; ?>
  </ul></dd>
<?php if($terms = taxonomy_link('taxonomy terms', $node)): ?>
<dt>Tags</dt>
<dd>
<?php print theme('links', $terms, array('class' => 'node-terms')); ?>
</dd>
<?php endif; ?>
<?php endif; ?>
</dl>
<?php elseif(arg(0) == 'taxonomy'): ?>
	<h2><?php print l($node->title, 'node/' . $node->nid); ?></h2>
	<?php print $node->og_description; ?>
	<p><?php print l('Gehe zu ' . $node->title, 'node/' . $node->nid); ?></p>
<?php endif; ?>
