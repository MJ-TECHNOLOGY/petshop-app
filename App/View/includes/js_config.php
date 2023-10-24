<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<!-- JS DataTable -->
<script src="View/js/jquery.config.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="View/js/DataTable/datatables.min.js"></script>
<script src="View/js/src/jquery.global.js"></script>

<!-- JS Sidebar -->
<script>
    const body = document.querySelector("body");
    const sidebar = body.querySelector(".sidebar");
    const toggle = body.querySelector(".toggle");

    // Adicione um ouvinte de evento ao botão de alternância
    toggle.addEventListener("click", () => {
        // Alterne a classe 'close' na barra lateral para abrir/fechar
        sidebar.classList.toggle("close");
    });

    body.addEventListener("click", (event) => {
        if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
            if (!sidebar.classList.contains("close")) {
                sidebar.classList.add("close");
            }
        }
    });
</script>