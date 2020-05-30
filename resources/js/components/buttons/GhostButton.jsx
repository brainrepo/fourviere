import React from "react";
import PageTitle from "../pageTitle/PageTitle";

export default ({clickHandler, icon, text}) => {
    return (
        <button onClick={clickHandler} className={'block flex items-center justify-center border-2 border-dashed border-gray-400 rounded-lg p-4 text-gray-600 hover:text-gray-500'}>
            {icon && <div className={'rounded-lg mr-1 flex justify-center items-center '}>
                { {...icon, props: {className: 'h-4 w-4' }} }
            </div>}
            <div className={'text-xs font-bold capitalize'}>{text}</div>
        </button>);
}
