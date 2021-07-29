// Application
class CrudAppartement extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            appartementsArray: []
        };
    }
    componentDidMount() {
        this.chargementDonnees();
    }
    chargementDonnees() {

        var AppartementsArray = null;

        // affichage de données par Ajax

        $.getJSON("../admin/apiAppartement/getAppartement.php",
            function (data) {
                this.setState({ appartementsArray: data });
            }.bind(this))
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
    }
    //add Appartement
    addAppartement(e) {
        $.ajax({
            url: "../admin/apiAppartement/addAppartement.php",
            method: "POST",
            data: {
                numero_appartement: ajouternumero_appartement.value,
                prix_location: ajouterprix_location.value,
                etat_appartement: ajouteretat_appartement.value,

            },
            success: function (data) {
                this.chargementDonnees()
                $("#exampleModalCenter").modal('hide');
                console.log(data)
            }.bind(this)
        })
        e.preventDefault();
    }
    // Remove appartement
    removeAppartement(i) {
        $.ajax({
            url: "../admin/apiAppartement/deleteAppartement.php",
            method: "POST",
            data: {
                numero_appartement: i
            },
            success: function (data) {
                //   $(this).parent().remove();
                this.chargementDonnees()
            }.bind(this)
        })
    }
    //update Appartement
    updateAppartement(i) {
        $.ajax({
            url: "../admin/apiAppartement/updateAppartement.php",
            method: "POST",
            data: {
                idlocataires: i,
                numero_appartement: editnumero_appartement.value,
                prix_location: editprix_location.value,
                etat_appartement: editetat_appartement.value,


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
        let appartementsArray = this.state.appartementsArray.map((appartement) => {
            return (
                <Appartement
                    key={appartement.idappartement}
                    appartement={appartement}
                    onClickClose={this.removeAppartement.bind(this, appartement.idlocataires)}
                    onClickUpdate={this.updateAppartement.bind(this, appartement.idlocataires)}
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
                                    onSubmit={this.addAppartement.bind(this)}>



                                    <div className="form-row">
                                        <div className="col-12">
                                            <label htmlFor="inputName4">N° Appartement</label>
                                            <input type="text" className="form-control numero_appartement" id="ajouternumero_appartement" placeholder="ajouter numero appartement" />
                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="col-12">
                                            <label htmlFor="inputLast4">Prix de location</label>
                                            <input type="text" className="form-control prix_location" id="ajouterprix_location" placeholder="Ajouter prix de location" />
                                        </div>
                                    </div>

                                    <div className="form-row">
                                        <div className="col-12">
                                            <label htmlFor="inputLast4">Etat d'appartement</label>
                                            <select className="custom-select etat_appartement" id="ajouteretat_appartement" aria-label="" >
                                                <option>Vide</option>
                                                <option>Pleine</option>
                                            </select>
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
                                    onSubmit={this.updateAppartement.bind(this)}>


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
                            <th scope="col">N°Appartement</th>
                            <th scope="col">Prix de location </th>
                            <th scope="col">Etat d'appartement</th>
                            <th scope="col"></th>


                        </tr>
                    </thead>
                    <tbody>
                        {appartementsArray}
                    </tbody>
                </table>
            </div>
        )
    }
}