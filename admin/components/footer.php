<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
        <nav class="pull-left">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        Personal Profile Aqeel
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright">
            <p>Copyright &copy; <span id="currentDate"></span> Your Company Name</p>
        </div>
        <div>
            Distributed by
            <a target="_blank" href="https://themewagon.com/">Lauwba</a>.
        </div>
    </div>
</footer>

<script>
    const today = new Date();
    const dateOptions = {
        year: 'numeric'
    };
    const formattedDate = today.toLocaleDateString(undefined, dateOptions);

    document.getElementById("currentDate").textContent = formattedDate;
</script>