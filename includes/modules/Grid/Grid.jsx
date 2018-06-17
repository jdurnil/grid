// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class Grid extends Component {

	static slug = 'etl_grid';


	/*renderItems(area) {

		let newArea = 0;
		const content = this.props.content;
		if (content) {
			for (let x = 0, len = content.length; x < len; x++) {
				let cols = content.props.attrs.colSpan ? content.props.attrs.colSpan : 0;
				let rows = content.props.attrs.rowSpan ? content.props.attrs.rowSpan : 0;
				newArea += parseInt(cols) * parseInt(rows);
			}
		}

		let remainArea = area - newArea;
		let items = new Array(remainArea);
		for (let i = 0; i < remainArea; i++) {
			items[i] = <div key={i} className="item"></div>;
		}
		return items
	}*/





	getColString(numCols){
		let colString = '';
		for( let i=1; i<= numCols; i++){
			colString += 'auto ';
		}
		return colString;
	}

	getRowString(numRows){
		let rowString = '';
		for(let i=1; i<=numRows; i++){
			if(i !== numRows){
				rowString += 'auto ';
			} else{
				rowString += 'auto';
			}
		}
		return rowString;
	}

  render(){

  	const colString = this.getColString(parseInt(this.props.num_cols));
	const rowString = this.getRowString(parseInt(this.props.num_rows));
	const mainStyle = {
		gridTemplateColumns: colString,
		gridTemplateRows: rowString,
		height: this.props.height,
		gridGap: this.props.gap
	};
    const area = parseInt(this.props.num_cols) * parseInt(this.props.num_rows);
    return (
      <div className="main" style={mainStyle}>
		  {this.props.content}
	  </div>
    );
  }
}

export default Grid;
