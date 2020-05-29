import React from 'react';
import md5 from 'crypto-js/md5';

let avatarUrl = (email, size = 20) => `https://www.gravatar.com/avatar/${ md5(email.toLowerCase().trim()) }?s=${size}&d=retro`;

export default ({email, size, className}) => {
    return email && <img src={avatarUrl(email, size)} alt={email} className={className + " rounded-full shadow-inner"}/>;
};
