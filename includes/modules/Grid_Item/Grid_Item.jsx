// External Dependencies
import React, { Component } from 'react';

class Grid_Item extends Component {
	static slug = 'etl_grid_item';

	static css(props){
		const additionalCss = [];
		if(props.cols_span){
			additionalCss.push([{
				selector: '%%order_class%%',
				declaration: `grid-column-end: span ${props.cols_span};`,
				}]
			)
		}

		if(props.rows_span){
			additionalCss.push([{
					selector: '%%order_class%%',
					declaration: `grid-row-end: span ${props.rows_span};`,
				}]
			)
		}

		return additionalCss;

	}

	_renderButton() {
		const props              = this.props;
		const utils              = window.ET_Builder.API.Utils;
		const buttonTarget       = 'on' === props.url_new_window ? '_blank' : '';
		const buttonIcon         = props.button_icon ? utils.processFontIcon(props.button_icon) : false;
		const buttonClassName    = {
			et_pb_button:             true,
			et_pb_custom_button_icon: props.button_icon,
		};

		if (! props.button_text || ! props.button_url) {
			return '';
		}

		return (
			<div className='et_pb_button_wrapper'>
				<a
					className={utils.classnames(buttonClassName)}
					href={props.button_url}
					target={buttonTarget}
					rel={utils.linkRel(props.button_rel)}
					data-icon={buttonIcon}
				>
					{props.button_text}
				</a>
			</div>
		);
	}
	render () {
		console.log(this.props);
		const Heading = `${this.props.header_level ? this.props.header_level:'h2'}`;
		return (
			<div className="test">
			 	<Heading>
				 {this.props.title}
			 	</Heading>
				{this._renderButton()}
			</div>

		);

	}
}

export default Grid_Item;