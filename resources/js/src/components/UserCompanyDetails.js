
import React, { useEffect, useState } from 'react';
import { Button, Modal } from 'react-bootstrap';
import { BsFillArrowLeftSquareFill } from 'react-icons/bs';
import { FaHome } from 'react-icons/fa';

import {
    Link
} from 'react-router-dom';
const UserCompanyDetails = () => {


    return (
        <div className="vh-100 vw-100">
            <div className="row justify-content-center align-items-center m-1 pt-5" style={{ overflow: "auto" }}>
                <div className="container mb-5" >

                    <div className="col-md-12 col-sm-12 ">
                        <div className="container">
                        <Link to={'/company/slot'} className="btn btn-primary float-right">Available Slot</Link>
                        <h2 className=""><Link to={'/company'} className="text-dark pr-2"><BsFillArrowLeftSquareFill /></Link><Link to={'/'} className="text-dark pr-1"><FaHome /></Link>Company Name</h2>
                        
                        </div>
                        <div className="container  float-none bg-info">
                            <div className=" row align-items-center   " style={{ width: "300px", height: "400px" }}>
                                Image
                            </div>

                        </div>
                        
                        <table className="table table-striped bg-white table-bordered p-1 mt-2 ">
                            
                            <tbody>
                                <tr>
                                    <td colSpan="2" className="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>


                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</th>


                                </tr>
                                <tr>
                                    <td>PW</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>

                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>

                                </tr>
                                <tr>
                                    <td>Phone number</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>

                                </tr>
                                <tr>
                                    <td>Cab Name</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                                </tr>
                                <tr>
                                    <td>Holidays</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>

                                </tr>
                                <tr>
                                    <td>Page</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>

                                </tr>
                                <tr className="p-5">
                                    
                                    <td colSpan="2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus porttitor iaculis imperdiet. Ut tristique dui sit amet consectetur lacinia. Integer quis euismod ex. Sed molestie arcu a urna euismod, at aliquet augue faucibus. Fusce sed augue ac mi semper fermentum. Cras sit amet mollis ex. Aliquam id suscipit odio. Ut ultricies mattis libero, quis sagittis metus. Nunc mattis id lacus sit amet dignissim.

                                        Maecenas suscipit luctus justo eget sollicitudin. Suspendisse ut enim sit amet lectus mattis aliquam. Nulla aliquam sit amet leo a gravida. Fusce hendrerit mattis fringilla. Donec posuere dui tempor, elementum mauris ac, scelerisque nibh. Quisque in felis viverra, rutrum leo nec, tincidunt lorem. Nullam vitae dui velit.</td>

                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    );

}

export default UserCompanyDetails;