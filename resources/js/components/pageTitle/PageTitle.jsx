import React from "react";

export default ({title, subTitle, icon = null, right = null}) => {
    return <div className={'flex items-center justify-between'}>
        <div className={'flex items-center justify-between'}>
            {icon && <div className={'bg-gray-900 w-12 h-12 rounded-lg mr-3 flex justify-center items-center'}>
                {icon}
            </div>}
            <div>
                <h1 className={'text-lg text-gray-900 font-bold leading-none mb-1 capitalize'}>{title}</h1>
                <h2 className={'text-xs text-gray-500 uppercase leading-none font-bold'}>{subTitle}</h2>
            </div>
        </div>

        {right}
    </div>
}
