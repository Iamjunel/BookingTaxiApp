import { height } from 'dom-helpers';
import { useImperativeHandle } from 'preact/hooks';
import React, { useEffect, useState } from 'react';
import { Button, Modal } from 'react-bootstrap';
import { BsFillArrowLeftSquareFill } from 'react-icons/bs';
import {
    Link
} from 'react-router-dom';
const Booking = () =>{

    const [show, setShow] = useState(false);

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);

    return (
        <div className="vh-100 vw-100" style={{ backgroundColor: "#1885f5ad" }}>
            <div className="row justify-content-center align-items-center p-5">
                <div >
                    <div className="col-md-12 col-sm-12">
                        <h2 className="text-center"><Link to={'/taxi-care'} className="text-dark pr-2"><BsFillArrowLeftSquareFill /></Link>Booking Calendar</h2>
                        <div className ="row">

                            <div className="col-md-12 bg-white">
                                <Link to={'/taxi-care/booking/date'} className="text-dark pr-2">Calendar by Date</Link>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    );

}

export default Booking;