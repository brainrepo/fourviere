import React from 'react';
import Pill from "./Pill";

export default ({ links = [] }) => {
    return (<div className={"flex item-center"}>
        {links.map( i => <Pill {...i}/>)}
    </div>);
}
