import React, { useState, useRef, useEffect } from 'react';
import Caret from "./Caret";


let getXAlign = (align) => (align == "left") ? 'left-0' : 'right-0';



export default ({title, content, xAlign = 'left'}) => {

    const ref = useRef(null);
    const [listOpen, setListOpen] = useState(false);

    useEffect(() => {
        function handleClickOutside(event) {
            if (ref.current && !ref.current.contains(event.target)) {
                setListOpen(false)
            }
        }
        document.addEventListener("mousedown", handleClickOutside);
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, [ref]);

    return(
        <div className="dd-wrapper relative"  ref={ref}>
            <div className="dd-header flex items-center " onClick={() => setListOpen(!listOpen)}>
                <div>
                    {title}
                </div>
                <div className={'ml-2'}>
                    {listOpen
                        ? (<Caret direction='up'/>)
                        : (<Caret direction='down'/>)
                    }
                </div>
            </div>
            {listOpen && <div className={(`absolute ${getXAlign(xAlign)}`)}>{content}</div>}
        </div>
    )
};
