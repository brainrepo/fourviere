import React from 'react';
import Card from "../card/Card";
import GhostLinkButton from "../buttons/GhostLinkButton";
import Plus from "../icons/Plus";



export default ({show}) => {

    let header = (<div>
        <div className={"flex items-center"}>
            <div className={'flex-0'}>
                <div className={'w-16 h-16 shadow-inner'}>
                    <img src={'https://is1-ssl.mzstatic.com/image/thumb/Podcasts114/v4/ea/1c/ef/ea1cef86-14c5-5320-03e8-2dfb14229e12/mza_16610580858033250234.jpg/600x600bb.jpg'} />
                </div>

            </div>
            <div className={'flex-1 p-4'}>
                <h3 className={'text-lg text-gray-900 font-bold leading-none mb-1 capitalize'}>{show.title}</h3>
                <h4 className={'text-xs text-gray-500 uppercase leading-none font-bold'}>{show.episodes.length} Episodes</h4>
            </div>
        </div>

    </div>);

    let content = "contenuto";
    let footer = <GhostLinkButton text={'Add new episode'} icon={<Plus />} />;
    return Card({header, content, footer, className: 'overflow-hidden'});
}


