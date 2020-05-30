import React from 'react';

export default ({header, content, footer, className, ...props}) => {

    let classNames = ['shadow bg-white rounded', className].join(' ');

    return (<div className={classNames} {...props} >
        {(header)}
        {(content)}
        {(footer)}
    </div>);
}


