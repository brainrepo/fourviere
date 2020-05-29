import React from 'react';

export default ({direction, className}) => {
    return (
        <svg className={'w-3 ' + className} viewBox="0 0 12 8" version="1.1">
            {(direction === "up") && <polygon fill="CurrentColor" points="6.707 1.05 6 0.343 0.343 6 1.757 7.414 6 3.172 10.243 7.414 11.657 6"/>}
            {(direction === "down") && <polygon fill="CurrentColor" points="5.293 6.95 6 7.657 11.657 2 10.243 0.586 6 4.828 1.757 0.586 0.343 2"/>}
            }
        </svg>
    )
};
