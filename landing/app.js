import React from 'react';
import ReactDOM from 'react-dom';

class IconList extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        "iconArray":theArray
      };
    }
    renderIcon(type){
        return(
            <i className={`theIcons fa ${ type }`} aria-hidden="true"></i>
        );
    }
    render() {
        return(
            <div>
            {
                this.state.iconArray.map(icon => {
                    return this.renderIcon(icon);
                })
            }
            </div>
        )
    }
}
ReactDOM.render(
    <IconList />,
    document.getElementById('root')
)
