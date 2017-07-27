import React from 'react';
import ReactDOM from 'react-dom';

class IconList extends React.Component {
    constructor(props) {
      super(props);

      this.state = {
        "iconArray":theArray,
        "displayTitle": "",
        "displayContent": "DANIEL KRAFT'S PORTFOLIO",
        "displayImg": "/fil/sexy.jpg",
        "displayPostID": "33",

      };
    }
    mouseMaster(){
        // this.setState({displayPost:this});
        console.log(this);
    }
    renderIcon(type){return({/* <h2 key={type["title"]} className="projectTitle">{ type["title"]}</h2> */});}
    render() {
        return(
            <div id="iconList">
                <div id="theIcons">
                {this.state.iconArray.map(icon => {
                    return (
                        <div key={icon["postID"]} className="projectBox" onMouseEnter={() => this.setState({ displayTitle: icon.title, displayContent: icon.content, displayImg: icon.img, displayPostID: icon.postID })}>
                            <Ico key={icon["postID"]} data={icon}/>
                        </div>
                    )
                })}
                </div>
                <InfoBox title={this.state.displayTitle} content={this.state.displayContent} img={this.state.displayImg} postID={this.state.displayPostID} />
            </div>
        )
    }
}

class Ico extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        "selected": false,
        // "displayPost": "",
      };
    }
    moused(){
        // console.log("mouseed");
        this.setState({selected:true});
        // console.info(this);
        // this.setState({displayPost:this});
    }
    unMoused(){
        // console.log("unMouseed");
        this.setState({selected:false});
        // console.info(this);
    }
    render() {
        var className = 'icoBase ' + (this.state.selected ? 'projectBack' : '');
        return(
            <div className={ className } onMouseEnter={this.moused.bind(this)} onMouseOut={this.unMoused.bind(this)} >
            {/* <i key={} className={`theIcons fa ${ type["icon"] }`} aria-hidden="true"></i> */}
            <i key={this.props.data.postID} className={`theIcons fa ${ this.props.data.icon }`} aria-hidden="true"></i>
            </div>
        )
    }
}

class InfoBox extends React.Component {
    constructor(props) {
      super(props);
    }
    render() {
        this.url = "/index.php?postID=" + this.props.postID;
        // console.log(this.props.iconArray);
        return(

            <div id="InfoBox">
            <a href={this.url}>
                <h3>{this.props.title}</h3>
                <div id="detailBox">
                    <div id="imgBox">
                        <img id="displayImg" src={this.props.img} />
                    </div>
                    <div id="contentBox">
                        <p>{ this.props.content }</p>
                    </div>
                    <div id="clear"></div>
                </div>
            </a>
            </div>

        )
    }
}

ReactDOM.render(
    <IconList/>,
    document.getElementById('root')
)
