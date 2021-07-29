class SideBar extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {

        return (
            <aside className="main-sidebar sidebar-dark-primary elevation-4 align-items-center">
            {/* Brand Logo */}
            <img src="../admin/dist/img/logo.png" alt="Logo" classname="brand-image img-circle" style={{opacity: '0.8'}}  width={80} height={80} />
              <span className="brand-text text-white ml-3 font-weight-light">Gestion location</span>
<hr className=" bg-white mt-1 border"/>
            {/* Sidebar */}
            <div className="sidebar">
              <nav className="mt-3">
                <ul className="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  {/* Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library */}
                  <li className="nav-item">
                    <a href="locataire.html" className="nav-link">
                      <i className="nav-icon fas fa-user" />
                      <p>Locataire</p>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a href="appartement.html" className="nav-link">
                      <i className="nav-icon fas fa-building" />
                      <p>Appartement</p>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a href="location.html" className="nav-link">
                      <i className="nav-icon fas fa-hand-holding-usd" />
                      <p>Location</p>
                    </a>
                  </li>
                </ul>
              </nav>
              {/* /.sidebar-menu */}
            </div>
            {/* /.sidebar */}
          </aside>
          

        )
    }
}