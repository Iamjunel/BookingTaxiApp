
import React, { useEffect, useState } from 'react';
import { Button, Modal } from 'react-bootstrap';
import { BsFillArrowLeftSquareFill } from 'react-icons/bs';
import {
    Link
} from 'react-router-dom';
const Company= () =>{

    const [show, setShow] = useState(false);

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);

    function MyVerticallyCenteredModal(props) {
        return (
            <Modal
                {...props}
                size="sm"
                aria-labelledby="contained-modal-title-vcenter"
                centered
            >
                <Modal.Header closeButton>
                    <Modal.Title id="contained-modal-title-vcenter">
                        Delete Company
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <h4>Are you sure you want to delete this company?</h4>
                </Modal.Body>
                <Modal.Footer style={{
                    display: "flex",
                    justifyContent: "center",
                }}>
                    <Button className="px-4 mr-5" variant="light" onClick={props.onHide}>No</Button>
                    <Button className="px-4" onClick={props.onHide}>Yes</Button>
                </Modal.Footer>
            </Modal>
        );
    }
    return (
        <div className="vh-100 vw-100" style={{backgroundColor: "rgb(231 226 190 / 38%)"}}>
            <div className="row justify-content-center align-items-center m-1 pt-5" style={{ overflow: "auto" }}>
                <div >
                    
                    <div className="col-md-12 col-sm-12 clearfix">
                        <h2 className="float-left"><Link to ={'/admin'} className="text-dark"><BsFillArrowLeftSquareFill /></Link>Company List</h2>
                    <a href="#" className="btn btn-primary float-right">Add Company</a>
                        <table className="table table-striped bg-white table-bordered ">
                        <thead>
                        <tr className="text-center">
                            <th>Company Name</th>
                            <th>ID</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Genno Company</td>
                            <td>GEnno The grear</td>
                            <td>alalang</td>
                                <td><Button variant="danger" onClick={handleShow}>
                                    Delete
                                </Button></td>
                        </tr>
                        <tr>
                            <td>Genno Company</td>
                            <td>GEnno The grear</td>
                            <td>alalang</td>
                                <td><Button variant="danger" onClick={handleShow}>
                                    Delete
                                </Button></td>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <MyVerticallyCenteredModal
                show={show}
                onHide={handleClose}
                backdrop="static"
                keyboard={false}
            />
                
        </div>
    );

}

export default Company;