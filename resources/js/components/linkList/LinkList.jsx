import React from 'react';

let link = ({title, url, active}) => (
            <li className={"py-2"}>
                <a href={url} className={'hover:text-gray-600'}>{title}</a>
            </li>
);

export default ({links = []}) => {
    return (
        <ul className={'text-gray-900 text-sm'}>
            {links.map(e => link(e))}
        </ul>
    )
};
