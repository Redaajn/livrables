// Application
class CrudLocation extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            locationArray: []
        };
    }
    componentDidMount() {
        this.chargementDonnees();
    }
    chargementDonnees() {

        var locationArray = null;

        // affichage de données par Ajax

        $.getJSON("../admin/apiLocation/getLocations.php",
            function (data) {
                this.setState({ locationArray: data });
            }.bind(this))
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
    }

    updateLocation(i, status, ) {
        if (status != 1) {
          $.ajax({
            url: "apiLocation/getLocations.php",
            method: "POST",
            data: {
              idPointage: i,
              presence: 1,
              nombreHeure:8,
            },
            success: function (data) {
              this.chargementDonnees()
            }.bind(this)
          })
        } else {
          $.ajax({
            url: "apiPointage/updatePointage.php",
            method: "POST",
            data: {
                idPointage: i,
                presence: 0
            },
            success: function (data) {
              this.chargementDonnees()
            }.bind(this)
          })
        }
      }


    onChangeInput(e) {
        // this.setState({value: e.target.value})
    }



    render() {
        let locationArray = this.state.locationArray.map((location) => {
            return (
                <Location
                    key={location.idlocations}
                    location={location}
                    onClickUpdate={this.updateLocation.bind(this, location.idlocations)}
                />
            )
        })

        return (
            <div className="container">
          <table className="table table-hover">
                    <thead className="thead text-center">
                        <tr>
                            <th scope="col">Nom de locataire</th>
                            <th scope="col">N° d'appartement</th>
                            <th scope="col">Mois de paiement</th>
                            <th scope="col">Etat de paiement</th>


                        </tr>
                    </thead>
                    <tbody>
                        {locationArray}
                    </tbody>
                </table>
            </div>
        )
    }
}