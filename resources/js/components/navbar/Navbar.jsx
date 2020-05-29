import React from 'react';
import Logo from '../logo/Logo';
import Avatar from "../avatar/Avatar";
import Dropdown from "../dropdown/Dropdown";
import LinkList from "../linkList/LinkList";

export default () => {
    return (
        <div className={'bg-gray-900 px-6 py-4 w-full flex justify-between items-center text-gray-100'}>
            <div className={'w-5'}>
                <svg viewBox="0 0 20 14">
                    <g id="Mobile" transform="translate(-27.000000, -25.000000)" fill="#FFFFFF" fillRule="nonzero">
                        <g id="menu" transform="translate(27.000000, 25.000000)">
                            <path d="M0,0 L20,0 L20,2 L0,2 L0,0 Z M0,6 L20,6 L20,8 L0,8 L0,6 Z M0,12 L20,12 L20,14 L0,14 L0,12 Z" id="Shape"></path>
                        </g>
                    </g>
                </svg>
            </div>
            <Logo/>
            <Dropdown content={(<div className={'bg-white shadow p-3 rounded mt-1'}>
                <LinkList links={[
                    {title: "Profile", url:"/profile", active: false },
                    {title: "Logout", url:"/logout", active: false }
                ]}></LinkList>
            </div>)} title={(<Avatar email={"murru7@gmail.com"} size={100} className={"w-8"}/>)} xAlign={'right'}></Dropdown>
        </div>
    )
};
