<?php

class ETL_Grid extends ET_Builder_Module {

	public $slug       = 'etl_grid';
	public $vb_support = 'on';
    public $rows;

	protected $module_credits = array(
		'module_uri' => 'http://tilted.imagiasweb.com',
		'author'     => 'Jay Durnil',
		'author_uri' => 'http://tilted.imaigasweb.com',
	);
    public function init() {

        $this->child_slug      = 'etl_grid_item';
        $this->child_item_text = esc_html__( 'Grid Item', 'et_builder' );
        $this->name = esc_html__( 'Masonry Grid ', 'etl-divilocal' );
    }

    public function get_settings_modal_toggles(){
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => esc_html__( 'Define Grid', 'et_builder' ),
                ),
            ),
        );
    }



	public function get_fields() {
		return array(
            'element' => array(
                'label'           	=> esc_html__( 'Element', 'plugin_domain' ),
                'type'            	=> 'select',
                'option_category' 	=> 'configuration',
                'options'         	=> array(
                    'optA' 	=> esc_html__( 'Circle', 'plugin_domain' ),
                    'optB'  	=> esc_html__( 'Square', 'plugin_domain' ),
                    'optC'  	=> esc_html__( 'Triangle', 'plugin_domain' )
                ),
            ),
			'num_rows' => array(
			    'default'         => '0',
				'label'           => esc_html__( 'Number of Rows', 'etl-divilocal' ),
				'type'            => 'range',
                'range_settings'  => array(
                    'min'         => '1',
                    'max'         => '6'

                ),
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Enter in desired number of rows.', 'etl-divilocal' ),
				'toggle_slug'     => 'main_content',
			),

            'num_cols' => array(
                'default'         => '0',
                'label'           => esc_html__( 'Number of Columns', 'etl-grid' ),
                'type'            => 'range',
                'range_settings'  => array(
                    'min'         => '1',
                    'max'         => '6'

                ),

                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter in desired number of columns', 'etl-divilocal' ),
                'toggle_slug'     => 'main_content',
            ),
            'height' => array(
                'label'           => esc_html__( 'Height', 'etl-divilocal' ),
                'type'            => 'text',

                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter height', 'etl-divilocal' ),
                'toggle_slug'     => 'main_content',
            ),
            'gap' => array(
                'label'           => esc_html__( 'Grid Gap', 'etl-divilocal' ),
                'type'            => 'text',

                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Enter Gap Width', 'etl-divilocal' ),
                'toggle_slug'     => 'main_content',
            ),
            'show_lb' => array(
                'label'           => esc_html__( 'Show Lightbox', 'etl-grid' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'           => array(
                    'on'  => esc_html__( 'On', 'et_builder' ),
                    'off' => esc_html__( 'Off', 'et_builder' ),
                ),
                'description'     => esc_html__( 'Show Grid', 'etl-divilocal' ),
                'toggle_slug'     => 'main_content',
            ),

		);
	}

	function get_row_string(){
        $row_string = '';
        $rows = intval($this->props['num_rows']);
        for($i=0; $i<$rows; $i++){
            $row_string .= 'auto ';
        }
        return $row_string;
    }

    function get_col_string(){
        $col_string = '';
        $cols = intval($this->props['num_rows']);
        for($i=0; $i<$cols; $i++){
            $col_string .= 'auto ';
        }
        return $col_string;
    }

	public function render( $attrs, $content = null, $render_slug ) {
        $this->rows= $this->props['num_rows'];
        if ( '' !== $this->props['num_rows'] ) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .main',
                'declaration' => sprintf(
                    'grid-template-rows: %1$s;',
                    $this->get_row_string()
                ),
            ) );
        }
        if ( '' !== $this->props['num_cols'] ) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .main',
                'declaration' => sprintf(
                    'grid-template-columns: %1$s;',
                    $this->get_col_string()
                ),
            ) );
        }
        if ( '' !== $this->props['height'] ) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .main',
                'declaration' => sprintf(
                    'height: %1$s;',
                    $this->props['height']
                ),
            ) );
        }
        if ( '' !== $this->props['gap'] ) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .main',
                'declaration' => sprintf(
                    'grid-gap: %1$s;',
                    $this->props['gap']
                ),
            ) );
        }
        if ( 'off' == $this->props['show_lb'] ) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .main .etl_grid_item .box',
                'declaration' => sprintf(
                    'display: none;'

                ),
            ) );
        }

        return sprintf( '<div class="main">%1$s</div>', $this->content );
	}
}

new ETL_Grid;


