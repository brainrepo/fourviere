import React from 'react';
import PageTitle from "../components/pageTitle/PageTitle";
import Pills from "../components/nav/Pills";
import {
    Switch,
    Route,
} from "react-router-dom";
import Mic from "../components/icons/Mic";
import Tile from "../components/icons/Tile";
import Calendar from "../components/icons/Calendar";

export default () => {
    return (<div className={'p-6'}>
        <PageTitle title={'shows'} subTitle={'2 active show'}
            icon=<Mic className={'h-4 w-4 text-gray-100'}/>
            right={(<Pills links={[{title:'Tiles', url:'/dashboard', icon:<Tile/>},{title:'Calendar', url:'/dashboard/calendar', icon:<Calendar/>}]}/>)}
        />


        <div>
            <Switch>
                <Route path="/dashboard/calendar/">
                    <div>calendar</div>
                </Route>
                <Route path="/dashboard">
                    <div>tile</div>
                </Route>
            </Switch>
        </div>


    </div>);
}
