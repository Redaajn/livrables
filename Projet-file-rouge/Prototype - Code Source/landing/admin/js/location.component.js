class Location extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {

        return (
                <tr className="text-center">
              <td scope="row">{this.props.location.nom_locataire}</td>
              <td>{this.props.location.numero_appartement}</td>
              <td>{this.props.location.numero_appartement}</td>
              <td>{this.props.location.numero_appartement}</td>
                </tr>

        )
    }
}