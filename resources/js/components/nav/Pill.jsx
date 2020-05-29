import React from 'react';
import {NavLink} from "react-router-dom";
import Tile from "../icons/Tile";

export default ({title = '', url = '', icon = null}) => {
    return (
    <NavLink to={url} activeClassName='text-gray-800 shadow bg-white rounded' className={"text-gray-500 p-4 text-sm capitalize font-bold flex items-center"} exact={true}>
        {{...icon, props: {...icon.props, className:"h-4 w-4"} }}
        <span className={'ml-1'}>{title}</span>
    </NavLink>)}
;
