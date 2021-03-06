<div class="row">
	<div class="span8">
		<div id="record-form">
			<?php echo Form::open(array('action'=>'/','class'=>'well')); ?>

			<label for="name">Full Name</label>
			<?php echo Form::input('full_name',
				(isset($applicant['full_name'])) ? $applicant['full_name'] : ''); ?>

			<label for="email">Email</label>
			<?php echo Form::input('email',
				(isset($applicant['email'])) ? $applicant['email'] : ''); ?>

			<label for="location">Location</label>
			<?php echo Form::input('location',
				(isset($applicant['location'])) ? $applicant['location'] : ''); ?>

			<label for="tags">Tags</label>
			<?php 
				$tags = array();
				if (isset($applicant['tags'])) { 
					foreach ($applicant['tags'] as $tag) {
						$tags[] = $tag->tag;
					}
				}
				echo Form::input('tags',implode(', ',$tags)); ?>
			<span class="help-block">Tags are comma-seperated</span>

			<!--<label for="resume">Resume</label>
			<?php echo Form::file('resume'); ?>
			<span class="resume-link" style="display:none"></span>

			<label for="relocate">Willing to Relocate</label>
			<?php echo Form::radio('relocate','y','Yes'); ?> Yes &nbsp;&nbsp;
			<?php echo Form::radio('relocate','n','Yes'); ?> No
			<br/><br/>

			<label for="source">Source</label>
			<?php echo Form::input('source'); ?>-->

			<?php echo Form::hidden('record_id',
				(isset($applicant['id'])) ? $applicant['id'] : ''); ?>

			<br/><br/>
			<?php echo Form::button('Submit','submit',array('class'=>'btn','id'=>'submit-record')); ?>

			<?php 
			if (isset($applicant) && isset($applicant['id'])) {
				echo Form::button('Delete','delete',array('class'=>'btn','id'=>'delete-record'));
			}
			?>

			<?php echo Form::close(); ?>
		</div>
	</div>
	<div class="span4">
		<h3>Search</h3>
		<?php echo Form::open(array('action'=>'/','class'=>'form-search')); ?>
		<div class="input-append">
			<?php echo Form::input('query'); ?>
			<?php echo Form::button(array('class'=>'btn','type'=>'button','value'=>'Search','id'=>'search-btn')); ?>
		</div>
		<?php echo Form::close(); ?>
		<div id="search-results" style="display:none"></div>

		<h3>Recent Entries</h3>
		<span style="font-size:10px">Click on a name to load the record</span><br/>
		<br/>
		<div id="latest-records"></div>
	</div>
</div>