<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop - Cliente</title>
    <?php include 'View/includes/css_config.php' ?>
    <link rel="stylesheet" href="View/styles/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
</head>

<body>

    <header class="header">
        <div class="header__container container">
            <div class="header__toggle" id="header-toggle">
                <i class="ri-menu-line"></i>
            </div>
        </div>
    </header>

    <div class="sidebar" id="sidebar">
        <nav class="sidebar__container">
            <div class="sidebar__logo">
                <img src="View/assets/logo.png" alt="" class="sidebar__logo-img">
                <h2 class="sidebar__logo-text">PETSHOP</h2>
            </div>

            <div class="sidebar__content">
                <div class="sidebar__list">
                    <a href="#" class="sidebar__link active-link">
                        <i class="ri-home-5-line"></i>
                        <span class="sidebar__link-name">Home</span>
                        <span class="sidebar__link-floating">Home</span>
                    </a>

                    <a href="#" class="sidebar__link">
                        <i class="ri-compass-3-line"></i>
                        <span class="sidebar__link-name">Cliente</span>
                        <span class="sidebar__link-floating">Cliente</span>
                    </a>

                    <a href="#" class="sidebar__link">
                        <i class="ri-video-line"></i>
                        <span class="sidebar__link-name">Animal</span>
                        <span class="sidebar__link-floating">Animal</span>
                    </a>

                    <a href="#" class="sidebar__link">
                        <i class="ri-add-box-line"></i>
                        <span class="sidebar__link-name">Serviço</span>
                        <span class="sidebar__link-floating">Serviço</span>
                    </a>

                    <a href="#" class="sidebar__link">
                        <i class="ri-logout-box-r-line"></i>
                        <span class="sidebar__link-name">Logout</span>
                        <span class="sidebar__link-floating">Logout</span>
                    </a>
                </div>

            </div>
        </nav>
    </div>

    <main class="main container" id="main">
        <h1>Sidebar Menu</h1>
    </main>


    <script>
        const showSidebar = (toggleId, sidebarId, mainId) => {
            const toggle = document.getElementById(toggleId),
                sidebar = document.getElementById(sidebarId),
                main = document.getElementById(mainId)

            if (toggle && sidebar && main) {
                toggle.addEventListener('click', () => {
                    sidebar.classList.toggle('show-sidebar')
                    main.classList.toggle('main-pd')
                })
            }
        }
        showSidebar('header-toggle', 'sidebar', 'main')

        const sidebarLink = document.querySelectorAll('.sidebar__link')

        function linkColor() {
            sidebarLink.forEach(l => l.classList.remove('active-link'))
            this.classList.add('active-link')
        }

        sidebarLink.forEach(l => l.addEventListener('click', linkColor))
    </script>

    <?php include 'View/includes/js_config.php' ?>

</body>

</html>