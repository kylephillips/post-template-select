<?php wp_nonce_field( 'my_template_select_meta_box_nonce', 'template_select_meta_box_nonce' ); ?>
<div class="template-select-meta">
	<p>
	<?php 
		$templates = $this->template_repo->getAll(); 
		if ( $templates ) {
			$out = '<select name="_wp_page_template" style="width:100%;">';
			$out .= '<option value="">' . __('Default', 'posttemplateselect') . '</option>';
			foreach($this->template_repo->getAll() as $name => $file){
				$out .= '<option value="' . $file . '"';
				if ( $this->template == $file ) $out .= ' selected';
				$out .= '>' . $name . '</option>';
			}
			$out .= '</select>';
		} else {
			$out = __('No Custom Templates Found.', 'posttemplateselect');
		}
		echo $out;
		?>
	</p>
</div>