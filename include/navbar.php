<body class="body">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inra</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo $site ?>/home">Acciell</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $site ?>/admin">ajoute nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $site ?>/user/?user=<?php echo $_SESSION['id_users'] ?>">account</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['email'] ?></a>
                    </li>
                </ul>

            </div>
        </div>

    </nav>
    <div class="mt-6" style="height:60px"></div>