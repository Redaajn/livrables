// Application
class CrudProduct extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            productsArray: []
        };
    }
    componentDidMount() {
        this.chargementDonnees();
    }
    chargementDonnees() {

        var productsArray = null;

        // affichage de données par Ajax

        $.getJSON("api/getProduct.php",
            function (data) {
                this.setState({ productsArray: data });
            }.bind(this))
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
    }
    //add product
    addproduct(e) {
        $.ajax({
            url: "/api/addProduct.php",
            method: "POST",
            data: {
                nom_locataire: ajouternom_locataire.value,
                numero_locataire: ajouternumero_locataire.value,

            },
            success: function (data) {
                this.chargementDonnees()
                $("#exampleModalCenter").modal('hide');
                console.log(data)
            }.bind(this)
        })
        e.preventDefault();
    }
    // Remove product
    removeproduct(i) {
        $.ajax({
            url: "/api/deleteProduct.php",
            method: "POST",
            data: {
                idlocataires: i
            },
            success: function (data) {
                //   $(this).parent().remove();
                this.chargementDonnees()
            }.bind(this)
        })

    }
    //update product
    updateproduct(i) {
        $.ajax({
            url: "api/updateProduct.php",
            method: "POST",
            data: {
                idlocataires: i,
                nom_locataire: editernom_locataire.value,
                numero_locataire: editernumero_locataire.value,


            },
            success: function (data) {
                this.chargementDonnees()
                console.log(data)
            }.bind(this)
        })
        e.preventDefault();
    }






    onChangeInput(e) {
        // this.setState({value: e.target.value})
    }

    render() {
        let productsArray = this.state.productsArray.map((product) => {
            return (
                <Product
                    key={product.idlocataires}
                    product={product}
                    onClickClose={this.removeproduct.bind(this, product.idlocataires)}
                    onClickUpdate={this.updateproduct.bind(this, product.idlocataires)}
                />
            )
        })

        return (
            <div className="container">
                {/* ADD Model */}
                <div className="modal fade" id="exampleModalCenter" tabIndex={-1} role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered" role="document">
                        <div className="modal-content">
                            <div className="modal-header">

                                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div className="modal-body">
                                <form
                                    id="form-add"
                                    className="form-horizontal"
                                    onSubmit={this.addproduct.bind(this)}>



                                    <div className="form-row">
                                        <div className="col-12">
                                            <label htmlFor="inputName4">Name</label>
                                            <input type="text" className="form-control nom_locataire" id="ajouternom_locataire" placeholder="Name" />
                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="col-12">
                                            <label htmlFor="inputLast4">Phone number</label>
                                            <input type="text" className="form-control numero_locataire" id="ajouternumero_locataire" placeholder="Phone number" />
                                        </div>
                                    </div>
                                    <div className="input-group-btn mt-4">
                                        <button type="submit" className="btn btn-primary submit ">Add locataire</button>

                                    </div>
                                </form>
                            </div>
                            <div className="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>







                {/* UPDATE Model */}
                <div className="modal fade" id="exampleModalCenter1" tabIndex={-1} role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered" role="document">
                        <div className="modal-content">
                            <div className="modal-header">

                                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div className="modal-body">
                                <form
                                    id="form-update"
                                    className="form-horizontal"
                                    onSubmit={this.updateproduct.bind(this)}>


                                    <div className="form-row">
                                        <div className="col-12">
                                            <label htmlFor="inputName4">Name</label>
                                            <input type="text" className="form-control nom_locataire" id="editernom_locataire" placeholder="Name" />
                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="col-12">
                                            <label htmlFor="inputLast4">Phone number</label>
                                            <input type="text" className="form-control numero_locataire" id="editernumero_locataire" placeholder="Phone number" />
                                        </div>
                                    </div>
                                    <div className="input-group-btn mt-4">
                                        <button type="submit" className="btn btn-success submit ">Update locataire</button>

                                    </div>
                                </form>
                            </div>
                            <div className="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <table className="table table-hover">
                    <thead className="thead">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col"></th>
                            <th scope="col"></th>


                        </tr>
                    </thead>
                    <tbody>
                        {productsArray}
                    </tbody>
                </table>
            </div>
        )
    }
}